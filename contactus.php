<?php include 'includes/header.php'; ?>

<?php
$message_status = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
    $message = isset($_POST['message']) ? trim($_POST['message']) : '';

    if ($name && $email && $message) {
        try {
            $stmt = $pdo->prepare("INSERT INTO contact_submissions (name, email, phone, message, status, created_at, updated_at) VALUES (?, ?, ?, ?, 'new', NOW(), NOW())");
            $stmt->execute([$name, $email, $phone, $message]);
            $message_status = 'success';
        } catch (PDOException $e) {
            $message_status = 'error';
        }
    } else {
        $message_status = 'validation_error';
    }
}
?>

<!-- Premium Contact Page Styles -->
<style>
    :root {
        --primary-gold: #c9a45c;
        --dark-bg: #1a1a1a;
        --light-text: #f8f9fa;
        --soft-gray: #f4f4f4;
        --transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
    }

    /* 1. Hero Section */
    .contact-hero {
        height: 60vh;
        min-height: 400px;
        background: url('assests/image/contact-us.jpg') no-repeat center center;
        background-size: cover;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: #fff;
    }
    .contact-hero::after {
        content: '';
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.3));
    }
    .hero-content { position: relative; z-index: 10; }
    .hero-content h1 { 
        font-size: 3.5rem; font-weight: 700; margin: 0; color: aliceblue;}

    .hero-breadcrumb { font-size: 1.1rem; color: var(--primary-gold); font-weight: 500; }

    /* 2. Main Content Layout */
    .contact-main-section { padding: 100px 0; background: #fff; }

    /* Contact Cards */
    .info-card {
        padding: 40px;
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.05);
        height: 100%;
        transition: var(--transition);
        border: 1px solid #eee;
        position: relative;
        overflow: hidden;
    }
    .info-card:hover { transform: translateY(-10px); box-shadow: 0 20px 60px rgba(0,0,0,0.1); }
    .info-card .icon-box {
        width: 60px;
        height: 60px;
        background: rgba(201, 164, 92, 0.1);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 25px;
        color: var(--primary-gold);
        font-size: 1.5rem;
    }
    .info-card .icon-box::before,
    .info-card .icon-box::after {
        display: none !important;
    }
    .info-card h4 { font-weight: 700; margin-bottom: 15px; color: #333; }
    .info-card p, .info-card a { color: #666; font-size: 1.05rem; line-height: 1.8; text-decoration: none; display: block; }
    .info-card a:hover { color: var(--primary-gold); }

    /* 3. Premium Contact Form */
    .contact-form-container {
        background: #fff;
        padding: 60px;
        border-radius: 30px;
        box-shadow: 0 30px 100px rgba(0,0,0,0.08);
        margin-top: -150px;
        position: relative;
        z-index: 20;
    }
    .form-heading { margin-bottom: 40px; }
    .form-heading h2 { font-weight: 800; font-size: 2.5rem; margin-bottom: 10px; }
    .form-heading p { color: #888; font-size: 1.1rem; }

    .premium-form .form-group { position: relative; margin-bottom: 30px; }
    .premium-form .form-control {
        height: 60px;
        border: none;
        border-bottom: 2px solid #eee;
        border-radius: 0;
        padding: 10px 0 10px 40px;
        font-size: 1.1rem;
        background: transparent !important;
        transition: var(--transition);
        box-shadow: none !important;
    }
    .premium-form textarea.form-control { height: 120px; }
    .premium-form .form-control:focus { border-color: var(--primary-gold); }

    .premium-form .field-icon {
        position: absolute;
        bottom: 15px;
        left: 0;
        color: #999;
        font-size: 1.2rem;
        transition: var(--transition);
    }
    .premium-form .form-control:focus ~ .field-icon {
        color: var(--primary-gold);
    }

    /* Floating Labels Effect */
    .premium-form label {
        position: absolute;
        top: 15px;
        left: 40px;
        color: #999;
        pointer-events: none;
        transition: var(--transition);
        font-size: 1.1rem;
    }
    .premium-form .form-control:focus ~ label,
    .premium-form .form-control:valid ~ label {
        top: -20px;
        left: 0;
        font-size: 0.9rem;
        color: var(--primary-gold);
        font-weight: 600;
    }

    .submit-premium-btn {
        background: var(--primary-gold);
        color: #fff;
        padding: 18px 50px;
        border-radius: 50px;
        border: none;
        font-weight: 700;
        font-size: 1.1rem;
        text-transform: uppercase;
        letter-spacing: 2px;
        transition: var(--transition);
        width: 100%;
        margin-top: 20px;
        box-shadow: 0 10px 30px rgba(201, 164, 92, 0.3);
    }
    .submit-premium-btn:hover { background: #b08e4a; transform: translateY(-3px); box-shadow: 0 15px 40px rgba(201, 164, 92, 0.4); }

    /* 4. Map Section */
    .map-section { line-height: 0; position: relative; }
    .map-overlay-info {
        position: absolute;
        bottom: 50px;
        left: 50px;
        background: #fff;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        z-index: 5;
        max-width: 350px;
    }

    /* 5. Site Visit CTA */
    .site-visit-cta {
        background: var(--dark-bg);
        padding: 80px 0;
        color: #fff;
        text-align: center;
    }
    .cta-content h2 { font-size: 3rem; font-weight: 800; margin-bottom: 20px; }
    .cta-btn {
        display: inline-block;
        border: 2px solid var(--primary-gold);
        color: var(--primary-gold);
        padding: 15px 40px;
        border-radius: 50px;
        text-decoration: none !important;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: var(--transition);
        margin-top: 20px;
    }
    .cta-btn:hover { background: var(--primary-gold); color: #fff; }

    @media (max-width: 768px) {
        .hero-content h1 { font-size: 2.8rem; }
        .contact-form-container { padding: 30px; margin-top: -80px; }
        .contact-main-section { padding-top: 150px; }
        .map-overlay-info { display: none; }
    }
</style>

<div class="contact-redesign-wrapper">
    <!-- Hero Section -->
    <section class="contact-hero">
        <div class="hero-content container">
        </div>
    </section>

    <!-- Main Content -->
    <section class="contact-main-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <!-- Modern Form Container -->
                    <div class="contact-form-container reveal">
                        <div class="row">
                            <!-- Form Side -->
                            <div class="col-lg-7">
                                <div class="form-heading">
                                    <h2>Send us a message</h2>
                                    <p>Fill out the form below and our property expert will reach out to you within 24 hours.</p>
                                </div>

                                <?php if ($message_status === 'success'): ?>
                                    <div class="alert alert-success" style="background: #e8f5e9; color: #2e7d32; padding: 15px; border-radius: 10px; margin-bottom: 30px; border: 1px solid #c8e6c9;">
                                        <i class="fas fa-check-circle me-2"></i> Thank you! Your message has been sent successfully. We will contact you soon.
                                    </div>
                                <?php elseif ($message_status === 'error'): ?>
                                    <div class="alert alert-danger" style="background: #ffebee; color: #c62828; padding: 15px; border-radius: 10px; margin-bottom: 30px; border: 1px solid #ffcdd2;">
                                        <i class="fas fa-exclamation-circle me-2"></i> Sorry, something went wrong. Please try again later.
                                    </div>
                                <?php elseif ($message_status === 'validation_error'): ?>
                                    <div class="alert alert-warning" style="background: #fff3e0; color: #ef6c00; padding: 15px; border-radius: 10px; margin-bottom: 30px; border: 1px solid #ffe0b2;">
                                        <i class="fas fa-info-circle me-2"></i> Please fill in all required fields.
                                    </div>
                                <?php endif; ?>

                                <form action="contactus" method="POST" class="premium-form" id="contactForm">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="name" class="form-control" required>
                                                <i class="fa-solid fa-user field-icon"></i>
                                                <label>Full Name</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="email" name="email" class="form-control" required>
                                                <i class="fa-solid fa-envelope field-icon"></i>
                                                <label>Email Address</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="tel" name="phone" class="form-control" required>
                                                <i class="fa-solid fa-phone field-icon"></i>
                                                <label>Phone Number</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <textarea name="message" class="form-control" required></textarea>
                                                <i class="fa-solid fa-comment-dots field-icon"></i>
                                                <label>Your Message</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="submit-premium-btn" id="submitBtn">
                                                <span class="btn-text"><i class="fa-solid fa-paper-plane me-2"></i> Connect With Us</span>
                                                <span class="btn-processing" style="display: none;"><i class="fas fa-spinner fa-spin me-2"></i> processing..please wait ..</span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!-- Info Side (Small Cards) -->
                            <div class="col-lg-5 ps-lg-5 mt-5 mt-lg-0">
                                <div class="row g-4">
                                    <div class="col-12">
                                        <div class="info-card">
                                            <div class="icon-box">
                                                <i class="fa-solid fa-location-dot"></i>
                                            </div>
                                            <h4>Corporate Office</h4>
                                            <p>Kakatiya Hills, Guttala Begumpet, Kavuri Hills, Madhapur, Hyderabad, Telangana 500033</p>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="info-card">
                                            <div class="icon-box">
                                                <i class="fa-solid fa-headset"></i>
                                            </div>
                                            <h4>Quick Connect</h4>
                                            <p>Call us: <a href="tel:+919100999099">+91 91009 99099</a></p>
                                            <p>Support: <a href="mailto:panchajanyaecovillages@gmail.com">panchajanyaecovillages@gmail.com</a></p>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="info-card">
                                            <div class="icon-box">
                                                <i class="fa-solid fa-clock"></i>
                                            </div>
                                            <h4>Working Hours</h4>
                                            <p>Mon - Sat: 09:00 AM - 07:00 PM</p>
                                            <p>Sunday: 10:00 AM - 04:00 PM</p>
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

    <!-- Map Section -->
    <section class="map-section">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3806.27315183063!2d78.39123831487713!3d17.4363251880503!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb9158f201b205%3A0x11bbe7be7792411b!2sKavuri%20Hills%2C%20Madhapur%2C%20Hyderabad%2C%20Telangana%20500033!5e0!3m2!1sen!2sin!4v1625123456789!5m2!1sen!2sin" width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        <div class="map-overlay-info">
            <h5 style="font-weight: 700; color: var(--primary-gold);">Paanchajanya Realty</h5>
            <p style="margin: 0; font-size: 0.9rem;">C9WX+HH8, Kakatiya Hills, Guttala Begumpet, Madhapur, Hyderabad.</p>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="site-visit-cta">
        <div class="container">
            <div class="cta-content">
                <h2 style="color: aliceblue;">Ready to witness your future home?</h2>
                <p style="color: #aaa; font-size: 1.2rem; max-width: 600px; margin: 0 auto 30px;">Book a personalized site visit with our experts and experience the Paanchajanya lifestyle firsthand.</p>
                <a href="tel:+919100999099" class="cta-btn">Book a Site Visit</a>
            </div>
        </div>
    </section>
</div>

<!-- Animations Script -->
<script src="assests/js/gsap.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        gsap.from(".hero-content h1", { opacity: 0, y: 50, duration: 1, ease: "power4.out" });
        gsap.from(".hero-breadcrumb", { opacity: 0, y: 20, duration: 1, delay: 0.3, ease: "power4.out" });
        
        gsap.from(".reveal", {
            opacity: 0,
            y: 100,
            duration: 1.2,
            scrollTrigger: {
                trigger: ".reveal",
                start: "top 90%",
            }
        });

        // Contact Form Submission Handling
        const contactForm = document.getElementById('contactForm');
        const submitBtn = document.getElementById('submitBtn');
        const btnText = submitBtn.querySelector('.btn-text');
        const btnProcessing = submitBtn.querySelector('.btn-processing');

        if (contactForm) {
            contactForm.addEventListener('submit', () => {
                // Disable the button
                submitBtn.disabled = true;
                submitBtn.style.opacity = '0.7';
                submitBtn.style.cursor = 'not-allowed';
                
                // Show processing text
                btnText.style.display = 'none';
                btnProcessing.style.display = 'inline-block';
            });
        }
    });
</script>

<?php include 'includes/footer.php'; ?>
