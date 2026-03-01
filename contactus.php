<?php include 'includes/header.php'; ?>

<style>
    .page-banner {
        background-image: url('assests/image/banner.jpg');
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
        background: rgba(0, 0, 0, 0.4);
    }
    .page-banner .container { position: relative; z-index: 2; }
    .page-banner h1 { font-size: 3.5rem; font-weight: 700; margin: 0; color: aliceblue;}

    .contact-info-card {
        padding: 30px;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        height: 100%;
        transition: 0.3s;
    }
    .contact-info-card:hover { transform: translateY(-5px); }
    .contact-info-card h5 { color: #c9a45c; font-weight: 700; margin-bottom: 15px; display: flex; align-items: center; }
    .contact-info-card h5 i { margin-right: 10px; font-size: 1.2rem; }
    .contact-info-card p { margin-bottom: 0; color: #555; line-height: 1.6; }
    .contact-info-card a { color: inherit; text-decoration: none; transition: 0.3s; }
    .contact-info-card a:hover { color: #c9a45c; }

    .contact-form-wrapper {
        padding: 50px;
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 15px 50px rgba(0,0,0,0.08);
    }
    .form-control {
        padding: 15px;
        border: 1px solid #eee;
        background: #fcfcfc;
        border-radius: 8px;
        margin-bottom: 20px;
        transition: 0.3s;
    }
    .form-control:focus {
        border-color: #c9a45c;
        box-shadow: none;
        background: #fff;
    }
    .submit-btn {
        background: #c9a45c;
        color: #fff;
        padding: 15px 40px;
        border: none;
        border-radius: 8px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: 0.3s;
        width: 100%;
    }
    .submit-btn:hover { background: #b08e4a; transform: translateY(-2px); }

    .map-container { line-height: 0; margin-top: 80px; }
    
    @media (max-width: 991px) {
        .contact-form-wrapper { padding: 30px; margin-top: 40px; }
    }
</style>

<div class="contact-page-wrapper">
    <section class="page-banner">
        <div class="container">
            <h1>Contact Us</h1>
        </div>
    </section>

    <section class="py-5 mt-5">
        <div class="container">
            <div class="row g-4">
                <!-- Info Column -->
                <div class="col-lg-5">
                    <h2 class="fw-bold mb-4">Get In Touch</h2>
                    <p class="mb-5 text-muted">We'd love to hear from you. Whether you're looking for a new home or have questions about our projects, our team is ready to help.</p>
                    
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="contact-info-card">
                                <h5><i class="icon-phone"></i> Call us for support</h5>
                                <p><a href="tel:+919100999099">+91 91009 99099</a></p>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="contact-info-card">
                                <h5><i class="icon-envelope"></i> Email us for query</h5>
                                <p><a href="mailto:panchajanyaecovillages@gmail.com">panchajanyaecovillages@gmail.com</a></p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="contact-info-card">
                                <h5><i class="icon-location"></i> Branch Office</h5>
                                <p>1-5-1003/190, Nava Bharath, Cooperative Pakalakunta, Old Alwal, Hyderabad, Telangana – 500010.</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="contact-info-card">
                                <h5><i class="icon-location"></i> Corporate Office</h5>
                                <p>Kakatiya Hills, Guttala Begumpet, Kavuri Hills, Madhapur, Hyderabad, Telangana 500033</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Column -->
                <div class="col-lg-7">
                    <div class="contact-form-wrapper">
                        <h3 class="fw-bold mb-4">Send Us a Message</h3>
                        <form action="#" method="post">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Your Name" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" placeholder="Your Email" required>
                                </div>
                                <div class="col-12">
                                    <input type="text" class="form-control" placeholder="Subject" required>
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control" rows="6" placeholder="Your Message" required></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="submit-btn shadow">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map -->
    <section class="map-container">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3806.27315183063!2d78.39123831487713!3d17.4363251880503!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb9158f201b205%3A0x11bbe7be7792411b!2sKavuri%20Hills%2C%20Madhapur%2C%20Hyderabad%2C%20Telangana%20500033!5e0!3m2!1sen!2sin!4v1625123456789!5m2!1sen!2sin" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </section>
</div>

<?php include 'includes/footer.php'; ?>
