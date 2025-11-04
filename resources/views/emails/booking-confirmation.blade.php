<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Booking Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 1020px;
            margin: 0 auto;
            background-color: #fff8f8;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            border-bottom: 3px solid #d4af37;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        .logo {
            font-size: 28px;
            font-weight: bold;
            color: #d4af37;
            margin-bottom: 10px;
        }
        .success-icon {
            font-size: 48px;
            color: #28a745;
            margin: 20px 0;
        }
        .section {
            margin-bottom: 25px;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 8px;
            border-left: 4px solid #d4af37;
        }
        .section-title {
            font-size: 18px;
            font-weight: bold;
            color: #d4af37;
            margin-bottom: 15px;
        }
        .info-row {
            display: flex;
            margin-bottom: 10px;
        }
        .info-label {
            font-weight: bold;
            width: 120px;
            color: #555;
        }
        .info-value {
            flex: 1;
            color: #333;
        }
        .appointment-details {
            background-color: #e8f5e8;
            border-left-color: #28a745;
        }
        .success-text{
            color: #28a745;
        }
        .contact-info {
            background-color: #fff3cd;
            border-left-color: #ffc107;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
            color: #666;
        }
        .btn {
            display: inline-block;
            padding: 12px 24px;
            background-color: #d4af37;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            margin: 10px 5px;
        }
        .btn:hover {
            background-color: #b8941f;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">{{ $siteName }}</div>
            <h1 class="success-text">Appointment Booking Confirmed!</h1>
            <p>Thank you for choosing {{ $siteName }}. Your Appointment has been successfully scheduled.</p>
        </div>

        <div class="section appointment-details">
            <div class="section-title">📅 Appointment Details</div>
            <div class="info-row">
                <div class="info-label">Date:</div>
                <div class="info-value">{{ $consultation->formatted_appointment_date }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Time:</div>
                <div class="info-value">{{ $consultation->formatted_appointment_time }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Service:</div>
                <div class="info-value">{{ $consultation->service_display_name }}</div>
            </div>
        </div>

        <div class="section">
            <div class="section-title">👤 Personal Information</div>
            <div class="info-row">
                <div class="info-label">Name:</div>
                <div class="info-value">{{ $consultation->full_name }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Location:</div>
                <div class="info-value">{{ $consultation->city }}, {{ $consultation->country }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Address:</div>
                <div class="info-value">{{ $consultation->address }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Budget:</div>
                <div class="info-value">{{ $consultation->budget_display_name }}</div>
            </div>
            @if($consultation->notes)
            <div class="info-row">
                <div class="info-label">Notes:</div>
                <div class="info-value">{{ $consultation->notes }}</div>
            </div>
            @endif
        </div>

        <div class="section contact-info">
            <div class="section-title">What's Next?</div>
            <p>Our team will contact you within 24 hours to confirm your appointment and discuss your project requirements in detail.</p>
            <p><strong>Contact Information:</strong></p>
            <p>Email: {{ $contactEmail }}</p>
            <p>Phone: {{ $contactPhone }}</p>
        </div>

        <div class="footer">
            <p>Thank you for choosing {{ $siteName }} for your interior & exteriors needs!</p>
            <p>This is an system generated confirmation email. No need to reply this email.</p>
        </div>
    </div>
</body>
</html>
