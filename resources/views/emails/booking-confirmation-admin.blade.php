<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Appointment Booking</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ece4e4;
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
            border-bottom: 3px solid #dc3545;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        .logo {
            font-size: 28px;
            font-weight: bold;
            color: #d4af37;
            margin-bottom: 10px;
        }
        .alert-icon {
            font-size: 48px;
            color: #dc3545;
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
            background-color: #fff3cd;
            border-left-color: #ffc107;
        }
        .client-info {
            background-color: #d1ecf1;
            border-left-color: #17a2b8;
        }
        .project-info {
            background-color: #f8d7da;
            border-left-color: #dc3545;
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
        .urgent {
            background-color: #f8d7da;
            border: 2px solid #dc3545;
            color: #721c24;
            padding: 15px;
            border-radius: 8px;
            margin: 20px 0;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">{{ $siteName }}</div>
            <div class="alert-icon">🔔</div>
            <h1>New Appointment Booking!</h1>
            <p>A new Appointment has been booked and requires your attention.</p>
        </div>

        <div class="urgent">
            <strong>⚠️ Action Required:</strong> Please contact the client within 24 hours to confirm the appointment.
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
            <div class="info-row">
                <div class="info-label">Status:</div>
                <div class="info-value">
                    <span style="background-color: #ffc107; color: #000; padding: 4px 8px; border-radius: 4px; font-size: 12px;">
                        {{ ucfirst($consultation->status) }}
                    </span>
                </div>
            </div>
        </div>

        <div class="section client-info">
            <div class="section-title">👤 Client Information</div>
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
        </div>

        <div class="section project-info">
            <div class="section-title">💼 Project Details</div>
            <div class="info-row">
                <div class="info-label">Budget:</div>
                <div class="info-value">{{ $consultation->budget_display_name }}</div>
            </div>
            @if($consultation->design_file)
            <div class="info-row">
                <div class="info-label">Design File:</div>
                <div class="info-value">
                    <a href="{{ asset('storage/' . $consultation->design_file) }}" target="_blank" style="color: #d4af37;">
                        📎 Download Design File
                    </a>
                </div>
            </div>
            @endif
            @if($consultation->notes)
            <div class="info-row">
                <div class="info-label">Notes:</div>
                <div class="info-value">{{ $consultation->notes }}</div>
            </div>
            @endif
        </div>

        <div style="text-align: center; margin: 30px 0;">
            <a href="{{ $adminUrl }}" class="btn">View in Admin Panel</a>
        </div>

        <div class="footer">
            <p>This is an automated notification from {{ $siteName }}.</p>
            <p>Please log in to the admin panel to manage this Appointment.</p>
        </div>
    </div>
</body>
</html>
