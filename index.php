
<?php include 'includes/header.php'; ?>
<?php include 'includes/db.php'; ?>
<?php
$stmt = $pdo->query("SELECT * FROM sliders WHERE is_active = 1 ORDER BY `order` ASC");
$sliders = $stmt->fetchAll();
?>
            
            
            
            <div class="page_content_wrap">
                                <div class="content_wrap_fullscreen">

                    
                    <div class="content">
                                                <a id="content_skip_link_anchor" class="balance_skip_link_anchor" href="#"></a>
                        
<article id="post-26735" class="post_item_single post_type_page post-26735 page type-page status-publish hentry">

    
    <div class="post_content entry-content">
                <div data-elementor-type="wp-page" data-elementor-id="26735" class="elementor elementor-26735" data-elementor-post-type="page">
                        
        
       <!-- banner slider start -->
<section
    class="elementor-section elementor-top-section elementor-element elementor-element-fc5e0f5 elementor-section-full_width elementor-section-height-default elementor-section-height-default sc_fly_static"
    data-id="fc5e0f5"
    data-element_type="section"
>
    <div class="elementor-container elementor-column-gap-extended">
        <div
            class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-81a581d sc_inner_width_none sc_content_align_inherit sc_layouts_column_icons_position_left sc_fly_static"
            data-id="81a581d"
            data-element_type="column"
        >
            <div class="elementor-widget-wrap elementor-element-populated">
                <div
                    class="elementor-element elementor-element-4399e87 sc_fly_static elementor-widget elementor-widget-shortcode"
                    data-id="4399e87"
                    data-element_type="widget"
                    data-widget_type="shortcode.default"
                >
                    <div class="elementor-widget-container">
                        <div class="elementor-shortcode">
                            <div
                                class="n2-section-smartslider fitvidsignore n2_clear"
                                data-ssid="10"
                                tabindex="0"
                                role="region"
                                aria-label="Slider"
                            >
                                <div id="n2-ss-10-align" class="n2-ss-align">
                                    <div class="n2-padding">
                                        <div
                                            id="n2-ss-10"
                                            data-creator="Smart Slider 3"
                                            data-responsive="fullwidth"
                                            class="n2-ss-slider n2-ow n2-has-hover n2notransition"
                                        >
                                            <div class="n2-ss-slider-wrapper-inside">
                                                <div class="n2-ss-slider-1 n2_ss__touch_element n2-ow">
                                                    <div class="n2-ss-slider-2 n2-ow">
                                                        <div class="n2-ss-slider-3 n2-ow">
                                                            <div class="n2-ss-slide-backgrounds n2-ow-all">
                                                                <?php foreach ($sliders as $index => $slider): ?>
                                                                <div
                                                                    class="n2-ss-slide-background"
                                                                    data-public-id="<?php echo $index + 1; ?>"
                                                                    data-mode="fill"
                                                                >
                                                                    <div
                                                                        class="n2-ss-slide-background-image"
                                                                        data-blur="0"
                                                                        data-opacity="100"
                                                                        data-x="50"
                                                                        data-y="50"
                                                                        data-alt="<?php echo htmlspecialchars($slider['title'] ?? ''); ?>"
                                                                        data-title="<?php echo htmlspecialchars($slider['title'] ?? ''); ?>"
                                                                    >
                                                                        <picture class="skip-lazy" data-skip-lazy="1"
                                                                            ><img
                                                                                decoding="async"
                                                                                src="admin/public/storage/<?php echo $slider['image']; ?>"
                                                                                alt="<?php echo htmlspecialchars($slider['title'] ?? ''); ?>"
                                                                                title="<?php echo htmlspecialchars($slider['title'] ?? ''); ?>"
                                                                                loading="lazy"
                                                                                class="skip-lazy"
                                                                                data-skip-lazy="1"
                                                                        /></picture>
                                                                    </div>
                                                                    <div
                                                                        data-color="RGBA(0,0,0,0.41)"
                                                                        style="background-color: RGBA(0, 0, 0, 0.41)"
                                                                        class="n2-ss-slide-background-color"
                                                                        data-overlay="1"
                                                                    ></div>
                                                                </div>
                                                                <?php endforeach; ?>
                                                            </div>
                                                            <div class="n2-ss-slider-4 n2-ow">
                                                                <svg
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    viewbox="0 0 1260 750"
                                                                    data-related-device="desktopPortrait"
                                                                    class="n2-ow n2-ss-preserve-size n2-ss-preserve-size--slider n2-ss-slide-limiter"
                                                                ></svg>
                                                                <?php foreach ($sliders as $index => $slider): ?>
                                                                <div
                                                                    data-first="<?php echo $index === 0 ? '1' : '0'; ?>"
                                                                    data-slide-duration="0"
                                                                    data-id="<?php echo 69 + $index; ?>"
                                                                    data-slide-public-id="<?php echo $index + 1; ?>"
                                                                    data-title="<?php echo htmlspecialchars($slider['title'] ?? 'Slide'); ?>"
                                                                    class="n2-ss-slide n2-ow n2-ss-slide-<?php echo 69 + $index; ?>"
                                                                >
                                                                    <div
                                                                        role="note"
                                                                        class="n2-ss-slide--focus"
                                                                        tabindex="-1"
                                                                    >
                                                                        <?php echo htmlspecialchars($slider['title'] ?? 'Slide'); ?>
                                                                    </div>
                                                                    <div
                                                                        class="n2-ss-layers-container n2-ss-slide-limiter n2-ow"
                                                                    >
                                                                        <div
                                                                            class="n2-ss-layer n2-ow n-uc-HsRl2sehyV33"
                                                                            data-sstype="slide"
                                                                            data-pm="default"
                                                                        >
                                                                            <div
                                                                                class="n2-ss-layer n2-ow n-uc-9rlrHGNjqbv4"
                                                                                data-pm="default"
                                                                                data-sstype="content"
                                                                                data-hasbackground="0"
                                                                            >
                                                                                <div
                                                                                    class="n2-ss-section-main-content n2-ss-layer-with-background n2-ss-layer-content n2-ow n-uc-9rlrHGNjqbv4-inner"
                                                                                >
                                                                                    <div
                                                                                        class="n2-ss-layer n2-ow n2-ss-layer--block n2-ss-has-self-align n-uc-x5qDrX9DcsEI"
                                                                                        data-pm="normal"
                                                                                        data-sstype="row"
                                                                                    >
                                                                                        <div
                                                                                            class="n2-ss-layer-row n2-ss-layer-with-background n-uc-x5qDrX9DcsEI-inner"
                                                                                        >
                                                                                            <div
                                                                                                class="n2-ss-layer-row-inner"
                                                                                            >
                                                                                                <div
                                                                                                    class="n2-ss-layer n2-ow n-uc-UfJCaJSp2rk2"
                                                                                                    data-pm="default"
                                                                                                    data-sstype="col"
                                                                                                >
                                                                                                    <div
                                                                                                        class="n2-ss-layer-col n2-ss-layer-with-background n2-ss-layer-content n-uc-UfJCaJSp2rk2-inner"
                                                                                                    >
                                                                                                        <div
                                                                                                            class="n2-ss-layer n2-ow n-uc-0MvHUhmKQD2B"
                                                                                                            data-pm="normal"
                                                                                                            data-sstype="layer"
                                                                                                        >
                                                                                                            <div
                                                                                                                id="n2-ss-10item<?php echo $index * 2 + 1; ?>"
                                                                                                                class="n2-font-50dc700098640c141c34c6546eae3f8d-hover n2-style-f8293b450b12ef15d5c4ff97a617a3e3-heading n2-ss-item-content n2-ss-text n2-ow"
                                                                                                                style="
                                                                                                                    display: block;
                                                                                                                "
                                                                                                            >
                                                                                                                <br />
                                                                                                                <span
                                                                                                                    style="
                                                                                                                        font-weight: 300;
                                                                                                                        font-style: bold;
                                                                                                                    "
                                                                                                                    ><?php echo htmlspecialchars($slider['title'] ?? ''); ?></span
                                                                                                                ><br />
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="n2-ss-layer n2-ow n-uc-SxH7Q52nQtqW n2-ss-layer--auto"
                                                                                                            data-pm="normal"
                                                                                                            data-sstype="layer"
                                                                                                        >
                                                                                                            <?php if (!empty($slider['link'])): ?>
                                                                                                            <div
                                                                                                                class="n2-ss-button-container n2-ss-item-content n2-ow n2-font-16248716f1d5831bb54a9dc1b02d167d-link n2-ss-nowrap n2-ss-button-container--non-full-width"
                                                                                                            >
                                                                                                                <a
                                                                                                                    class="n2-style-4e71a4f43fe4ff5a6b7ac2f8ef7bf4e8-heading n2-ow"
                                                                                                                    href="<?php echo htmlspecialchars($slider['link']); ?>"
                                                                                                                    ><div>
                                                                                                                        <div>
                                                                                                                            <?php echo htmlspecialchars($slider['link_text'] ?? 'Know More'); ?>
                                                                                                                            ➔
                                                                                                                        </div>
                                                                                                                    </div></a
                                                                                                                >
                                                                                                            </div>
                                                                                                            <?php endif; ?>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php endforeach; ?>
                                                            </div>

                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div
                                                    class="n2-ss-slider-controls n2-ss-slider-controls-absolute-right-center"
                                                >
                                                    <div
                                                        style="--widget-offset: 15px"
                                                        class="n2-ss-widget n2-style-9de64a8e0b54fae7f954a22251ebff19-heading nextend-arrow n2-ow-all nextend-arrow-next nextend-arrow-animated-fade"
                                                        data-hide-mobileportrait="1"
                                                        id="n2-ss-10-arrow-next"
                                                        role="button"
                                                        aria-label="next arrow"
                                                        tabindex="0"
                                                    >
                                                        <img
                                                            decoding="async"
                                                            width="32"
                                                            height="32"
                                                            class="n2-arrow-normal-img skip-lazy"
                                                            data-skip-lazy="1"
                                                            src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzIiIGhlaWdodD0iMzIiIHZpZXdCb3g9IjAgMCAzMiAzMiIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KICAgIDxwYXRoIGQ9Ik0xMC43MjIgNC4yOTNjLS4zOTQtLjM5LTEuMDMyLS4zOS0xLjQyNyAwLS4zOTMuMzktLjM5MyAxLjAzIDAgMS40MmwxMS4yODMgMTAuMjgtMTEuMjgzIDEwLjI5Yy0uMzkzLjM5LS4zOTMgMS4wMiAwIDEuNDIuMzk1LjM5IDEuMDMzLjM5IDEuNDI3IDBsMTIuMDA3LTEwLjk0Yy4yMS0uMjEuMy0uNDkuMjg0LS43Ny4wMTQtLjI3LS4wNzYtLjU1LS4yODYtLjc2TDEwLjcyIDQuMjkzeiIKICAgICAgICAgIGZpbGw9IiMwMDAwMDAiIG9wYWNpdHk9IjEiIGZpbGwtcnVsZT0iZXZlbm9kZCIvPgo8L3N2Zz4="
                                                            alt="next arrow"
                                                        /><img
                                                            loading="lazy"
                                                            decoding="async"
                                                            width="32"
                                                            height="32"
                                                            class="n2-arrow-hover-img skip-lazy"
                                                            data-skip-lazy="1"
                                                            src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzIiIGhlaWdodD0iMzIiIHZpZXdCb3g9IjAgMCAzMiAzMiIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KICAgIDxwYXRoIGQ9Ik0xMC43MjIgNC4yOTNjLS4zOTQtLjM5LTEuMDMyLS4zOS0xLjQyNyAwLS4zOTMuMzktLjM5MyAxLjAzIDAgMS40MmwxMS4yODMgMTAuMjgtMTEuMjgzIDEwLjI5Yy0uMzkzLjM5LS4zOTMgMS4wMiAwIDEuNDIuMzk1LjM5IDEuMDMzLjM5IDEuNDI3IDBsMTIuMDA3LTEwLjk0Yy4yMS0uMjEuMy0uNDkuMjg0LS43Ny4wMTQtLjI3LS4wNzYtLjU1LS4yODYtLjc2TDEwLjcyIDQuMjkzeiIKICAgICAgICAgIGZpbGw9IiNmZmZmZmYiIG9wYWNpdHk9IjEiIGZpbGwtcnVsZT0iZXZlbm9kZCIvPgo8L3N2Zz4="
                                                            alt="next arrow"
                                                        />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <ss3-loader></ss3-loader>
                                    </div>
                                </div>
                                <div class="n2_clear"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- banner slider end -->


                <!-- passionate section start -->
                <section class="elementor-section elementor-top-section elementor-element elementor-element-a1490fe elementor-section-full_width elementor-section-height-default elementor-section-height-default sc_fly_static" data-id="a1490fe" data-element_type="section">
                        <div class="elementor-container elementor-column-gap-extended">
                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-b3d77cb sc_inner_width_none sc_content_align_inherit sc_layouts_column_icons_position_left sc_fly_static" data-id="b3d77cb" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                        <section class="elementor-section elementor-inner-section elementor-element elementor-element-0cef163 elementor-section-full_width elementor-section-height-default elementor-section-height-default sc_fly_static" data-id="0cef163" data-element_type="section">
                        <div class="elementor-container elementor-column-gap-extended">
                    <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-5636a9d sc_inner_width_none sc_content_align_inherit sc_layouts_column_icons_position_left sc_fly_static" data-id="5636a9d" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                        <div class="elementor-element elementor-element-1e06928 elementor-widget-mobile__width-initial sc_fly_static elementor-widget elementor-widget-heading" data-id="1e06928" data-element_type="widget" data-widget_type="heading.default">
                <div class="elementor-widget-container">
                    <h2 class="elementor-heading-title elementor-size-default" style="color:white;">. </h2> </div>
                </div>
                <div class="elementor-element elementor-element-2dc6c0c elementor-absolute sc_fly_static elementor-widget elementor-widget-heading" data-id="2dc6c0c" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;}" data-widget_type="heading.default">
                <div class="elementor-widget-container">
                               </div>
                </div>
                    </div>
        </div>
                <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-03e4e66 sc_inner_width_none sc_content_align_inherit sc_layouts_column_icons_position_left sc_fly_static" data-id="03e4e66" data-element_type="column">
            <div class="elementor-widget-wrap">
                            </div>
        </div>
                    </div>
        </section>

        <!-- passionate section end -->
        <!-- bubble start -->
                <section class="elementor-section-with-custom-width elementor-section elementor-inner-section elementor-element elementor-element-fee331a elementor-section-boxed elementor-section-height-default elementor-section-height-default sc_fly_static" data-id="fee331a" data-element_type="section">
                        <div class="elementor-container elementor-column-gap-extended">
                    <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-046dfdf sc_inner_width_none sc_content_align_inherit sc_layouts_column_icons_position_left sc_fly_static" data-id="046dfdf" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                        <div class="elementor-element elementor-element-47d89f7 elementor-absolute elementor-widget-mobile__width-initial sc_fly_static elementor-widget elementor-widget-image" data-id="47d89f7" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;,&quot;motion_fx_motion_fx_scrolling&quot;:&quot;yes&quot;,&quot;motion_fx_scale_effect&quot;:&quot;yes&quot;,&quot;motion_fx_scale_range&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:{&quot;start&quot;:0,&quot;end&quot;:100}},&quot;motion_fx_scale_direction&quot;:&quot;out-in&quot;,&quot;motion_fx_scale_speed&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:4,&quot;sizes&quot;:[]},&quot;motion_fx_devices&quot;:[&quot;desktop&quot;,&quot;laptop&quot;,&quot;tablet&quot;,&quot;mobile&quot;]}" data-widget_type="image.default">
                <div class="elementor-widget-container">
                                                            <img loading="lazy" decoding="async" width="1167" height="497" src="assests/image/slide3.png" class="attachment-full size-full wp-image-26548" alt="ankura villas">                                                           </div>
                </div>
                    </div>
        </div>
                    </div>
        </section>
        <!-- bubble end -->

      
                    </div>
        </div>
                    </div>
        </section>

        <!-- section 5 start -->
                <section class="elementor-section elementor-top-section elementor-element elementor-element-e8b117a elementor-section-full_width elementor-section-height-default elementor-section-height-default sc_fly_static" data-id="e8b117a" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                            <div class="elementor-background-overlay"></div>
                            <div class="elementor-container elementor-column-gap-extended">
                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-88b25eb sc_inner_width_none sc_content_align_inherit sc_layouts_column_icons_position_left sc_fly_static" data-id="88b25eb" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                        <section class="elementor-section elementor-inner-section elementor-element elementor-element-8f5d85d elementor-section-full_width elementor-section-height-default elementor-section-height-default sc_fly_static" data-id="8f5d85d" data-element_type="section">
                        <div class="elementor-container elementor-column-gap-extended">
                    <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-aeb1835 sc_inner_width_none sc_content_align_inherit sc_layouts_column_icons_position_left sc_fly_static" data-id="aeb1835" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                        <div class="elementor-element elementor-element-8d07955 sc_fly_static elementor-widget elementor-widget-heading" data-id="8d07955" data-element_type="widget" data-settings="{&quot;motion_fx_motion_fx_scrolling&quot;:&quot;yes&quot;,&quot;motion_fx_translateX_effect&quot;:&quot;yes&quot;,&quot;motion_fx_translateX_direction&quot;:&quot;negative&quot;,&quot;motion_fx_translateX_affectedRange&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:{&quot;start&quot;:0,&quot;end&quot;:50}},&quot;motion_fx_translateX_speed&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:4,&quot;sizes&quot;:[]},&quot;motion_fx_devices&quot;:[&quot;desktop&quot;,&quot;laptop&quot;,&quot;tablet&quot;,&quot;mobile&quot;]}" data-widget_type="heading.default">
                <div class="elementor-widget-container">
                    <h2 class="elementor-heading-title elementor-size-default">Where Smart Planning <br>Meets Strong Returns</h2>               </div>
                </div>
                    </div>
        </div>
                    </div>
        </section>

        
                <section class="elementor-section elementor-inner-section elementor-element elementor-element-9a80917 elementor-section-full_width elementor-section-height-default elementor-section-height-default sc_fly_static" data-id="9a80917" data-element_type="section">
                        <div class="elementor-container elementor-column-gap-extended">
                    <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-f0c8fbc sc_inner_width_none sc_content_align_inherit sc_layouts_column_icons_position_left sc_fly_static" data-id="f0c8fbc" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                        <div class="elementor-element elementor-element-d9904b6 sc_fly_static elementor-widget elementor-widget-image" data-id="d9904b6" data-element_type="widget" data-settings="{&quot;motion_fx_motion_fx_scrolling&quot;:&quot;yes&quot;,&quot;motion_fx_translateX_effect&quot;:&quot;yes&quot;,&quot;motion_fx_translateY_effect&quot;:&quot;yes&quot;,&quot;motion_fx_translateY_speed&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:0,&quot;sizes&quot;:[]},&quot;motion_fx_translateY_affectedRange&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:{&quot;start&quot;:0,&quot;end&quot;:100}},&quot;motion_fx_translateX_speed&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:4,&quot;sizes&quot;:[]},&quot;motion_fx_translateX_affectedRange&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:{&quot;start&quot;:0,&quot;end&quot;:100}},&quot;motion_fx_devices&quot;:[&quot;desktop&quot;,&quot;laptop&quot;,&quot;tablet&quot;,&quot;mobile&quot;]}" data-widget_type="image.default">
                <div class="elementor-widget-container">
                                                            <img loading="lazy" decoding="async" width="1140" height="630" src="wp-content/uploads/iamge4.png" class="attachment-full size-full wp-image-26531" alt="ankura">                                                           </div>
                </div>
                    </div>
        </div>
                    </div>
        </section>
                    </div>
        </div>
                    </div>
        </section>
         <!-- section 5 end -->

         <!-- aboutus start -->
    <section
    class="elementor-section elementor-top-section elementor-element elementor-element-a5401a5 elementor-section-boxed sc_fly_static about-us-section"
    data-id="a5401a5"
    data-element_type="section"
>
    <div class="elementor-container elementor-column-gap-default">

        <!-- LEFT COLUMN (60%) -->
        <div
            class="elementor-column elementor-col-60 elementor-top-column elementor-element elementor-element-d529f19"
            data-id="d529f19"
            data-element_type="column"
        >
            <div class="elementor-widget-wrap elementor-element-populated">
                <div
                    class="elementor-element elementor-element-68ce1fa elementor-widget elementor-widget-heading"
                    data-id="68ce1fa"
                    data-element_type="widget"
                    data-settings='{"motion_fx_motion_fx_scrolling":"yes","motion_fx_translateX_effect":"yes","motion_fx_translateX_direction":"negative","motion_fx_translateX_speed":{"unit":"px","size":4},"motion_fx_devices":["desktop","tablet","mobile"]}'
                    data-widget_type="heading.default"
                >
                    <div class="elementor-widget-container">
                        <h2 class="elementor-heading-title">About Us</h2>
                    </div>
                </div>

                <div
                    class="elementor-element elementor-element-597f695 elementor-widget elementor-widget-text-editor"
                    data-id="597f695"
                    data-element_type="widget"
                    data-widget_type="text-editor.default"
                >
                    <div class="elementor-widget-container about-text">
                        <p>
                            Paanchajanya Reality Pvt Ltd, founded by Mr. Rajender Reddy in 2009, has established itself as a leading provider of Villa Plots in Hyderabad, Shirdi, Bangalore, and Bangkok. Over the years, the company has sold thousands of plots, growing from its initial project of 2000 plots to delivering over 11 lakh square yards.
                        </p>
                        <p>
                            The company’s success is built upon its commitment to passing on the benefits of its cost-efficiency to its customers. This principle, along with constant efforts to improve the community and positively impact lives, has driven its success for over 25 years.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- RIGHT COLUMN (40%) -->
        <div
            class="elementor-column elementor-col-40 elementor-top-column elementor-element elementor-element-ac543b8"
            data-id="ac543b8"
            data-element_type="column"
        >
            <div class="elementor-widget-wrap elementor-element-populated align-middle">
                <section
                    class="elementor-section elementor-inner-section elementor-element elementor-element-5fb0bd5 elementor-section-full_width"
                    data-id="5fb0bd5"
                    data-element_type="section"
                >
                    <div class="elementor-container elementor-column-gap-default">
                        <div
                            class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-43be0e3 animated-slow animation_type_block elementor-invisible"
                            data-id="43be0e3"
                            data-element_type="column"
                            data-settings='{"animation":"slideInUp","animation_delay":300}'
                        >
                            <div class="elementor-widget-wrap elementor-element-populated founder-box">
                                <div
                                    class="elementor-element elementor-element-29d0301 elementor-widget elementor-widget-image"
                                    data-id="29d0301"
                                    data-element_type="widget"
                                    data-widget_type="image.default"
                                >
                                    <div class="elementor-widget-container">
                                        <img
                                            loading="lazy"
                                            decoding="async"
                                            src="assests/image/Rajender.png"
                                            alt="Mr. Rajender Reddy Dasari"
                                        />
                                    </div>
                                </div>

                                <div
                                    class="elementor-element elementor-element-b9f457a elementor-widget elementor-widget-text-editor"
                                    data-id="b9f457a"
                                    data-element_type="widget"
                                    data-widget_type="text-editor.default"
                                >
                                    <div class="elementor-widget-container founder-name">
                                        <p>Mr. Rajender Reddy Dasari</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

    </div>
</section>
<!-- aboutus end -->

<!-- our projects start -->
<section
    class="elementor-section elementor-top-section elementor-element elementor-element-d60b439 elementor-section-full_width elementor-section-height-default elementor-section-height-default sc_fly_static"
    data-id="d60b439"
    data-element_type="section"
    data-settings='{"background_background":"classic"}'
>
    <div class="elementor-container elementor-column-gap-extended">
        <div
            class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-32949fe sc_inner_width_none sc_content_align_inherit sc_layouts_column_icons_position_left sc_fly_static"
            data-id="32949fe"
            data-element_type="column"
        >
            <div class="elementor-widget-wrap elementor-element-populated">
                <div
                    class="elementor-element elementor-element-2d988b6 sc_fly_static elementor-widget elementor-widget-heading"
                    data-id="2d988b6"
                    data-element_type="widget"
                    data-widget_type="heading.default"
                >
                    <div class="elementor-widget-container">
                        <h2 class="elementor-heading-title elementor-size-default">Our Projects</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section
    class="elementor-section elementor-top-section elementor-element elementor-element-a1c6026 elementor-section-boxed elementor-section-height-default elementor-section-height-default sc_fly_static"
    data-id="a1c6026"
    data-element_type="section"
    data-settings='{"background_background":"classic"}'
>
    <div class="elementor-container elementor-column-gap-extended">
        <div
            class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-efe86c5 sc_inner_width_none sc_content_align_inherit sc_layouts_column_icons_position_left sc_fly_static"
            data-id="efe86c5"
            data-element_type="column"
        >
            <div class="elementor-widget-wrap elementor-element-populated">
                <div
                    class="elementor-element elementor-element-a06b70d sc_fly_static elementor-widget elementor-widget-text-editor"
                    data-id="a06b70d"
                    data-element_type="widget"
                    data-widget_type="text-editor.default"
                >
                    <div class="elementor-widget-container">
                        <p>
                            Explore our world of refined living featuring elegant apartments, luxurious villas, and
                            serene weekend homes.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section
    class="elementor-section elementor-top-section elementor-element elementor-element-4ab578b elementor-section-boxed elementor-section-height-default elementor-section-height-default sc_fly_static"
    data-id="4ab578b"
    data-element_type="section"
    data-settings='{"background_background":"classic"}'
>
    <div class="elementor-container elementor-column-gap-extended">
        <div
            class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-1f41293 sc_inner_width_none sc_content_align_inherit sc_layouts_column_icons_position_left sc_fly_static"
            data-id="1f41293"
            data-element_type="column"
        >
            <div class="elementor-widget-wrap elementor-element-populated">
                <div
                    class="elementor-element elementor-element-a86d384 elementor-testimonial--skin-default elementor-testimonial--layout-image_inline elementor-arrows-yes sc_fly_static elementor-widget elementor-widget-testimonial-carousel"
                    data-id="a86d384"
                    data-element_type="widget"
                    data-settings='{"slides_per_view":"2","slides_per_view_tablet":"2","show_arrows":"yes","speed":500,"autoplay":"yes","autoplay_speed":5000,"loop":"yes","pause_on_hover":"yes","pause_on_interaction":"yes","space_between":{"unit":"px","size":10,"sizes":[]},"space_between_laptop":{"unit":"px","size":10,"sizes":[]},"space_between_tablet":{"unit":"px","size":10,"sizes":[]},"space_between_mobile":{"unit":"px","size":10,"sizes":[]}}'
                    data-widget_type="testimonial-carousel.default"
                >
                    <div class="elementor-widget-container">
                        <div class="elementor-swiper">
                            <div
                                class="elementor-main-swiper swiper"
                                role="region"
                                aria-roledescription="carousel"
                                aria-label="Slides"
                            >
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide" role="group" aria-roledescription="slide">
                                        <div class="elementor-testimonial">
                                            <div class="elementor-testimonial__content">
                                                <div class="elementor-testimonial__text">
                                                    <div
                                                        data-elementor-type="page"
                                                        data-elementor-id="26737"
                                                        class="elementor elementor-26737"
                                                        data-elementor-post-type="elementor_library"
                                                    >
                                                        <section
                                                            class="elementor-section-with-custom-width elementor-section elementor-top-section elementor-element elementor-element-e17ab5a elementor-section-boxed elementor-section-height-default elementor-section-height-default sc_fly_static"
                                                            data-id="e17ab5a"
                                                            data-element_type="section"
                                                        >
                                                            <div
                                                                class="elementor-container elementor-column-gap-extended"
                                                            >
                                                                <div
                                                                    class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-dd963fd sc_inner_width_none sc_content_align_inherit sc_layouts_column_icons_position_left sc_fly_static"
                                                                    data-id="dd963fd"
                                                                    data-element_type="column"
                                                                    data-settings='{"background_background":"classic"}'
                                                                >
                                                                    <div
                                                                        class="elementor-widget-wrap elementor-element-populated"
                                                                    >
                                                                        <div
                                                                            class="elementor-element elementor-element-4a2f17c sc_fly_static elementor-widget elementor-widget-image"
                                                                            data-id="4a2f17c"
                                                                            data-element_type="widget"
                                                                            data-widget_type="image.default"
                                                                        >
                                                                            <div class="elementor-widget-container">
                                                                                <img
                                                                                    loading="lazy"
                                                                                    decoding="async"
                                                                                    width="962"
                                                                                    height="720"
                                                                                    src="assests/image/projects/project1.jpg"
                                                                                    class="attachment-large size-large wp-image-26618"
                                                                                    alt="DRR Premium County"
                                                                                />
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="elementor-element elementor-element-258db43 sc_fly_static elementor-widget elementor-widget-heading"
                                                                            data-id="258db43"
                                                                            data-element_type="widget"
                                                                            data-widget_type="heading.default"
                                                                        >
                                                                            <div class="elementor-widget-container">
                                                                                <h2
                                                                                    class="elementor-heading-title elementor-size-default"
                                                                                >
                                                                                    DRR Premium County
                                                                                </h2>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="elementor-element elementor-element-d95bdcd sc_fly_static elementor-widget elementor-widget-text-editor"
                                                                            data-id="d95bdcd"
                                                                            data-element_type="widget"
                                                                            data-widget_type="text-editor.default"
                                                                        >
                                                                            <div class="elementor-widget-container">
                                                                                <p>
                                                                                    Discover the allure of premium villa plots,where luxury meets tranquility
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="elementor-element elementor-element-06e3f9d elementor-align-center sc_fly_static elementor-widget elementor-widget-button"
                                                                            data-id="06e3f9d"
                                                                            data-element_type="widget"
                                                                            data-widget_type="button.default"
                                                                        >
                                                                            <div class="elementor-widget-container">
                                                                                <div class="elementor-button-wrapper">
                                                                                    <a
                                                                                        class="elementor-button elementor-button-link elementor-size-sm"
                                                                                        href="projects/drr-premium-county/"
                                                                                    >
                                                                                        <span
                                                                                            class="elementor-button-content-wrapper"
                                                                                        >
                                                                                            <span
                                                                                                class="elementor-button-text"
                                                                                                >Know More</span
                                                                                            >
                                                                                        </span>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </section>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="elementor-testimonial__footer"></div>
                                        </div>
                                    </div>
                                   
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- our projects end -->
                </div>
                            </div>
                                    </div>
                        <div class="elementor-testimonial__footer">
                                            </div>
        </div>
                                </div>
                                            
                                            
                                    </div>
                                                            
                                                                    </div>
                </div>
                                </div>
                </div>
                    </div>
        </div>
                    </div>
        </section>
                
                
                
                </div>
            </div><!-- .entry-content -->

    
</article>
                        </div>
                                            </div>
                                </div>
                            <?php include 'includes/footer.php'; ?>