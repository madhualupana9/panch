<?php include 'includes/header.php'; ?>

<!-- Custom Styles for Careers Page -->
<style>
    .page-banner {
        background-image: url('assests/image/banner2.jpg');
        background-size: cover;
        background-position: center;
        padding: 180px 0 120px;
        position: relative;
        text-align: center;
        color: #fff;
    }
    .page-banner::before {
        content: "";
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        background: rgba(0, 0, 0, 0.5);
    }
    .page-banner .container { position: relative; z-index: 2; }
    .page-banner h1 { font-size: 3.5rem; font-weight: 700; margin: 0; color: aliceblue;}

    .section-padding { padding: 80px 0; }
    .bg-light-section { background-color: #fcfbf7; }

    .section-title { margin-bottom: 50px; font-weight: 700; color: #1a1a1a; position: relative; text-align: center; }
    .section-title::after {
        content: "";
        display: block;
        width: 60px;
        height: 3px;
        background: #c9a45c;
        margin: 15px auto 0;
    }

    .job-card {
        background: #fff;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        transition: 0.3s;
        height: 100%;
        border-left: 5px solid transparent;
    }
    .job-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.1);
        border-left-color: #c9a45c;
    }
    .job-title { font-size: 1.4rem; font-weight: 700; color: #1a1a1a; margin-bottom: 15px; }
    .job-meta { display: flex; gap: 20px; color: #777; font-size: 0.9rem; margin-bottom: 20px; flex-wrap: wrap; }
    .job-meta span { display: flex; align-items: center; gap: 6px; }
    .job-desc { color: #666; line-height: 1.6; margin-bottom: 25px; }
    
    .btn-apply {
        display: inline-block;
        padding: 10px 25px;
        background: #c9a45c;
        color: #fff;
        border-radius: 5px;
        text-decoration: none;
        font-weight: 600;
        transition: 0.3s;
    }
    .btn-apply:hover {
        background: #1a1a1a;
        color: #fff;
    }

    .benefit-box {
        text-align: center;
        padding: 40px 20px;
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        height: 100%;
        transition: 0.3s;
    }
    .benefit-box:hover { transform: translateY(-5px); }
    .benefit-icon {
        width: 70px;
        height: 70px;
        background: #fdf8ef;
        color: #c9a45c;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        margin: 0 auto 20px;
    }
    .benefit-box h4 { font-weight: 700; margin-bottom: 15px; }

    @media (max-width: 768px) {
        .page-banner { padding: 120px 0 80px; }
        .page-banner h1 { font-size: 2.5rem; }
    }
</style>

<div class="careers-page-wrapper">
    <!-- Banner -->
    <section class="page-banner">
        <div class="container">
            <h1>Join Our Team</h1>
            <p class="mt-3 text-white lead">Build your career with Paanchajanya Eco Villages</p>
        </div>
    </section>

    <!-- Why Join Us -->
    <section class="section-padding">
        <div class="container">
            <h2 class="section-title">Why Join Paanchajanya?</h2>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="benefit-box">
                        <div class="benefit-icon"><i class="fas fa-rocket"></i></div>
                        <h4>Career Growth</h4>
                        <p>We believe in nurturing talent and providing ample opportunities for professional advancement.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="benefit-box">
                        <div class="benefit-icon"><i class="fas fa-heart"></i></div>
                        <h4>Great Culture</h4>
                        <p>Join a supportive, inclusive, and collaborative work environment where every voice is heard.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="benefit-box">
                        <div class="benefit-icon"><i class="fas fa-gem"></i></div>
                        <h4>Premium Benefits</h4>
                        <p>We offer competitive salaries, health benefits, and performance-based incentives.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Open Positions -->
    <section class="section-padding bg-light-section">
        <div class="container">
            <h2 class="section-title">Open Positions</h2>
            <div class="row g-4">
                <!-- Job 1 -->
                <div class="col-lg-6">
                    <div class="job-card">
                        <h3 class="job-title">Sales Executive (Real Estate)</h3>
                        <div class="job-meta">
                            <span><i class="fas fa-map-marker-alt"></i> Hyderabad</span>
                            <span><i class="fas fa-briefcase"></i> Full-time</span>
                            <span><i class="fas fa-clock"></i> 2-4 Years Exp.</span>
                        </div>
                        <p class="job-desc">We are looking for motivated Sales Executives to join our growing team. You will be responsible for handling inquiries, site visits, and closing deals for our luxury villa plots.</p>
                        <a href="#" class="btn-apply">Apply Now</a>
                    </div>
                </div>
                <!-- Job 2 -->
                <div class="col-lg-6">
                    <div class="job-card">
                        <h3 class="job-title">Digital Marketing Specialist</h3>
                        <div class="job-meta">
                            <span><i class="fas fa-map-marker-alt"></i> Remote / Office</span>
                            <span><i class="fas fa-briefcase"></i> Full-time</span>
                            <span><i class="fas fa-clock"></i> 3+ Years Exp.</span>
                        </div>
                        <p class="job-desc">Help us expand our digital footprint. Manage SEO, SEM, and social media campaigns for our premium real estate developments in South India.</p>
                        <a href="#" class="btn-apply">Apply Now</a>
                    </div>
                </div>
                <!-- Job 3 -->
                <div class="col-lg-6">
                    <div class="job-card">
                        <h3 class="job-title">Customer Relations Manager</h3>
                        <div class="job-meta">
                            <span><i class="fas fa-map-marker-alt"></i> Hyderabad</span>
                            <span><i class="fas fa-briefcase"></i> Full-time</span>
                            <span><i class="fas fa-clock"></i> 5+ Years Exp.</span>
                        </div>
                        <p class="job-desc">Build and maintain long-term relationships with our valued customers. Oversee post-sales processes and ensure customer satisfaction.</p>
                        <a href="#" class="btn-apply">Apply Now</a>
                    </div>
                </div>
                <!-- Job 4 -->
                <div class="col-lg-6">
                    <div class="job-card">
                        <h3 class="job-title">Project Coordinator</h3>
                        <div class="job-meta">
                            <span><i class="fas fa-map-marker-alt"></i> Shirdi / Hyderabad</span>
                            <span><i class="fas fa-briefcase"></i> Full-time</span>
                            <span><i class="fas fa-clock"></i> 3+ Years Exp.</span>
                        </div>
                        <p class="job-desc">Coordinate with various departments and stakeholders to ensure timely delivery of our real estate projects according to quality standards.</p>
                        <a href="#" class="btn-apply">Apply Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="section-padding text-center">
        <div class="container">
            <h3>Don't see a role that fits?</h3>
            <p class="mb-4">Send us your resume anyway and we'll keep you in mind for future openings.</p>
            <a href="mailto:careers@paanchajanya.com" class="btn-apply" style="padding: 12px 35px; font-size: 1.1rem;">Email Your CV</a>
        </div>
    </section>
</div>

<?php include 'includes/footer.php'; ?>
