<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Appointment Notification</title>
    <style>
        /* Inline CSS for email compatibility */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            padding: 20px;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            background: #007bff;
            color: #ffffff;
            padding: 10px 0;
            border-radius: 8px 8px 0 0;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .status {
            font-size: 18px;
            margin-bottom: 15px;
        }
        .details {
            font-size: 16px;
            margin-bottom: 15px;
            color: #333;
        }
        .details strong {
            color: #007bff;
        }
        .footer {
            text-align: center;
            color: #666;
            font-size: 14px;
            margin-top: 20px;
        }
        .btn {
            display: inline-block;
            background-color: #007bff;
            color: #ffffff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>New Appointment Booked</h1>
        </div>
        <div class="status">
            <p>Dear Dr. {{ ucwords($appointment['doctorName']) }},</p>
            <p>A new appointment has been successfully booked.</p>
        </div>
        <div class="details">
            <p><strong>Patient Name:</strong> {{ $appointment['patientName'] }}</p>
            <p><strong>Appointment Date:</strong> {{ \Carbon\Carbon::parse($appointment['appointmentDate'])->format('d-M-Y D') }}</p>
            <p><strong>Time:</strong> {{ \Carbon\Carbon::parse($appointment['appointmentStartTime'])->format('g:i A') }} - {{ \Carbon\Carbon::parse($appointment['appointmentEndTime'])->format('g:i A') }}</p>
            
        </div>
        <p>For further details, please log in to your dashboard or contact the administration.</p>
        
        <div class="footer">
            <p>&copy; {{ date('Y') }} Ortho Hospital Management</p>
        </div>
    </div>
</body>
</html>
