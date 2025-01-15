
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Slip</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #eef2f7;
            font-family: 'Roboto', sans-serif;
        }
        .appointment-slip {
            max-width: 600px;
            margin: 50px auto;
            padding: 25px;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.1);
        }
        .appointment-header {
            text-align: center;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #f0f0f0;
        }
        .appointment-header h2 {
            color: #2c3e50;
            font-size: 1.8rem;
        }
        .appointment-header p {
            color: #7f8c8d;
            font-size: 1rem;
        }
        .appointment-info p {
            margin-bottom: 10px;
            color: #34495e;
        }
        .appointment-info span {
            font-weight: bold;
            color: #2c3e50;
        }
        .btn-print {
            display: inline-block;
            padding: 10px 20px;
            background-color: #1abc9c;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            text-align: center;
            transition: background-color 0.3s ease;
        }
        .btn-print:hover {
            background-color: #16a085;
        }
        .footer-note {
            margin-top: 20px;
            text-align: center;
            color: #95a5a6;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <div class="appointment-slip">
        <div class="appointment-header">
            <h2>Ortho Hospital</h2>
            <p><strong>Appointment Slip</strong></p>
        </div>

        <div class="appointment-info">
            <p><span>Patient Name:</span> {{ ucwords($appointment->name) }}</p>
            <p><span>Appointment Date:</span> {{ \Carbon\Carbon::parse($appointment->date)->format('d D M Y') }}</p>
            <p><span>Time:</span>{{ \Carbon\Carbon::parse($appointment->start_time)->format('g:i A') }}-{{ \Carbon\Carbon::parse($appointment->end_time)->format('g:i A') }}</p>
            <p><span>Doctor:</span> Dr. {{ ucwords($appointment->doctor->name) }}</p>
            <p><span>Illness:</span> Severe Toothache</p>
            <p><span>Token No:</span> {{ ucwords($appointment->token_no) }}</p>
        </div>

        

        <div class="footer-note">
            <p>Thank you for choosing Ortho Hospital. We look forward to serving you!</p>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
