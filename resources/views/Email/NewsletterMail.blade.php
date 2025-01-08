<!DOCTYPE html>
<html>
<head>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .email-header {
            background-color: #007bff;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }

        .email-header h1 {
            margin: 0;
            font-size: 24px;
        }

        .email-content {
            padding: 20px;
        }

        .email-content h2 {
            color: #333;
            font-size: 20px;
            margin-bottom: 10px;
        }
        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #aaa;
            text-align: center;
        }

        .email-content p {
            font-size: 16px;
            line-height: 1.6;
            color: #555;
        }

        .email-content a {
            display: inline-block;
            margin-top: 20px;
            background-color: #007bff;
            color: #ffffff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }

        .email-footer {
            background-color: #f1f1f1;
            padding: 10px;
            text-align: center;
            font-size: 14px;
            color: #888;
        }

        .email-footer a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header Section -->
        <div class="email-header">
            <h1>New Update from Ortho Hospital Management</h1>
        </div>

        <!-- Main Content Section -->
        <div class="email-content">
            <h2>Hello {{ $name }},</h2>
          
            <p>
                We are excited to share with you that a new {{ $type }} has been added to our platform. Here are the details:
            </p>
            <p>
                <strong>Title:</strong> {{ $title }}<br>
            
            </p>
            <p>
                Click the button below to explore this {{ strtolower($type) }} on our website:
            </p>
        </div>

        <!-- Footer Section -->
        <div class="footer">
            <strong>Email:</strong> support@example.com<br>
            <strong>Phone:</strong> +1-123-456-7890<br><br>
            Thank you for your cooperation.
            <p>This is an automated email. Please do not reply to this message.</p>
            <h2> Regards,<br>
                Ortho Hospital Management Team</h2>
        </div>
    </div>
</body>
</html>
