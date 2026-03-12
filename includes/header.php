<?php $current_page = basename($_SERVER['PHP_SELF']); ?>
<!doctype html>
<html lang="en-US" class="no-js scheme_light">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="format-detection" content="telephone=no" />
        <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1" />
        <title>Paanchajanya Eco Villages - Buy Luxury Apartments, Villas and More!</title>
        <meta
            name="description"
            content="PAANCHAJANYA REALITY is one of the leading real estate developers in Hyderabad. Here we have projects like Urban Elite, Premium County, and more. Explore Now!"
        />
        <link rel="canonical" href="index.html" />
        <meta property="og:locale" content="en_US" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="PAANCHAJANYA REALITY - Buy Luxury Apartments, Villas and More!" />
        <meta
            property="og:description"
            content="PAANCHAJANYA REALITY is one of the leading real estate developers in Hyderabad. Here we have projects like Urban Elite, Premium County, and more. Explore Now!"
        />
        <meta property="og:url" content="/" />
        <meta property="og:site_name" content="PAANCHAJANYA REALITY" />
        <meta
            property="og:image"
            content=""
        />
        <meta property="og:image:width" content="2048" />
        <meta property="og:image:height" content="1116" />
        <meta property="og:image:type" content="image/jpeg" />
        <meta property="og:type" content="website" />
        <meta property="og:site_name" content="PAANCHAJANYA REALITY" />
        <meta property="og:description" content="" />
        <meta
            property="og:image"
            content="assests/image/paanchajanya-logo-new.png"
        />

       <style>
            img:is([sizes="auto" i], [sizes^="auto," i]) {
                contain-intrinsic-size: 3000px 1500px;
            }

            /* FORCE IMAGE TO A FIXED VISUAL SIZE */
.about-us-section .elementor-widget-image img {
    width: auto !important;
    max-width: 260px !important;   /* control width */
    max-height: 320px !important;  /* 🔥 KEY FIX */
    height: auto !important;
    object-fit: cover;
    margin: 0 auto;
    display: block;
}

/* Center the image column */
.about-us-section .align-middle {
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Founder name spacing */
.about-us-section .founder-name p {
    margin-top: 10px;
    font-weight: 500;
    text-align: center;
}

/* Mobile fix */
@media (max-width: 767px) {
    .about-us-section .elementor-widget-image img {
        max-width: 220px !important;
        max-height: 260px !important;
    }
}

           /* Section spacing */
.about-us-section {
    padding: 50px 0;
}

/* Text styling */
.about-text p {
    font-size: 16px;
    line-height: 1.8;
    margin-bottom: 14px;
}

/* HARD LIMIT IMAGE SIZE */
.founder-box img {
    width: 100%;
    max-width: 280px;   /* 🔥 KEY LINE – reduce image size */
    height: auto;
    margin: 0 auto;
    display: block;
}

/* Center image vertically */
.align-middle {
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Optional: slightly smaller on large screens */
@media (min-width: 1200px) {
    .founder-box img {
        max-width: 260px;
    }
}

/* Mobile optimization */
@media (max-width: 767px) {
    .founder-box img {
        max-width: 220px;
    }
}
/* FIX slider height on mobile */
@media (max-width: 767px) {

    /* Reduce slider height */
    #n2-ss-10,
    .n2-ss-slider,
    .n2-ss-slider-wrapper-inside {
        height: 320px !important;
        min-height: 320px !important;
    }

    /* Reduce banner text size */
    .n2-ss-text {
        font-size: 20px !important;
        line-height: 1.3 !important;
    }

    /* Fix text spacing */
    .n2-ss-layer {
        padding: 10px !important;
    }

    /* Fix button spacing */
    .n2-ss-button-container {
        margin-top: 10px !important;
    }
}

/* default → page load */
.top_panel .sc_layouts_menu_nav a span {
  color: #ffffff;
  transition: 0.3s ease;
}

/* after scroll */
.top_panel.scrolled .sc_layouts_menu_nav a span {
  color: #000000 !important;
}

<?php if ($current_page != 'index.php') : ?>
/* Non-index page nav styles */
.is-non-index .top_panel,
.is-non-index .top_panel.non-index-nav,
.is-non-index .top_panel.non-index-nav .elementor-section,
.is-non-index .top_panel.non-index-nav .sc_layouts_row {
  background-color: #ffffff !important;
  background-image: none !important;
}
.is-non-index .top_panel.non-index-nav .sc_layouts_menu_nav > li > a span,
.is-non-index .top_panel.non-index-nav .sc_layouts_menu_nav > li > a {
  color: #000000 !important;
}
/* Keep sub-menu links white as they have a dark background */
.is-non-index .top_panel.non-index-nav .sc_layouts_menu_nav .sub-menu a span,
.is-non-index .top_panel.non-index-nav .sc_layouts_menu_nav .sub-menu a {
  color: #ffffff !important;
}
/* Sticky/scrolled header also stays white and keeps link colors */
.is-non-index .top_panel.scrolled,
.is-non-index .top_panel.scrolled .elementor-section,
.is-non-index .top_panel.scrolled .sc_layouts_row {
  background-color: #ffffff !important;
}
.is-non-index .top_panel.scrolled .sc_layouts_menu_nav > li > a span,
.is-non-index .top_panel.scrolled .sc_layouts_menu_nav > li > a {
  color: #000000 !important;
}
.is-non-index .top_panel.scrolled .sc_layouts_menu_nav .sub-menu a span,
.is-non-index .top_panel.scrolled .sc_layouts_menu_nav .sub-menu a {
  color: #ffffff !important;
}
/* Mobile menu links for non-index */
.is-non-index .menu_mobile_nav_area a span,
.is-non-index .menu_mobile_nav_area a {
  color: #000000 !important;
}
/* Burger and Search icons for non-index */
.is-non-index .sc_layouts_menu_mobile_button_burger .sc_layouts_item_icon,
.is-non-index .search_submit:before {
  color: #000000 !important;
}
<?php endif; ?>

        </style>
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
        <link
            property="stylesheet"
            rel="stylesheet"
            id="trx_addons-icons-css"
            href="assests/css/trx_addons_icons.css"
            type="text/css"
            media="all"
        />
        <link
            property="stylesheet"
            rel="stylesheet"
            id="qw_extensions-icons-css"
            href="assests/css/qw_extension_icons.css"
            type="text/css"
            media="all"
        />
        <link
            property="stylesheet"
            rel="stylesheet"
            id="balance-font-google_fonts-css"
            href="css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&#038;subset=latin,latin-ext&#038;display=swap"
            type="text/css"
            media="all"
        />
        <link
            property="stylesheet"
            rel="stylesheet"
            id="balance-fontello-css"
            href="assests/css/fontello.css"
            type="text/css"
            media="all"
        />
        
        <link
            property="stylesheet"
            rel="stylesheet"
            id="awsm-jobs-general-css"
            href="assests/css/general.min.css"
            type="text/css"
            media="all"
        />
        <link
            property="stylesheet"
            rel="stylesheet"
            id="awsm-jobs-style-css"
            href="assests/css/style.min.css"
            type="text/css"
            media="all"
        />
       

        <link
            property="stylesheet"
            rel="stylesheet"
            id="pb_animate-css"
            href="assests/css/animate.css"
            type="text/css"
            media="all"
        />

        <link
            property="stylesheet"
            rel="stylesheet"
            id="bootstrap-css-css"
            href="assests/css/bootstrap.min.css"
            type="text/css"
            media="all"
        />
        <link
            property="stylesheet"
            rel="stylesheet"
            id="bootstrap-icons-css"
            href="assests/css/bootstrap-icons.min.css"
            type="text/css"
            media="all"
        />
        <link
            property="stylesheet"
            rel="stylesheet"
            id="custom-plugin-style-css"
            href="assests/css/style.css"
            type="text/css"
            media="all"
        />
        <link
            property="stylesheet"
            rel="stylesheet"
            id="rt-fontawsome-css"
            href="assests/css/font-awesome.min.css"
            type="text/css"
            media="all"
        />
        
        <link
            property="stylesheet"
            rel="stylesheet"
            id="swiper-css-css"
            href="assests/css/swiper-bundle.min.css"
            type="text/css"
            media="all"
        />

        <link
            property="stylesheet"
            rel="stylesheet"
            id="fancybox-css"
            href="assests/css/jquery.fancybox.min.css"
            type="text/css"
            media="screen"
        />
   
        <link
            property="stylesheet"
            rel="stylesheet"
            id="trx_addons-css"
            href="assests/css/mainstyles.css"
            type="text/css"
            media="all"
        />
        <link
            property="stylesheet"
            rel="stylesheet"
            id="trx_addons-sc_content-css"
            href="assests/css/content.css"
            type="text/css"
            media="all"
        />
        <link
            property="stylesheet"
            rel="stylesheet"
            id="trx_addons-sc_content-responsive-css"
            href="assests/css/content.responsive.css"
            type="text/css"
            media="(max-width:1439px)"
        />
        <link
            property="stylesheet"
            rel="stylesheet"
            id="trx_addons-animations-css"
            href="assests/css/trx_addons.animations.css"
            type="text/css"
            media="all"
        />
        <link
            property="stylesheet"
            rel="stylesheet"
            id="trx_addons-mouse-helper-css"
            href="assests/css/mouse-helper.css"
            type="text/css"
            media="all"
        />
        <link
            property="stylesheet"
            rel="stylesheet"
            id="elementor-icons-css"
            href="assests/css/elementor-icons.min.css"
            type="text/css"
            media="all"
        />
        <link
            property="stylesheet"
            rel="stylesheet"
            id="elementor-frontend-css"
            href="assests/css/custom-frontend.min.css"
            type="text/css"
            media="all"
        />

         <link
            property="stylesheet"
            rel="stylesheet"
            id="elementor-frontend-inline-css"
            href="style.css"
            type="text/css"
            media="all"
        />
        <link
            property="stylesheet"
            rel="stylesheet"
            id="sbistyles-css"
            href="assests/css/sbi-styles.min.css"
            type="text/css"
            media="all"
        />
        <link
            property="stylesheet"
            rel="stylesheet"
            id="widget-heading-css"
            href="assests/css/widget-heading.min.css"
            type="text/css"
            media="all"
        />
        <link
            property="stylesheet"
            rel="stylesheet"
            id="e-motion-fx-css"
            href="assests/css/motion-fx.min.css"
            type="text/css"
            media="all"
        />
        <link
            property="stylesheet"
            rel="stylesheet"
            id="widget-image-css"
            href="assests/css/widget-image.min.css"
            type="text/css"
            media="all"
        />
        <link
            property="stylesheet"
            rel="stylesheet"
            id="e-animation-slideInUp-css"
            href="assests/css/slideInUp.min.css"
            type="text/css"
            media="all"
        />
        <link
            property="stylesheet"
            rel="stylesheet"
            id="widget-spacer-css"
            href="assests/css/widget-spacer.min.css"
            type="text/css"
            media="all"
        />
        <link
            property="stylesheet"
            rel="stylesheet"
            id="swiper-css"
            href="assests/css/swiper.min.css"
            type="text/css"
            media="all"
        />
        <link
            property="stylesheet"
            rel="stylesheet"
            id="e-swiper-css"
            href="assests/css/e-swiper.min.css"
            type="text/css"
            media="all"
        />
        <link
            property="stylesheet"
            rel="stylesheet"
            id="widget-testimonial-carousel-css"
            href="assests/css/custom-pro-widget-testimonial-carousel.min.css"
            type="text/css"
            media="all"
        />
        <link
            property="stylesheet"
            rel="stylesheet"
            id="widget-carousel-module-base-css"
            href="assests/css/widget-carousel-module-base.min.css"
            type="text/css"
            media="all"
        />

<link
    property="stylesheet"
    rel="stylesheet"
    id="widget-divider-css"
    href="assests/css/widget-divider.min.css"
    type="text/css"
    media="all"
/>
<link
    property="stylesheet"
    rel="stylesheet"
    id="ays-pb-min-css"
    href="assests/css/ays-pb-public-min.css"
    type="text/css"
    media="all"
/>
<link
    property="stylesheet"
    rel="stylesheet"
    id="rs-plugin-settings-css"
    href="assests/css/rs6.css"
    type="text/css"
    media="all"
/>


<link
    property="stylesheet"
    rel="stylesheet"
    id="balance-skin-default-css"
    href="assests/css/style2.css"
    type="text/css"
    media="all"
/>
<link
    property="stylesheet"
    rel="stylesheet"
    id="balance-plugins-css"
    href="assests/css/plugins.css"
    type="text/css"
    media="all"
/>
<link
    property="stylesheet"
    rel="stylesheet"
    id="balance-custom-css"
    href="assests/css/custom.css"
    type="text/css"
    media="all"
/>
<link
    property="stylesheet"
    rel="stylesheet"
    id="trx_addons-responsive-css"
    href="assests/css/responsive.css"
    type="text/css"
    media="(max-width:1439px)"
/>
<link
    property="stylesheet"
    rel="stylesheet"
    id="trx_addons-mouse-helper-responsive-css"
    href="assests/css/mouse-helper.responsive.css"
    type="text/css"
    media="(max-width:1279px)"
/>
<link
    property="stylesheet"
    rel="stylesheet"
    id="balance-responsive-css"
    href="assests/css/responsive.css"
    type="text/css"
    media="(max-width:1679px)"
/>
<link
    property="stylesheet"
    rel="stylesheet"
    id="balance-skin-upgrade-styledefault-css"
    href="assests/css/skin-upgrade-style.css"
    type="text/css"
    media="all"
/>
<link
    property="stylesheet"
    rel="stylesheet"
    id="elementor-gf-local-roboto-css"
    href="assests/css/roboto.css?ver=1750453931"
    type="text/css"
    media="all"
/>
<link
    property="stylesheet"
    rel="stylesheet"
    id="elementor-gf-local-robotoslab-css"
    href="assests/css/robotoslab.css?ver=1750453932"
    type="text/css"
    media="all"
/>
<link
    property="stylesheet"
    rel="stylesheet"
    id="elementor-gf-local-poppins-css"
    href="assests/css/poppins.css?ver=1750453934"
    type="text/css"
    media="all"
/>
<link
    property="stylesheet"
    rel="stylesheet"
    id="elementor-icons-shared-0-css"
    href="assests/css/fontawesome.min.css?ver=5.15.3"
    type="text/css"
    media="all"
/>
<link
    property="stylesheet"
    rel="stylesheet"
    id="elementor-icons-fa-brands-css"
    href="assests/css/brands.min.css?ver=5.15.3"
    type="text/css"
    media="all"
/>
<link
    rel="stylesheet"
    type="text/css"
    href="assests/css/smartslider.min.css?ver=52073c7b"
    media="all"
/>


<script>
    (function () {
        this._N2 = this._N2 || {
            _r: [],
            _d: [],
            r: function () {
                this._r.push(arguments);
            },
            d: function () {
                this._d.push(arguments);
            },
        };
    }).call(window);
</script>
<script
    src="assests/js/n2.min.js"
    defer=""
    async=""
></script>
<script
    src="assests/js/smartslider-frontend.min.js"
    defer=""
    async=""
></script>
<script
    src="assests/js/ss-simple.min.js"
    defer=""
    async=""
></script>
<script
    src="assests/js/w-arrow-image.min.js"
    defer=""
    async=""
></script>




<script>
    _N2.r("documentReady", function () {
        _N2.r(["documentReady", "smartslider-frontend", "SmartSliderWidgetArrowImage", "ss-simple"], function () {
            new _N2.SmartSliderSimple("n2-ss-10", {
                admin: false,
                "background.video.mobile": 1,
                loadingTime: 2000,
                alias: { id: 0, smoothScroll: 0, slideSwitch: 0, scroll: 1 },
                align: "normal",
                isDelayed: 0,
                responsive: {
                    mediaQueries: {
                        all: false,
                        desktopportrait: ["(min-width: 1200px)"],
                        tabletportrait: [
                            "(orientation: landscape) and (max-width: 1199px) and (min-width: 901px)",
                            "(orientation: portrait) and (max-width: 1199px) and (min-width: 701px)",
                        ],
                        mobileportrait: [
                            "(orientation: landscape) and (max-width: 900px)",
                            "(orientation: portrait) and (max-width: 700px)",
                        ],
                    },
                    base: {
                        slideOuterWidth: 1260,
                        slideOuterHeight: 750,
                        sliderWidth: 1260,
                        sliderHeight: 750,
                        slideWidth: 1260,
                        slideHeight: 750,
                    },
                    hideOn: {
                        desktopLandscape: false,
                        desktopPortrait: false,
                        tabletLandscape: false,
                        tabletPortrait: false,
                        mobileLandscape: false,
                        mobilePortrait: false,
                    },
                    onResizeEnabled: true,
                    type: "fullwidth",
                    sliderHeightBasedOn: "real",
                    focusUser: 1,
                    focusEdge: "auto",
                    breakpoints: [
                        {
                            device: "tabletPortrait",
                            type: "max-screen-width",
                            portraitWidth: 1199,
                            landscapeWidth: 1199,
                        },
                        { device: "mobilePortrait", type: "max-screen-width", portraitWidth: 700, landscapeWidth: 900 },
                    ],
                    enabledDevices: {
                        desktopLandscape: 0,
                        desktopPortrait: 1,
                        tabletLandscape: 0,
                        tabletPortrait: 1,
                        mobileLandscape: 0,
                        mobilePortrait: 1,
                    },
                    sizes: {
                        desktopPortrait: { width: 1260, height: 750, max: 3000, min: 1200 },
                        tabletPortrait: { width: 701, height: 417, customHeight: false, max: 1199, min: 701 },
                        mobilePortrait: { width: 320, height: 260, customHeight: false, max: 900, min: 320 },
                    },
                    overflowHiddenPage: 0,
                    focus: { offsetTop: "#wpadminbar", offsetBottom: "" },
                },
                controls: { mousewheel: 0, touch: "horizontal", keyboard: 1, blockCarouselInteraction: 1 },
                playWhenVisible: 1,
                playWhenVisibleAt: 0.5,
                lazyLoad: 0,
                lazyLoadNeighbor: 0,
                blockrightclick: 0,
                maintainSession: 0,
                autoplay: {
                    enabled: 1,
                    start: 1,
                    duration: 3000,
                    autoplayLoop: 1,
                    allowReStart: 0,
                    pause: { click: 0, mouse: "0", mediaStarted: 1 },
                    resume: { click: 0, mouse: "0", mediaEnded: 1, slidechanged: 0 },
                    interval: 1,
                    intervalModifier: "loop",
                    intervalSlide: "current",
                },
                perspective: 1500,
                layerMode: { playOnce: 0, playFirstLayer: 1, mode: "skippable", inAnimation: "mainInEnd" },
                bgAnimations: 0,
                mainanimation: {
                    type: "fade",
                    duration: 800,
                    delay: 0,
                    ease: "easeOutQuad",
                    shiftedBackgroundAnimation: 0,
                },
                carousel: 1,
                initCallbacks: function () {
                    new _N2.SmartSliderWidgetArrowImage(this);
                },
            });
        });
    });
</script>

<script
    type="text/javascript"
    src="assests/js/jquery.min.js"
    id="jquery-core-js"
></script>  
<script
    type="text/javascript"
    src="assests/js/jquery-migrate.min.js"
    id="jquery-migrate-js"
></script>

<link rel="stylesheet" href="assests/css/whatsapp-widget.css">
</head>

<body class="home page-template-default page page-id-26735 wp-custom-logo sp-easy-accordion-enabled rttpg rttpg-7.7.19 radius-frontend rttpg-body-wrap rttpg-flaticon frontpage skin_default scheme_light blog_mode_front body_style_fullscreen  is_stream blog_style_classic_3 sidebar_hide expand_content remove_margins trx_addons_present header_type_custom header_style_header-custom-20908 header_position_over menu_side_none no_layout fixed_blocks_sticky elementor-default elementor-kit-15 elementor-page elementor-page-26735 <?php echo ($current_page != 'index.php') ? 'is-non-index' : ''; ?>">
    

        
    <div class="body_wrap">

        
        <div class="page_wrap">

<!-- header start -->
                <header class="top_panel top_panel_custom top_panel_custom_20908 top_panel_custom_header-default-single              without_bg_image <?php echo ($current_page != 'index.php') ? 'non-index-nav' : ''; ?>">
            <div data-elementor-type="cpt_layouts" data-elementor-id="20908" class="elementor elementor-20908" data-elementor-post-type="cpt_layouts">
                        <section class="elementor-section elementor-top-section elementor-element elementor-element-4ce9290 elementor-section-full_width elementor-section-content-middle sc_layouts_row sc_layouts_row_type_compact sc_layouts_hide_on_mobile sc_layouts_hide_on_tablet scheme_blue_light elementor-section-height-default elementor-section-height-default sc_fly_static" data-id="4ce9290" data-element_type="section">
                        <div class="elementor-container elementor-column-gap-extended">
                    <div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-20c78be sc_layouts_column_align_left sc_layouts_column sc_inner_width_none sc_content_align_inherit sc_layouts_column_icons_position_left sc_fly_static" data-id="20c78be" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                        <div class="sc_layouts_item elementor-element elementor-element-4b817d3 sc_fly_static elementor-widget elementor-widget-trx_sc_layouts_logo" data-id="4b817d3" data-element_type="widget" data-widget_type="trx_sc_layouts_logo.default">
                <div class="elementor-widget-container">
                    <a href="index.php" class="sc_layouts_logo sc_layouts_logo_default trx_addons_inline_392944631"><img loading="lazy" class="logo_image" src="assests/image/paanchajanya-logo-new.png" alt="PAANCHAJANYA REALITY" width="300" height="107"></a>               </div>
                </div>
                    </div>
        </div>
                <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-1bf09f9 sc_layouts_column_align_center sc_layouts_column sc_inner_width_none sc_content_align_inherit sc_layouts_column_icons_position_left sc_fly_static" data-id="1bf09f9" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                        <div class="sc_layouts_item elementor-element elementor-element-6a89ac9 sc_fly_static elementor-widget elementor-widget-trx_sc_layouts_menu" data-id="6a89ac9" data-element_type="widget" data-widget_type="trx_sc_layouts_menu.default">
                <div class="elementor-widget-container">
                   <!-- desktop menu -->
                <nav
    class="sc_layouts_menu sc_layouts_menu_default sc_layouts_menu_dir_horizontal menu_hover_zoom_line"
    data-animation-in="fadeIn"
    data-animation-out="fadeOut"
>
    <ul id="sc_layouts_menu_575918428" class="sc_layouts_menu_nav">
        <li id="menu-item-28238" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-28238">
            <a href="aboutus.php"><span style="color: #ffffff">About Us</span></a>
        </li>
        <li
            id="menu-item-18327"
            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-18327"
        >
            <a href="javascript:void(0);"><span style="color: #ffffff">Projects</span></a>
            <ul class="sub-menu">
                <li
                    id="menu-item-30409"
                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-30409"
                >
                    <a href="#"><span>Current Projects</span></a>
                    <ul class="sub-menu">
                        <li
                            id="menu-item-28243"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-28243"
                        >
                            <a href="projects/drr-premium-county/"><span>DRR Premium County</span></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <li id="menu-item-28263" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-28263">
            <a href="partner-with-us.php"><span style="color: #ffffff">Partner with us</span></a>
        </li>
        <li id="menu-item-28263" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-28263">
            <a href="blog.php"><span style="color: #ffffff">Blog</span></a>
        </li>
        <li id="menu-item-28263" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-28263">
            <a href="contactus.php"><span style="color: #ffffff">Contact Us</span></a>
        </li>
    </ul>
</nav>

             </div>
                </div>
                    </div>
        </div>
                <div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-1ebc36d sc_layouts_column_align_right sc_layouts_column sc_inner_width_none sc_content_align_inherit sc_layouts_column_icons_position_left sc_fly_static" data-id="1ebc36d" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                        <div class="sc_layouts_item elementor-element elementor-element-aa78090 elementor-hidden-desktop elementor-hidden-laptop elementor-hidden-tablet elementor-hidden-mobile sc_layouts_hide_on_wide sc_layouts_hide_on_desktop sc_layouts_hide_on_notebook sc_layouts_hide_on_tablet sc_layouts_hide_on_mobile sc_fly_static elementor-widget elementor-widget-trx_sc_layouts_search" data-id="aa78090" data-element_type="widget" data-widget_type="trx_sc_layouts_search.default">
                <div class="elementor-widget-container">
                    <div class="sc_layouts_search hide_on_wide hide_on_desktop hide_on_notebook hide_on_tablet hide_on_mobile">
    <div class="search_modern">
        <span class="search_submit"></span>
        <div class="search_wrap scheme_dark">
            <div class="search_header_wrap"><img class="logo_image" src="wp-content/uploads/2024/01/logo-2.png" srcset="wp-content/uploads/2024/01/logo-2-retina.png 2x" alt="Paanchajanya Eco Villages">                <a class="search_close"></a>
            </div>
            <div class="search_form_wrap">
                <form role="search" method="get" class="search_form" action="#">
                    <input type="hidden" value="" name="post_types">
                    <input type="text" class="search_field" placeholder="Type words and hit enter" value="" name="s">
                    <button type="submit" class="search_submit"></button>
                                    </form>
            </div>
        </div>
        <div class="search_overlay scheme_dark"></div>
    </div>


</div><!-- /.sc_layouts_search -->              </div>
                </div>
                <div class="sc_layouts_item elementor-element elementor-element-98eda0f elementor-hidden-desktop elementor-hidden-laptop elementor-hidden-tablet elementor-hidden-mobile sc_layouts_hide_on_wide sc_layouts_hide_on_desktop sc_layouts_hide_on_notebook sc_layouts_hide_on_tablet sc_layouts_hide_on_mobile elementor-view-default sc_fly_static elementor-widget elementor-widget-icon" data-id="98eda0f" data-element_type="widget" data-widget_type="icon.default">
                <div class="elementor-widget-container">
                            <div class="elementor-icon-wrapper">
            <a class="elementor-icon" href="#panel-bar">
            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewbox="0 0 21 21"><g id="Right_Bar" data-name="Right Bar" transform="translate(-2124 -2665)"><g id="Ellipse_362" data-name="Ellipse 362" transform="translate(2124 2665)" fill="none" stroke-width="1.5"><circle cx="2.5" cy="2.5" r="2.5" stroke="none"></circle><circle cx="2.5" cy="2.5" r="1.75" fill="none"></circle></g><g id="Ellipse_363" data-name="Ellipse 363" transform="translate(2132 2665)" fill="none" stroke-width="1.5"><circle cx="2.5" cy="2.5" r="2.5" stroke="none"></circle><circle cx="2.5" cy="2.5" r="1.75" fill="none"></circle></g><g id="Ellipse_364" data-name="Ellipse 364" transform="translate(2140 2665)" fill="none" stroke-width="1.5"><circle cx="2.5" cy="2.5" r="2.5" stroke="none"></circle><circle cx="2.5" cy="2.5" r="1.75" fill="none"></circle></g><g id="Ellipse_365" data-name="Ellipse 365" transform="translate(2124 2673)" fill="none" stroke-width="1.5"><circle cx="2.5" cy="2.5" r="2.5" stroke="none"></circle><circle cx="2.5" cy="2.5" r="1.75" fill="none"></circle></g><g id="Ellipse_366" data-name="Ellipse 366" transform="translate(2132 2673)" fill="none" stroke-width="1.5"><circle cx="2.5" cy="2.5" r="2.5" stroke="none"></circle><circle cx="2.5" cy="2.5" r="1.75" fill="none"></circle></g><g id="Ellipse_367" data-name="Ellipse 367" transform="translate(2140 2673)" fill="none" stroke-width="1.5"><circle cx="2.5" cy="2.5" r="2.5" stroke="none"></circle><circle cx="2.5" cy="2.5" r="1.75" fill="none"></circle></g><g id="Ellipse_368" data-name="Ellipse 368" transform="translate(2124 2681)" fill="none" stroke-width="1.5"><circle cx="2.5" cy="2.5" r="2.5" stroke="none"></circle><circle cx="2.5" cy="2.5" r="1.75" fill="none"></circle></g><g id="Ellipse_369" data-name="Ellipse 369" transform="translate(2132 2681)" fill="none" stroke-width="1.5"><circle cx="2.5" cy="2.5" r="2.5" stroke="none"></circle><circle cx="2.5" cy="2.5" r="1.75" fill="none"></circle></g><g id="Ellipse_370" data-name="Ellipse 370" transform="translate(2140 2681)" fill="none" stroke-width="1.5"><circle cx="2.5" cy="2.5" r="2.5" stroke="none"></circle><circle cx="2.5" cy="2.5" r="1.75" fill="none"></circle></g></g></svg>           </a>
        </div>
                        </div>
                </div>
                    </div>
        </div>
                    </div>
        </section>
                <section class="elementor-section elementor-top-section elementor-element elementor-element-588654d elementor-section-content-middle sc_layouts_row sc_layouts_row_type_compact sc_layouts_hide_on_wide sc_layouts_hide_on_desktop sc_layouts_hide_on_notebook elementor-section-boxed elementor-section-height-default elementor-section-height-default sc_fly_static" data-id="588654d" data-element_type="section">
                        <div class="elementor-container elementor-column-gap-extended">
                    <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-7bbeacd sc_inner_width_none sc_content_align_inherit sc_layouts_column_icons_position_left sc_fly_static" data-id="7bbeacd" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                        <div class="sc_layouts_item elementor-element elementor-element-8396154 sc_fly_static elementor-widget elementor-widget-trx_sc_layouts_logo" data-id="8396154" data-element_type="widget" data-widget_type="trx_sc_layouts_logo.default">
                <div class="elementor-widget-container">
                    <a href="#" class="sc_layouts_logo sc_layouts_logo_default trx_addons_inline_44574643"><img loading="lazy" class="logo_image" src="assests/image/paanchajanya-logo-new.png" alt="PAANCHAJANYA REALITY" width="300" height="107"></a>                </div>
                </div>
                    </div>
        </div>
                <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-2ccb63a sc_layouts_column_align_right sc_layouts_column sc_inner_width_none sc_content_align_inherit sc_layouts_column_icons_position_left sc_fly_static" data-id="2ccb63a" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                        <div class="sc_layouts_item elementor-element elementor-element-a4c99ef elementor-hidden-desktop elementor-hidden-laptop elementor-hidden-tablet elementor-hidden-mobile sc_layouts_hide_on_wide sc_layouts_hide_on_desktop sc_layouts_hide_on_notebook sc_layouts_hide_on_tablet sc_layouts_hide_on_mobile sc_fly_static elementor-widget elementor-widget-trx_sc_layouts_search" data-id="a4c99ef" data-element_type="widget" data-widget_type="trx_sc_layouts_search.default">
                <div class="elementor-widget-container">
                    <div class="sc_layouts_search hide_on_wide hide_on_desktop hide_on_notebook hide_on_tablet hide_on_mobile">
    <div class="search_modern">
        <span class="search_submit"></span>
        <div class="search_wrap scheme_dark">
            <div class="search_header_wrap"><img class="logo_image" src="wp-content/uploads/2024/01/logo-2.png" srcset="wp-content/uploads/2024/01/logo-2-retina.png 2x" alt="PAANCHAJANYA REALITY">                <a class="search_close"></a>
            </div>
            <div class="search_form_wrap">
                <form role="search" method="get" class="search_form" action="javascript:void(0);">
                    <input type="hidden" value="" name="post_types">
                    <input type="text" class="search_field" placeholder="Type words and hit enter" value="" name="s">
                    <button type="submit" class="search_submit"></button>
                                    </form>
            </div>
        </div>
        <div class="search_overlay scheme_dark"></div>
    </div>


</div><!-- /.sc_layouts_search -->              </div>
                </div>
                <div class="sc_layouts_item elementor-element elementor-element-4e71c63 sc_fly_static elementor-widget elementor-widget-trx_sc_layouts_menu" data-id="4e71c63" data-element_type="widget" data-widget_type="trx_sc_layouts_menu.default">
                <div class="elementor-widget-container">
                    <div class="sc_layouts_iconed_text sc_layouts_menu_mobile_button_burger sc_layouts_menu_mobile_button without_menu">
        <a class="sc_layouts_item_link sc_layouts_iconed_text_link" href="#">
            <span class="sc_layouts_item_icon sc_layouts_iconed_text_icon trx_addons_icon-menu"></span>
        </a>
        </div>              </div>
                </div>
                    </div>
        </div>
                    </div>
        </section>
                </div>
        </header>
        <!-- header end -->

<div class="menu_mobile_overlay scheme_dark"></div>
<div class="menu_mobile menu_mobile_fullscreen scheme_dark">
    <div class="menu_mobile_inner with_widgets">
        <div class="menu_mobile_header_wrap">
            <a class="sc_layouts_logo" href="index.htm">
        <span class="logo_text">PAANCHAJANYA REALITY</span> </a>
    
            <a class="menu_mobile_close menu_button_close" tabindex="0"><span class="menu_button_close_text">Close</span><span class="menu_button_close_icon"></span></a>
        </div>
        <div class="menu_mobile_content_wrap content_wrap">
            <div class="menu_mobile_content_wrap_inner"><nav class="menu_mobile_nav_area" itemscope="itemscope" itemtype="https://schema.org/SiteNavigationElement"><ul id="menu_mobile_252574338"><li id="menu_mobile-item-28238" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-28238"><a href="javascript:void(0);"><span style="color: #ffffff;">About Us</span></a></li><li id="menu_mobile-item-18327" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-18327"><a href="javascript:void(0);"><span style="color: #FFFFFF;">Projects</span></a>
<ul class="sub-menu"><li id="menu_mobile-item-30409" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-30409"><a href="#"><span>Current Projects</span></a>
    <ul class="sub-menu"><li id="menu_mobile-item-28243" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-28243"><a href="javascript:void(0);"><span>DRR Premium County</span></a></li></ul>
</li></ul>
</li><li id="menu_mobile-item-28263" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-28263"><a href="javascript:void(0);"><span style="color: #FFFFFF;">Media</span></a></li> <li id="menu_mobile-item-28263" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-28263"><a href="javascript:void(0);"><span style="color: #FFFFFF;">Media</span></a></li></ul> <li id="menu_mobile-item-28263" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-28263"><a href="javascript:void(0);"><span style="color: #FFFFFF;">Contact Us</span></a></li></ul></nav><div class="socials_mobile"><a target="_blank" href="javascript:void(0);" class="social_item social_item_style_icons sc_icon_type_icons social_item_type_icons"><span class="social_icon social_icon_facebook-1" style=""><span class="icon-facebook-1"></span></span></a><a target="_blank" href="javascript:void(0);" class="social_item social_item_style_icons sc_icon_type_icons social_item_type_icons"><span class="social_icon social_icon_instagram" style=""><span class="icon-instagram"></span></span></a><a target="_blank" href="javascript:void(0);" class="social_item social_item_style_icons sc_icon_type_icons social_item_type_icons"><span class="social_icon social_icon_youtube2" style=""><span class="trx_addons_icon-youtube2"></span></span></a></div>            </div>
        </div><div class="menu_mobile_widgets_area"></div>
    </div>
</div>