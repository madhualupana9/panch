---
description: Repository Information Overview
alwaysApply: true
---

# Panchajanya Eco Villages Information

## Summary
Panchajanya Eco Villages is a real estate developer website focused on luxury apartments, villas, and open plots in Hyderabad, Shirdi, Bangalore, and Bangkok. The repository appears to be a static export or a front-end asset collection of a WordPress-based site.

## Structure
- **assests/**: Contains custom CSS, images, and JavaScript files.
- **wp-content/**: Mimics the WordPress content directory, containing theme-specific skins (`themes/balance`), plugins assets (`plugins/`), and media (`uploads/`).
- **wp-includes/**: Contains WordPress core-related CSS and assets.
- **index.html**: The main entry point for the static website.
- **style.css**: The primary stylesheet, including Elementor-generated styles.
- **loader.js**: A script for loading external widgets (e.g., Trustindex).

## Specification & Tools
**Type**: Static Web Assets / Exported WordPress Site  
**Required Tools**: Standard web browser for viewing; static web server (like Nginx or Apache) for hosting.  
**Key Frameworks**:
- **Elementor / Elementor Pro**: Used for page building and styling.
- **SmartSlider**: Used for front-end sliders.
- **TRX Addons**: Theme-related functionality.

## Key Resources
**Main Files**:
- `index.html`: Main landing page.
- `style.css`: Global styles and Elementor CSS.
- `content.txt`: Raw text content used in the project.

**Configuration Structure**:
The project follows a WordPress-like directory structure for its assets, organizing plugins, themes, and uploads within `wp-content/`.

## Usage & Operations
**Key Commands**:
As a static site export, there are no build commands present in the repository. The site can be viewed by opening `index.html` in a browser or serving the root directory.

**Integration Points**:
- **Trustindex**: Integrated via `loader.js` to display reviews or widgets.
- **Google Fonts & Tag Manager**: Referenced in the `index.html` header.

## Validation
**Quality Checks**: Manual inspection of `index.html` and assets.  
**Testing Approach**: Visual verification of the site layout and responsiveness across devices.
