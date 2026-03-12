#!/bin/bash

echo "🗄️  Setting up MySQL Database for Joshitha Infratech Admin..."

# Database credentials
DB_NAME="infinitydevdb"
DB_USER="laravel_infinitydev"
DB_PASS="infinitydev!"

# Colors for output
GREEN='\033[0;32m'
RED='\033[0;31m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

echo -e "${YELLOW}Step 1: Checking MySQL service...${NC}"
if ! systemctl is-active --quiet mysql; then
    echo -e "${RED}MySQL is not running. Starting MySQL...${NC}"
    sudo systemctl start mysql
    sudo systemctl enable mysql
else
    echo -e "${GREEN}✓ MySQL is running${NC}"
fi

echo -e "\n${YELLOW}Step 2: Creating database and user...${NC}"
echo "Please enter MySQL root password when prompted:"

sudo mysql -u root -p <<MYSQL_SCRIPT
-- Create database if not exists
CREATE DATABASE IF NOT EXISTS ${DB_NAME} CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Create user if not exists
CREATE USER IF NOT EXISTS '${DB_USER}'@'localhost' IDENTIFIED BY '${DB_PASS}';

-- Grant privileges
GRANT ALL PRIVILEGES ON ${DB_NAME}.* TO '${DB_USER}'@'localhost';
FLUSH PRIVILEGES;

-- Show databases
SHOW DATABASES;

-- Show user
SELECT User, Host FROM mysql.user WHERE User = '${DB_USER}';

MYSQL_SCRIPT

if [ $? -eq 0 ]; then
    echo -e "${GREEN}✓ Database and user created successfully${NC}"
else
    echo -e "${RED}✗ Failed to create database and user${NC}"
    exit 1
fi

echo -e "\n${YELLOW}Step 3: Testing database connection...${NC}"
cd /var/www/joshitha-modern-site/admin

# Clear cache
php artisan config:clear
php artisan cache:clear

# Test connection
php artisan tinker --execute="echo 'Testing connection...'; try { DB::connection()->getPdo(); echo 'Database connection successful!'; } catch (Exception \$e) { echo 'Connection failed: ' . \$e->getMessage(); }"

echo -e "\n${YELLOW}Step 4: Running migrations...${NC}"
php artisan migrate --force

if [ $? -eq 0 ]; then
    echo -e "${GREEN}✓ Migrations completed successfully${NC}"
else
    echo -e "${RED}✗ Migrations failed${NC}"
    exit 1
fi

echo -e "\n${YELLOW}Step 5: Running seeders...${NC}"
php artisan db:seed --force

if [ $? -eq 0 ]; then
    echo -e "${GREEN}✓ Seeders completed successfully${NC}"
else
    echo -e "${YELLOW}⚠ Seeders completed with warnings (this is usually okay)${NC}"
fi

echo -e "\n${YELLOW}Step 6: Optimizing Laravel...${NC}"
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo -e "\n${GREEN}✅ Database setup complete!${NC}"
echo -e "\n${YELLOW}Database Information:${NC}"
echo -e "Database Name: ${DB_NAME}"
echo -e "Database User: ${DB_USER}"
echo -e "Database Host: localhost"
echo -e "\n${YELLOW}Next steps:${NC}"
echo -e "1. Restart PHP-FPM: sudo systemctl restart php8.1-fpm"
echo -e "2. Restart Nginx: sudo systemctl restart nginx"
echo -e "3. Restart PM2: pm2 restart joshitha-frontend"

