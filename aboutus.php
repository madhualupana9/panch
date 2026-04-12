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
                    <h2 class="section-title">Our Story</h2>
                    <p>Paanchajanya Reality Pvt Ltd, founded by Mr. Rajender Reddy in 2009, has established itself as a leading provider of Villa Plots in Hyderabad, Shirdi, Bangalore, and Bangkok.</p>
                    <p>Over the years, the company has sold thousands of plots, growing from its initial project of 2000 plots to delivering over 11 lakh square yards.</p>
                    <p>The company’s success is built upon its commitment to passing on the benefits of its cost-efficiency to its customers. This principle, along with the company’s constant efforts to improve the community and make a positive impact on people’s lives, has been a driving force behind its success over the last 25 years.</p>
                </div>
                <div class="col-lg-6">
                    <img src="assests/image/banner9.jpg" alt="Our Story" class="story-img">
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics -->
    <section class="section-padding bg-light-section">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-3 col-6">
                    <div class="stat-card">
                        <h2>25+</h2>
                        <p>Years Experience</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-card">
                        <h2>50+</h2>
                        <p>Projects</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-card">
                        <h2>527+</h2>
                        <p>Acres Developed</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-card">
                        <h2>2750+</h2>
                        <p>Happy Customers</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Vision & Values -->
    <section class="section-padding">
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
    <section class="section-padding bg-light-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 text-center mb-4 mb-lg-0">
                    <div class="founder-img-wrapper">
                        <img src="assests/image/Rajender.png" alt="Mr. Rajender Reddy Dasari" class="founder-img shadow">
                    </div>
                </div>
                <div class="col-lg-7">
                    <h4 class="text-uppercase mb-2" style="color: #c9a45c; letter-spacing: 2px;">Founder & CEO</h4>
                    <h2 class="mb-4" style="font-weight: 700;">Mr. Rajender Reddy Dasari</h2>
                    <div class="founder-text">
                        <p>Mr. Rajender Reddy Dasari began his career as a journalist, working in both print and electronic media for six years. After gaining valuable experience in the field, he transitioned into sales and marketing in the real estate industry, where he worked for nine years in Hyderabad.</p>
                        <p>In 2009, Mr. Dasari founded Sahaja Properties, leveraging his expertise in the field and his entrepreneurial vision. He aimed to create products that served the community and addressed their needs, and his simple, customer-focused approach has been a driving force behind the success of the company.</p>
                        <p>Sahaja Properties is known for its transparent practices and responsible pricing policy, which are at the core of the company's values.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include 'includes/footer.php'; ?>
