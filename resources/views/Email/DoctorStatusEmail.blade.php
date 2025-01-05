<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            background-color: #ffffff;
            padding: 20px;
            margin: auto;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        p {
            color: #555;
            line-height: 1.6;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px 0;
            text-decoration: none;
            font-size: 16px;
            border-radius: 5px;
            text-align: center;
            color: #fff;
        }

        .btn-active {
            background-color: #28a745;
        }

        .btn-block {
            background-color: #dc3545;
        }

        .btn:hover {
            opacity: 0.9;
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
    <div class="container">
        <h2>Hello, Dr. {{ $doctor['name'] }}</h2>

        <p>
            We would like to inform you about the current status of your account on our platform.
        </p>

        @if ($doctor['status'] === 'active')
            <p>
                🎉 Great news! Your account is now <strong>active</strong>. You can log in and start using all the features available to you.
            </p>
            <a href="{{ route('login') }}" class="btn btn-active">Login to Your Account</a>
        @elseif ($doctor['status'] === 'block')
            <p>
                ⚠️ Unfortunately, your account has been <strong>blocked</strong>. If you believe this was a mistake or have questions, please contact our support team for assistance.
            </p>
           
        @endif

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
