<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Status Update</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .email-container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 5px;
        }
        h2 {
            color: #333;
        }
        .status {
            font-size: 18px;
            color: #555;
        }
        .active {
            color: green;
        }
        .inactive {
            color: red;
        }
        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #888;
        }
    </style>
</head>
<body>

    <div class="email-container">
        <h2>Doctor Account Status Update</h2>
        <p>Hello Admin,</p>
        <p>The doctor account has been updated.</p>
        <p class="status">
            Doctor Name: <strong>{{ ucwords($doctor['name']) }}</strong><br>
            Account Status: <strong class="{{ $doctor['is_active'] ? 'active' : 'inactive' }}">
                {{ $doctor['is_active'] ? 'Activated' : 'Deactivated' }}
            </strong>
        </p>
        <p class="footer">Regards, Ortho Hospital Management System</p>
    </div>

</body>
</html>
