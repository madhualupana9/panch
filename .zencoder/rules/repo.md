---
description: Repository Information Overview
alwaysApply: true
---

# Ankura Homes Information

## Summary
Ankura Homes is a static website for a real estate developer based in Hyderabad. The project appears to be a static export of a **WordPress** site built with the **Elementor** page builder. It showcases luxury apartments and villas like Urban Trilla and Iqon West.

## Structure
The repository is organized as a flat-file static site with assets and content directories:
- **Root**: Contains the main entry point ([index.html](./index.html)) and global styles ([style.css](./style.css)).
- **botapp/**: Contains assets for a chatbot user interface ([botapp/ChatbotUI/dist/js/bot-loader.js](./botapp/ChatbotUI/dist/js/bot-loader.js)).
- **wp-content/**: Static assets from the original WordPress installation, including:
  - **themes/balance/**: The main website theme.
  - **plugins/**: Assets from various plugins like Elementor, Advanced Popups, and TRX Addons.
  - **uploads/**: Media files (images, documents) organized by year/month.
- **npm/**: Localized versions of third-party libraries such as [Bootstrap](./npm/bootstrap@5.3.3/), [Bootstrap Icons](./npm/bootstrap-icons@1.11.3/), and [Swiper](./npm/swiper@11/).
- **assests/**, **css/**, **js/**: Additional CSS and JS assets used across the site.
- **feed/**: Contains the RSS feed in static format ([feed/index.htm](./feed/index.htm)).

## Specification & Tools
**Type**: Static HTML/CSS/JS Website  
**Version**: N/A (Static Export)  
**Required Tools**: Any web server (Nginx, Apache, Live Server) to host the files.

## Key Resources
**Main Files**:
- [./index.html](./index.html): The main homepage entry point.
- [./style.css](./style.css): Global styles, including Elementor-generated CSS.
- [./loader.js](./loader.js): A script loader for external services (e.g., Trustindex).

**Configuration Structure**:
- The project does not use traditional configuration files (like `.env` or `package.json`). Configuration is hardcoded within the HTML and JS files or managed through WordPress before the static export.

## Usage & Operations
**Key Commands**:
Since this is a static site, no build or installation steps are required. To view the site:
```bash
# Example using a simple Python server
python -m http.server 8000
```

**Integration Points**:
- **Google Tag Manager**: Integrated via [gtag/js](./gtag/js).
- **Trustindex**: Integrated via [loader.js](./loader.js) for reviews/ratings.
- **Chatbot**: A custom chatbot component located in [botapp/ChatbotUI/](./botapp/ChatbotUI/).

## Validation
**Quality Checks**:
- Validation is typically performed via browser developer tools to check for broken links or 404s in asset loading.
- As a static export, there are no automated testing frameworks (like Jest or Cypress) present in the repository.
