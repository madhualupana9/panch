---
description: Repository Information Overview
alwaysApply: true
---

# Paanchajanya Eco Villages Information

## Summary
Paanchajanya Eco Villages is a real estate development website focused on luxury apartments and villas in Hyderabad. The repository contains a static export of a WordPress-based site, specifically utilizing the **Elementor** page builder and the **Balance** theme.

## Structure
- **assests/**: Core static assets including CSS, JS, fonts, and images.
  - **css/**: Extensive list of stylesheets for layout (Bootstrap), components (Elementor), and animations.
  - **js/**: JavaScript libraries including jQuery, GSAP, Swiper, and Elementor frontend scripts.
  - **image/**: Project logos and visual content.
- **wp-content/**: Residual WordPress structure containing theme and plugin-related assets.
  - **plugins/**: Assets from plugins like Elementor, TRX Addons, and Easy FancyBox.
  - **themes/balance/**: Theme-specific skins and styles.
- **s/**: Web font resources (DM Sans, Poppins, Roboto).
- **index.html**: The main landing page and primary entry point.
- **style.css**: Main stylesheet at the root.
- **loader.js**: Script for external trust/review integrations.

## Language & Runtime
**Language**: HTML, CSS, JavaScript  
**Type**: Static Web Application (WordPress Export)  
**Frontend Framework**: Elementor (Page Builder), Bootstrap (Layout)  
**Libraries**: jQuery, GSAP (Animations), Swiper (Carousels)

## Key Resources
**Main Files**:
- [./index.html](./index.html): Main application entry point.
- [./style.css](./style.css): Global styles.
- [./assests/css/mainstyles.css](./assests/css/mainstyles.css): Primary component styling.
- [./assests/js/__scripts.js](./assests/js/__scripts.js): Core application logic.

**Configuration Structure**:
- The project is configured as a static site. Most "configurations" are embedded within the `index.html` via JSON objects like `elementorFrontendConfig` and `ElementorProFrontendConfig`.

## Usage & Operations
**Key Commands**:
Since this is a static repository, no build system is present. Operations involve:
- **Serving**: Any static web server (e.g., Apache via Laragon, Nginx, or `npx serve`).
- **Development**: Direct editing of `index.html` and assets in the `assests/` directory.

**Integration Points**:
- **TrustIndex**: Integrated via `loader.js` for reviews.
- **Social Media**: Facebook, Instagram, YouTube, and LinkedIn integrations linked in the footer.
- **Google Fonts**: Loaded locally from the `s/` directory.

## Validation
**Quality Checks**:
- **Linting**: Can be validated with standard HTML/CSS linters.
- **Responsive Design**: Breakpoints are defined in `elementorFrontendConfig` (Mobile: 767px, Tablet: 1279px, Laptop: 1366px).
