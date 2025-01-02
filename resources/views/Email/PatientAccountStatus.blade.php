<!DOCTYPE html>
<html>
<head>
    <style>
        .email-container {
            font-family: Arial, sans-serif;
            font-size: 16px;
            line-height: 1.5;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            border: 1px solid #ddd;
            padding: 20px;
            background-color: #f9f9f9;
        }
        .email-header {
            font-size: 20px;
            font-weight: bold;
            color: #ff4d4d;
            margin-bottom: 20px;
        }
        .email-body {
            margin-bottom: 20px;
        }
        .email-footer {
            font-size: 14px;
            color: #999;
        }
        .block-message {
            color: #ff4d4d;
            font-weight: bold;
        }
        .active-message {
            color: #4caf50;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">{{ $subject }}</div>
        <div class="email-body">
            Dear {{ ucwords($patient['name']) }},<br><br>

            @if ($patient['status'] === 'block')
                <div class="block-message">
                    We regret to inform you that your account has been <strong>blocked</strong>. If you believe this was a mistake, please contact our support team for further assistance.
                </div>
            @elseif ($patient['status'] === 'active')
                <div class="active-message">
                    We are pleased to inform you that your account has been <strong>activated</strong>. You can now access all our services without any restrictions.
                </div>
            @else
                <div>
                    Your account status is currently unknown. Please contact support for more details.
                </div>
            @endif

            <br>
            <strong>Email:</strong> support@example.com<br>
            <strong>Phone:</strong> +1-123-456-7890<br><br>
            Thank you for your cooperation.
        </div>
        <div class="email-footer">
            Regards,<br>
            Ortho Hospital Management Team
        </div>
    </div>
</body>
</html>
