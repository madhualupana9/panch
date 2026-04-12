<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Status Update</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .email-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #ffffff;
            padding: 30px 20px;
            text-align: center;
        }
        .email-header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
        }
        .email-body {
            padding: 40px 30px;
        }
        .greeting {
            font-size: 18px;
            color: #333;
            margin-bottom: 20px;
        }
        .status-badge {
            display: inline-block;
            padding: 10px 20px;
            border-radius: 25px;
            font-weight: 600;
            font-size: 16px;
            margin: 20px 0;
            color: #ffffff;
        }
        .position-info {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 6px;
            margin: 20px 0;
        }
        .position-info strong {
            color: #667eea;
        }
        .message-box {
            background-color: #f0f4ff;
            padding: 20px;
            border-radius: 6px;
            margin: 25px 0;
            border-left: 4px solid #667eea;
        }
        .message-box p {
            margin: 0;
            color: #555;
            line-height: 1.8;
        }
        .footer {
            background-color: #f8f9fa;
            padding: 30px;
            text-align: center;
            border-top: 1px solid #e9ecef;
        }
        .footer p {
            margin: 5px 0;
            color: #6c757d;
            font-size: 14px;
        }
        .company-name {
            color: #667eea;
            font-weight: 600;
        }
        .contact-info {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #dee2e6;
        }
        .contact-info a {
            color: #667eea;
            text-decoration: none;
        }
        .logo {
            margin-bottom: 10px;
        }
        @media only screen and (max-width: 600px) {
            .email-body {
                padding: 30px 20px;
            }
            .email-header h1 {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="email-header">
            <div class="logo">
                <h1>🏗️ Paanchajanya Reality</h1>
            </div>
            <p style="margin: 10px 0 0 0; font-size: 14px; opacity: 0.9;">Building Tomorrow's Infrastructure</p>
        </div>

        <!-- Body -->
        <div class="email-body">
            <p class="greeting">Dear <strong>{{ $applicantName }}</strong>,</p>

            <p>Thank you for your interest in joining our team at <span class="company-name">Paanchajanya Reality</span>.</p>

            <!-- Position Info -->
            <div class="position-info" style="border-left: 4px solid {{ $statusColor }};">
                <strong>Position Applied:</strong> {{ $position }}
            </div>

            <!-- Status Badge -->
            <div style="text-align: center;">
                <span class="status-badge" style="background-color: {{ $statusColor }};">Status: {{ $statusLabel }}</span>
            </div>

            <!-- Message Box -->
            <div class="message-box">
                <p>{{ $statusMessage }}</p>
            </div>

            @if($status === 'shortlisted')
            <p style="margin-top: 25px;">
                <strong>Next Steps:</strong><br>
                Our HR team will contact you within the next 2-3 business days to schedule an interview. 
                Please keep an eye on your email and phone for our communication.
            </p>
            @endif

            @if($status === 'hired')
            <p style="margin-top: 25px;">
                <strong>Next Steps:</strong><br>
                You will receive an official offer letter and onboarding instructions from our HR department shortly. 
                If you have any questions, please don't hesitate to reach out.
            </p>
            @endif

            @if($status === 'rejected')
            <p style="margin-top: 25px;">
                We appreciate the time and effort you put into your application. We wish you all the best in your job search 
                and future career endeavors.
            </p>
            @endif

            <p style="margin-top: 30px;">
                Best regards,<br>
                <strong class="company-name">HR Team</strong><br>
                Paanchajanya Reality
            </p>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p><strong>Paanchajanya Reality Private Limited</strong></p>
            <p>Building Tomorrow's Infrastructure</p>
            
            <div class="contact-info">
                <p>
                    📧 Email: <a href="mailto:infra@paanch.com">infra@paanch.com</a><br>
                    🌐 Website: <a href="https://paanch.com" target="_blank">paanch.com</a><br>
                    📞 Phone: +91 9000313963
                </p>
            </div>

            <p style="margin-top: 20px; font-size: 12px; color: #999;">
                This is an automated email. Please do not reply directly to this message.<br>
                If you have any questions, please contact us at <a href="mailto:infra@paanch.com">infra@paanch.com</a>
            </p>
        </div>
    </div>
</body>
</html>

