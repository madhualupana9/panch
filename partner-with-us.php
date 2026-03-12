<?php include 'includes/header.php'; ?>

<!-- Partner With Us Page Styles -->
<style>
    :root {
        --primary-gold: #c9a45c;
        --teal-accent: #00a8b5;
        --dark-bg: #1a1a1a;
        --light-text: #f8f9fa;
        --soft-gray: #f9f9f9;
        --border-color: #e0e0e0;
        --transition: all 0.3s ease;
    }

    /* Page Banner / Hero Section */
    .page-banner {
        background-image: url('assests/image/banner2.jpg');
        background-size: cover;
        background-position: center;
        padding: 160px 0 100px;
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
    .page-banner h1 { 
        font-size: 4rem; 
        font-weight: 700; 
        margin: 0; 
        color: #fff;
        letter-spacing: -1px;
    }

    .partner-section {
        padding: 140px 0;
        background: #fff;
    }

    .partner-intro {
        font-size: 1.15rem;
        line-height: 1.8;
        color: #444;
        margin-bottom: 60px;
        max-width: 950px;
        font-weight: 400;
    }

    .partner-card {
        border: 1px solid var(--border-color);
        padding: 50px;
        height: 100%;
        display: flex;
        flex-direction: column;
        background: #fff;
        transition: var(--transition);
        border-radius: 4px;
    }
    .partner-card:hover {
        box-shadow: 0 15px 45px rgba(0,0,0,0.05);
        border-color: #ccc;
    }

    .partner-card h2 {
        font-size: 3rem;
        font-weight: 500;
        margin-bottom: 25px;
        color: #222;
        letter-spacing: -0.5px;
    }

    .partner-card p {
        font-size: 1.05rem;
        line-height: 1.7;
        color: #555;
        margin-bottom: 35px;
    }

    .partner-form .form-group {
        position: relative;
        margin-bottom: 15px;
    }

    .partner-form .form-control {
        height: 55px;
        border: 1px solid var(--border-color) !important;
        border-radius: 4px;
        padding: 10px 15px 10px 50px;
        font-size: 1rem;
        background: #fff;
        transition: var(--transition);
        box-shadow: none !important;
        color: #333;
    }
    .partner-form .form-control::placeholder {
        color: #999;
        font-weight: 400;
    }

    .partner-form textarea.form-control {
        height: 150px;
        padding-top: 15px;
    }

    .partner-form .form-control:focus {
        border-color: var(--teal-accent) !important;
    }

    .partner-form .input-icon {
        position: absolute;
        top: 50%;
        left: 20px;
        transform: translateY(-50%);
        color: #777;
        font-size: 1.1rem;
        z-index: 5;
    }
    .partner-form textarea + .input-icon {
        top: 25px;
        transform: none;
    }

    .submit-btn {
        background: var(--teal-accent);
        color: #fff;
        padding: 14px 45px;
        border: none;
        font-weight: 700;
        font-size: 1rem;
        text-transform: capitalize;
        transition: var(--transition);
        margin-top: 15px;
        cursor: pointer;
        border-radius: 4px;
        display: inline-block;
        width: auto;
    }

    .submit-btn:hover {
        background: #008c96;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 168, 181, 0.3);
    }

    @media (max-width: 991px) {
        .partner-card { padding: 35px; }
    }

    @media (max-width: 768px) {
        .page-banner { padding: 120px 0 80px; }
        .page-banner h1 { font-size: 2.8rem; }
        .partner-section { padding: 156px 0; }
        .partner-card { margin-bottom: 30px; }
        .partner-card h2 { font-size: 2.4rem; }
    }
</style>

<div class="partner-page-wrapper">
    

    <section class="partner-section">
        <div class="container">
            <!-- Main Header -->
            <div class="row">
                <h2 class="section-title">Partner With Us</h2>
                <div class="col-12">
                    <p class="partner-intro">
                        At Paanchajanya Realty, we believe in forging strong, collaborative partnerships to drive success in the real estate industry. Whether you're a developer, investor, or service provider, partnering with us means gaining access to our extensive market expertise, innovative solutions, and commitment to excellence.
                    </p>
                </div>
            </div>

            <!-- Two Columns -->
            <div class="row g-5">
                <!-- Vendors Box -->
                <div class="col-lg-6">
                    <div class="partner-card">
                        <h2>Vendors</h2>
                        <p>At Paanchajanya Realty, we value strong partnerships with our vendors to ensure the highest standards in our projects. If you're interested in working with us, please fill out the form below to get started.</p>
                        
                        <form action="#" method="POST" class="partner-form">
                            <div class="form-group">
                                <i class="icon-user input-icon"></i>
                                <input type="text" name="name" class="form-control" placeholder="Name" required>
                            </div>
                            <div class="form-group">
                                <i class="icon-mail input-icon"></i>
                                <input type="email" name="email" class="form-control" placeholder="Email Address" required>
                            </div>
                            <div class="form-group">
                                <i class="icon-phone input-icon"></i>
                                <input type="tel" name="phone" class="form-control" placeholder="Phone" required>
                            </div>
                            <div class="form-group">
                                <i class="icon-pencil input-icon"></i>
                                <textarea name="message" class="form-control" placeholder="Your Message" required></textarea>
                            </div>
                            <div>
                                <button type="submit" class="submit-btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Channel Partners Box -->
                <div class="col-lg-6">
                    <div class="partner-card">
                        <h2>Channel Partners</h2>
                        <p>At Paanchajanya Realty, we're seeking dynamic channel partners to enhance our real estate offerings. If you're interested in partnering with us, please fill out the form below.</p>
                        
                        <form action="#" method="POST" class="partner-form">
                            <div class="form-group">
                                <i class="icon-user input-icon"></i>
                                <input type="text" name="name" class="form-control" placeholder="Name" required>
                            </div>
                            <div class="form-group">
                                <i class="icon-mail input-icon"></i>
                                <input type="email" name="email" class="form-control" placeholder="Email Address" required>
                            </div>
                            <div class="form-group">
                                <i class="icon-phone input-icon"></i>
                                <input type="tel" name="phone" class="form-control" placeholder="Phone" required>
                            </div>
                            <div class="form-group">
                                <i class="icon-pencil input-icon"></i>
                                <textarea name="message" class="form-control" placeholder="Your Message" required></textarea>
                            </div>
                            <div>
                                <button type="submit" class="submit-btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include 'includes/footer.php'; ?>
