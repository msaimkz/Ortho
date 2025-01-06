<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Reply</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
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
            overflow: hidden;
        }
        .email-header {
            background: #4CAF50;
            color: #ffffff;
            padding: 15px;
            text-align: center;
        }
        .email-body {
            padding: 20px;
        }
        .email-body h2 {
            color: #333;
        }
        .email-footer {
            background: #f1f1f1;
            text-align: center;
            padding: 10px;
            font-size: 12px;
            color: #666;
        }
        .button {
            display: inline-block;
            background: #4CAF50;
            color: #ffffff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
        .button:hover {
            background: #45a049;
        }
        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #aaa;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h1>Your Contact Message Reply</h1>
        </div>
        <div class="email-body">
            <h2>Subject: {{ $contact['subject'] }}</h2>
            <p>Dear {{ $contact['name'] }},</p>
            <p>Thank you for reaching out to us. We have received your message:</p>
            <blockquote>
                "{{ $contact['message'] }}"
            </blockquote>
            <p>We appreciate your interest and will get back to you as soon as possible.</p>
        </div>
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
