<?php include 'includes/header.php'; ?>

<!-- Custom Styles for Privacy Policy Page -->
<style>
    .page-banner {
        background-image: url('assests/image/banner9.jpg');
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
    .page-banner h1 { font-size: 3rem; font-weight: 700; margin: 0; color: aliceblue;}

    .section-padding { padding: 80px 0; }
    .bg-light-section { background-color: #fcfbf7; }

    .policy-content {
        background: #fff;
        padding: 50px;
        border-radius: 15px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.05);
        color: #444;
        line-height: 1.8;
    }
    .policy-content h2 { color: #1a1a1a; margin-top: 40px; margin-bottom: 20px; font-weight: 700; }
    .policy-content h2:first-child { margin-top: 0; }
    .policy-content ul { padding-left: 20px; margin-bottom: 25px; }
    .policy-content ul li { margin-bottom: 10px; }
    .policy-content p { margin-bottom: 20px; }

    @media (max-width: 768px) {
        .page-banner { padding: 120px 0 80px; }
        .page-banner h1 { font-size: 2.2rem; }
        .policy-content { padding: 30px 20px; }
    }
</style>

<div class="privacy-page-wrapper">
    <!-- Banner -->
    <section class="page-banner">
        <div class="container">
            <h1>Privacy Policy</h1>
        </div>
    </section>

    <!-- Content -->
    <section class="section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="policy-content">
                        <h2>1. Introduction</h2>
                        <p>Welcome to Paanchajanya Reality Pvt Ltd. Your privacy is important to us. This Privacy Policy explains how we collect, use, and protect your information when you visit our website and use our services.</p>
                        <p>By using our website, you agree to the collection and use of information in accordance with this policy.</p>

                        <h2>2. Information Collection</h2>
                        <p>We collect information that you provide to us directly, such as when you fill out a contact form, register for an account, or subscribe to our newsletter. This information may include:</p>
                        <ul>
                            <li>Name, email address, and phone number</li>
                            <li>Company name and job title</li>
                            <li>Your preferences and interests in our real estate projects</li>
                            <li>Any other information you choose to provide</li>
                        </ul>

                        <h2>3. Use of Information</h2>
                        <p>We use the information we collect for various purposes, including:</p>
                        <ul>
                            <li>To provide, maintain, and improve our services and projects.</li>
                            <li>To process your inquiries and provide you with information about our luxury apartments and villa plots.</li>
                            <li>To send you promotional communications, such as newsletters and updates about new project launches.</li>
                            <li>To understand how you use our website and improve user experience.</li>
                            <li>To comply with legal obligations and protect our rights.</li>
                        </ul>

                        <h2>4. Data Protection and Security</h2>
                        <p>We take the security of your data seriously. We implement appropriate technical and organizational measures to protect your personal information against unauthorized access, loss, or theft. However, please note that no method of transmission over the internet or electronic storage is 100% secure.</p>

                        <h2>5. Sharing of Information</h2>
                        <p>We do not sell, trade, or otherwise transfer your personal information to third parties without your consent, except as described in this policy. We may share information with trusted third-party service providers who assist us in operating our website and conducting our business, so long as those parties agree to keep this information confidential.</p>

                        <h2>6. Cookies and Tracking Technologies</h2>
                        <p>Our website may use cookies and similar tracking technologies to enhance your browsing experience and analyze website traffic. You can choose to disable cookies through your browser settings, although this may affect the functionality of some parts of our website.</p>

                        <h2>7. Your Choices and Rights</h2>
                        <p>You have the right to access, update, or delete the personal information we hold about you. You may also opt out of receiving promotional communications from us at any time by following the instructions in those communications.</p>

                        <h2>8. Changes to This Privacy Policy</h2>
                        <p>We may update our Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page. We encourage you to review this policy periodically for any changes.</p>

                        <h2>9. Contact Us</h2>
                        <p>If you have any questions or concerns about this Privacy Policy, please contact us at:</p>
                        <p><strong>Email:</strong> info@paanchajanya.com<br>
                        <strong>Phone:</strong> +91-XXXX-XXXXXX<br>
                        <strong>Address:</strong> Hyderabad, Telangana, India</p>
                        
                        <p class="mt-5 text-muted"><em>Last updated: March 11, 2026</em></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include 'includes/footer.php'; ?>
