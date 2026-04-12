#!/bin/bash

# Colors
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m' # No Color

echo -e "${BLUE}╔════════════════════════════════════════════════════════╗${NC}"
echo -e "${BLUE}║   paanch - Database Diagnostic Tool       ║${NC}"
echo -e "${BLUE}╚════════════════════════════════════════════════════════╝${NC}"
echo ""

# Navigate to admin directory
cd /var/www/paanch/admin

# 1. Check PHP Version
echo -e "${YELLOW}[1/10] Checking PHP Version...${NC}"
PHP_VERSION=$(php -v | head -1)
echo -e "${GREEN}✓${NC} $PHP_VERSION"
echo ""

# 2. Check MySQL Service
echo -e "${YELLOW}[2/10] Checking MySQL Service...${NC}"
if systemctl is-active --quiet mysql; then
    echo -e "${GREEN}✓${NC} MySQL is running"
else
    echo -e "${RED}✗${NC} MySQL is NOT running"
    echo -e "  ${YELLOW}Fix:${NC} sudo systemctl start mysql"
fi
echo ""

# 3. Check MySQL Version
echo -e "${YELLOW}[3/10] Checking MySQL Version...${NC}"
MYSQL_VERSION=$(mysql --version 2>/dev/null)
if [ $? -eq 0 ]; then
    echo -e "${GREEN}✓${NC} $MYSQL_VERSION"
else
    echo -e "${RED}✗${NC} MySQL client not found"
fi
echo ""

# 4. Check PHP MySQL Extensions
echo -e "${YELLOW}[4/10] Checking PHP MySQL Extensions...${NC}"
EXTENSIONS=$(php -m | grep -i mysql)
if [ -n "$EXTENSIONS" ]; then
    echo -e "${GREEN}✓${NC} MySQL extensions installed:"
    echo "$EXTENSIONS" | sed 's/^/  /'
else
    echo -e "${RED}✗${NC} MySQL extensions NOT installed"
    echo -e "  ${YELLOW}Fix:${NC} sudo apt install php8.1-mysql"
fi
echo ""

# 5. Check .env File
echo -e "${YELLOW}[5/10] Checking .env File...${NC}"
if [ -f .env ]; then
    echo -e "${GREEN}✓${NC} .env file exists"
    echo -e "  Database Configuration:"
    grep "^DB_" .env | sed 's/DB_PASSWORD=.*/DB_PASSWORD=***HIDDEN***/' | sed 's/^/  /'
else
    echo -e "${RED}✗${NC} .env file NOT found"
fi
echo ""

# 6. Test Database Connection
echo -e "${YELLOW}[6/10] Testing Database Connection...${NC}"
DB_TEST=$(php artisan tinker --execute="try { \$pdo = DB::connection()->getPdo(); echo 'SUCCESS'; } catch (Exception \$e) { echo 'FAILED: ' . \$e->getMessage(); }" 2>&1 | grep -E "SUCCESS|FAILED")
if echo "$DB_TEST" | grep -q "SUCCESS"; then
    echo -e "${GREEN}✓${NC} Database connection successful"
else
    echo -e "${RED}✗${NC} Database connection failed"
    echo -e "  Error: $DB_TEST"
fi
echo ""

# 7. Check Database Tables
echo -e "${YELLOW}[7/10] Checking Database Tables...${NC}"
TABLES=$(php artisan tinker --execute="try { \$tables = DB::select('SHOW TABLES'); echo count(\$tables); } catch (Exception \$e) { echo '0'; }" 2>&1 | tail -1)
if [ "$TABLES" -gt 0 ]; then
    echo -e "${GREEN}✓${NC} Found $TABLES tables in database"
else
    echo -e "${RED}✗${NC} No tables found - migrations may not have run"
    echo -e "  ${YELLOW}Fix:${NC} php artisan migrate --force"
fi
echo ""

# 8. Check Projects Data
echo -e "${YELLOW}[8/10] Checking Projects Data...${NC}"
PROJECTS_COUNT=$(php artisan tinker --execute="try { \$count = DB::table('projects')->count(); echo \$count; } catch (Exception \$e) { echo '0'; }" 2>&1 | tail -1)
if [ "$PROJECTS_COUNT" -gt 0 ]; then
    echo -e "${GREEN}✓${NC} Found $PROJECTS_COUNT projects in database"
else
    echo -e "${RED}✗${NC} No projects found - seeders may not have run"
    echo -e "  ${YELLOW}Fix:${NC} php artisan db:seed --class=ProjectsSeeder --force"
fi
echo ""

# 9. Check File Permissions
echo -e "${YELLOW}[9/10] Checking File Permissions...${NC}"
STORAGE_PERMS=$(stat -c "%a" storage 2>/dev/null)
if [ "$STORAGE_PERMS" = "775" ] || [ "$STORAGE_PERMS" = "777" ]; then
    echo -e "${GREEN}✓${NC} Storage permissions: $STORAGE_PERMS"
else
    echo -e "${YELLOW}⚠${NC} Storage permissions: $STORAGE_PERMS (should be 775)"
    echo -e "  ${YELLOW}Fix:${NC} sudo chmod -R 775 storage bootstrap/cache"
fi
echo ""

# 10. Check Laravel Logs
echo -e "${YELLOW}[10/10] Checking Recent Errors...${NC}"
if [ -f storage/logs/laravel.log ]; then
    ERROR_COUNT=$(grep -c "ERROR" storage/logs/laravel.log 2>/dev/null || echo "0")
    if [ "$ERROR_COUNT" -gt 0 ]; then
        echo -e "${YELLOW}⚠${NC} Found $ERROR_COUNT errors in Laravel log"
        echo -e "  ${YELLOW}View:${NC} tail -50 storage/logs/laravel.log"
    else
        echo -e "${GREEN}✓${NC} No errors in Laravel log"
    fi
else
    echo -e "${YELLOW}⚠${NC} No Laravel log file found yet"
fi
echo ""

# Summary
echo -e "${BLUE}╔════════════════════════════════════════════════════════╗${NC}"
echo -e "${BLUE}║                    DIAGNOSTIC SUMMARY                  ║${NC}"
echo -e "${BLUE}╚════════════════════════════════════════════════════════╝${NC}"
echo ""

# Check if all critical items are OK
CRITICAL_OK=true

if ! systemctl is-active --quiet mysql; then
    CRITICAL_OK=false
    echo -e "${RED}✗ CRITICAL: MySQL service is not running${NC}"
fi

if ! echo "$DB_TEST" | grep -q "SUCCESS"; then
    CRITICAL_OK=false
    echo -e "${RED}✗ CRITICAL: Database connection failed${NC}"
fi

if [ "$TABLES" -eq 0 ]; then
    CRITICAL_OK=false
    echo -e "${RED}✗ CRITICAL: No database tables found${NC}"
fi

if [ "$PROJECTS_COUNT" -eq 0 ]; then
    echo -e "${YELLOW}⚠ WARNING: No projects data found${NC}"
fi

if [ "$CRITICAL_OK" = true ]; then
    echo -e "${GREEN}✓ All critical checks passed!${NC}"
    echo ""
    echo -e "${BLUE}Next steps:${NC}"
    echo -e "  1. Clear cache: php artisan config:clear && php artisan cache:clear"
    echo -e "  2. Restart services: sudo systemctl restart php8.1-fpm nginx"
    echo -e "  3. Restart PM2: pm2 restart paanch-frontend"
else
    echo ""
    echo -e "${RED}⚠ Critical issues found! Please fix the errors above.${NC}"
    echo ""
    echo -e "${BLUE}Quick fixes:${NC}"
    echo -e "  1. Start MySQL: sudo systemctl start mysql"
    echo -e "  2. Run setup: ./setup-database.sh"
    echo -e "  3. Clear cache: php artisan config:clear"
fi

echo ""
echo -e "${BLUE}For detailed troubleshooting, see: DATABASE_TROUBLESHOOTING.md${NC}"
echo ""

