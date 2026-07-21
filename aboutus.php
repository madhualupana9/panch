<?php include 'includes/header.php'; ?>

<!-- Custom Styles for this page -->
<style>
    .page-banner {
        
        background-size: cover;
        background-position: center;
        padding: 80px 0 20px;
        position: relative;
        text-align: center;
        color: #fff;
    }
    .page-banner::before {
        content: "";
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        background: rgba(0, 0, 0, 0.4);
    }
    .page-banner .container { position: relative; z-index: 2; }
    .page-banner h1 { font-size: 3.5rem; font-weight: 700; margin: 0; color: aliceblue;}

    .section-padding { padding: 125px 0; }
    .bg-light-section { background-color: #fcfbf7; }

    .section-title { margin-bottom: 30px; font-weight: 700; color: #1a1a1a; position: relative; }
    .section-title::after {
        content: "";
        display: block;
        width: 60px;
        height: 3px;
        background: #c9a45c;
        margin-top: 15px;
    }
    .text-center .section-title::after { margin: 15px auto 0; }

    .story-img { border-radius: 15px; box-shadow: 20px 20px 0px #f0ece2; width: 100%; transition: 0.3s; }
    .story-img:hover { transform: translateY(-10px); }

    .stat-card {
        text-align: center;
        padding: 30px;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        height: 100%;
        transition: 0.3s;
    }
    .stat-card:hover { transform: translateY(-5px); box-shadow: 0 15px 40px rgba(0,0,0,0.1); }
    .stat-card h2 { color: #c9a45c; font-size: 2.5rem; font-weight: 700; margin-bottom: 10px; }
    .stat-card p { margin: 0; color: #666; font-weight: 500; }

    .feature-box {
        padding: 40px;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        text-align: center;
        height: 100%;
        border-bottom: 4px solid transparent;
        transition: 0.3s;
    }
    .feature-box:hover { border-bottom-color: #c9a45c; transform: translateY(-5px); }
    .feature-box h3 { color: #c9a45c; margin-bottom: 20px; font-weight: 600; }

    .founder-img-wrapper { position: relative; display: inline-block; }
    .founder-img { border-radius: 15px; width: 100%; max-width: 400px; }
    
    @media (max-width: 768px) {
        .page-banner { padding: 120px 0 80px; }
        .page-banner h1 { font-size: 2.5rem; }
        .section-padding { padding: 86px 0; }
        .story-img { margin-top: 30px; }
    }
</style>

<div class="about-page-wrapper">
   

    <!-- Our Story -->
<section class="section-padding">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h2 class="section-title">About Paanchajanya Realty Pvt. Ltd.</h2>

                <p>
                    Founded in 2009 by <strong>Mr. Rajender Reddy</strong>, Paanchajanya Realty Pvt. Ltd.
                    began its journey as <strong>Sahaja Properties</strong> with a vision to deliver
                    trusted and value-driven real estate investments.
                </p>

                <p>
                    Today, the company is a leading developer of premium villa plots across
                    <strong>Hyderabad, Bengaluru, Shirdi, and Bangkok</strong>, having successfully
                    delivered over <strong>11 lakh square yards</strong> of plotted developments and
                    earned the trust of thousands of customers.
                </p>

                <p>
                    Built on the principles of <strong>quality, transparency, and customer-first values</strong>,
                    Paanchajanya Realty is committed to creating thoughtfully planned communities that
                    offer lasting value and strong investment potential.
                </p>

                <p>
                    Backed by over <strong>25 years of industry expertise</strong>, the company continues
                    to shape the future of plotted developments through excellence, innovation, and trust.
                </p>
            </div>

            <div class="col-lg-6">
                <img src="assests/image/aboutus.jpg"
                     alt="About Paanchajanya Realty Pvt. Ltd."
                     class="story-img"
                     loading="lazy">
            </div>
        </div>
    </div>
</section>

    

    <!-- Vision & Values -->
    <section class="section-padding" style="padding: 10px 0;">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Vision & Commitment</h2>
                <p class="mx-auto" style="max-width: 700px;">To create lasting value by empowering individuals through strategically developed open plots.</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="feature-box">
                        <h3>Quality</h3>
                        <p>To deliver the worthy products that exceed expectations and stand the test of time.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="feature-box">
                        <h3>Integrity</h3>
                        <p>To deliver what we promise, building trust with every plot and every customer interaction.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="feature-box">
                        <h3>Excellence</h3>
                        <p>To deliver only the best in every aspect of our development and customer service.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Founder -->
<section class="section-padding bg-light-section" style="padding: 10px 0;">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-5 text-center mb-4 mb-lg-0">
                <div class="founder-img-wrapper">
                    <img src="assests/image/Rajender.png"
                         alt="Mr. Rajender Reddy Dasari"
                         class="founder-img shadow"
                         loading="lazy">
                </div>
            </div>

            <div class="col-lg-7">

                <h4 class="text-uppercase mb-2"
                    style="color:#c9a45c;letter-spacing:2px;">
                    Founder & Chairman
                </h4>

                <h2 class="mb-4" style="font-weight:700;">
                    Mr. Rajender Reddy Dasari
                </h2>

                <div class="founder-text">

                    <p>
                        Mr. Rajender Reddy Dasari is a visionary entrepreneur whose journey reflects
                        leadership, integrity, and a deep commitment to creating lasting value.
                        He began his professional career in journalism, contributing to both print
                        and electronic media for six years before transitioning into Hyderabad's
                        dynamic real estate sector, where he gained nearly a decade of expertise
                        in sales and marketing.
                    </p>

                    <p>
                        Driven by a vision to redefine plotted developments through trust and
                        transparency, Mr. Dasari founded <strong>Sahaja Properties</strong> in 2009,
                        laying the foundation for what is now
                        <strong>Paanchajanya Realty Pvt. Ltd.</strong>
                        His customer-first philosophy, ethical business practices, and unwavering
                        focus on quality have been instrumental in the company's growth and reputation.
                    </p>

                    <p>
                        Under his leadership, Paanchajanya Realty has emerged as a trusted name in
                        premium plotted developments, delivering projects that combine strategic
                        locations, superior planning, and long-term investment value.
                    </p>

                    <p>
                        His commitment to transparency, fair pricing, and excellence continues to
                        inspire the company's mission of creating communities that enrich lives and
                        stand the test of time.
                    </p>

                </div>

            </div>
        </div>
    </div>
</section>
</div>

<?php include 'includes/footer.php'; ?>
