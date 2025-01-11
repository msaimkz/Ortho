<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Status</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .status {
            font-size: 18px;
            margin-bottom: 15px;
        }
        .details {
            margin-bottom: 15px;
        }
        .footer {
            text-align: center;
            color: #666;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Appointment {{ $appointment['status'] }}</h1>
        </div>
        <div class="status">
            Dear {{ $appointment['patientName'] }},
            <p>Your appointment with Dr. {{ ucwords($appointment['doctorName']) }} scheduled on {{ \Carbon\Carbon::parse($appointment['appointmentDate'])->format('d-M-D-Y') }} at {{ \Carbon\Carbon::parse($appointment['appointmentStartTime'])->format('g:i A') }} To {{ \Carbon\Carbon::parse($appointment['appointmentEndTime'])->format('g:i A') }} has been <strong>{{ ucwords($appointment['status']) }}</strong>.</p>
        </div>
        @if($appointment['status'] == 'Rejected')
        <div class="details">
            <p><strong>Reason for Rejection:</strong> {{ $appointment['rejectionReason'] }}</p>
        </div>
        @endif
        <p>Thank you for choosing our services. Please contact us if you have any questions or need to reschedule.</p>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Ortho Hospital Management</p>
        </div>
    </div>
</body>
</html>
