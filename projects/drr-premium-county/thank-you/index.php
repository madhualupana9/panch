<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet" />
        <link rel="icon" href="/assests/image/favicon.png" />
        <meta name="viewport" content="width=device-width,initial-scale=1" />
        <meta name="theme-color" content="#000000" />
        
        <title>Thank You - DRR Premium County | Paanchajanya Reality</title>
        
        <link href="/assests/projects/DRR/css/main.e54e2a16.css" rel="stylesheet" />
        <link rel="stylesheet" href="/assests/css/whatsapp-widget.css">
        <style>
            body {
                font-family: 'Open Sans', sans-serif;
                background-color: #ffffff;
                margin: 0;
                padding: 0;
            }
            .header {
                background: #fff;
                padding: 15px 0;
            }
            .thank-you-section {
                padding: 120px 20px;
                text-align: center;
                min-height: 70vh;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }
            .thank-you-title {
                font-size: 3.5rem;
                font-weight: 700;
                color: #a6855e;
                margin: 20px 0;
            }
            .thank-you-message {
                font-size: 1.4rem;
                color: #555;
                margin-bottom: 25px;
                max-width: 800px;
                line-height: 1.6;
                margin-left: auto;
                margin-right: auto;
            }
            .btn-home {
                background-color: #a6855e;
                color: #000;
                padding: 15px 40px;
                border-radius: 6px;
                text-decoration: none;
                font-weight: 600;
                font-size: 1.1rem;
                transition: all 0.3s ease;
                display: inline-block;
                border: none;
            }
            .btn-home:hover {
                background-color: #8e714f;
                color: #000;
                transform: translateY(-2px);
                box-shadow: 0 4px 15px rgba(166, 133, 94, 0.3);
            }
            .download-status {
                margin-top: 30px;
                font-size: 1rem;
                color: #888;
                max-width: 600px;
                margin-left: auto;
                margin-right: auto;
            }
            .download-status a {
                color: #a6855e;
                text-decoration: underline;
                font-weight: 600;
            }
            .check-icon {
                font-size: 6rem;
                color: #28a745;
                margin-bottom: 10px;
            }
            footer {
                background-color: #fff;
                padding: 30px 0;
                border-top: 1px solid #eee;
            }
            .container {
                width: 100%;
                max-width: 1200px;
                margin: 0 auto;
            }
        </style>
    </head>
    <body>
        <div id="root">
            <div id="wrapper">
                <header class="header shadow-sm">
                    <div class="container d-flex align-items-center">
                         <a href="/projects/drr-premium-county/" class="navbar-brand ms-3">
                            <img src="/assests/image/paanchajanya-logo-new.png" alt="Paanchajanya Logo" style="height: 60px;">
                         </a>
                    </div>
                </header>

                <section class="thank-you-section">
                    <div class="container">
                        <div class="check-icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <h1 class="thank-you-title">Thank You!</h1>
                        <p class="thank-you-message">
                            Your request has been submitted successfully.<br>
                            Your brochure download should start automatically in a moment.
                        </p>
                        
                        <div class="mt-4">
                            <a href="/projects/drr-premium-county/" class="btn-home">Back to Project</a>
                        </div>

                        <div class="download-status" id="download-status">
                            If the download doesn't start automatically, 
                            <a href="/assests/projects/DRR/broucher/PremiumCounty.pdf" download id="manual-download">click here to download manually</a>.
                        </div>
                    </div>
                </section>

                <footer>
                    <div class="container text-center">
                        <p class="mb-0 text-muted">&copy; 2026 Paanchajanya Reality. All rights reserved.</p>
                    </div>
                </footer>
            </div>
        </div>

        <script>
            // Automatic download
            window.onload = function() {
                setTimeout(function() {
                    const link = document.createElement('a');
                    link.href = '/assests/projects/DRR/broucher/PremiumCounty.pdf';
                    link.download = 'PremiumCounty.pdf';
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                    document.getElementById('download-status').innerHTML = 'Download started. If you need to download again, <a href="/assests/projects/DRR/broucher/PremiumCounty.pdf" download>click here</a>.';
                }, 1500);
            };
        </script>
    </body>
</html>