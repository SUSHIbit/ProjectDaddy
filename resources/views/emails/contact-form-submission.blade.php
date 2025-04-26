<!-- resources/views/emails/contact-form-submission.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Contact Form Submission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #f5f5f5;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .content {
            background-color: #ffffff;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .field {
            margin-bottom: 15px;
        }
        .label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #777;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>New Contact Form Submission</h1>
    </div>
    
    <div class="content">
        <div class="field">
            <span class="label">Name:</span>
            <div>{{ $message->name }}</div>
        </div>
        
        <div class="field">
            <span class="label">Email:</span>
            <div>{{ $message->email }}</div>
        </div>
        
        <div class="field">
            <span class="label">Message:</span>
            <div>{{ $message->message }}</div>
        </div>
        
        <div class="field">
            <span class="label">Submitted at:</span>
            <div>{{ $message->created_at->format('F j, Y, g:i a') }}</div>
        </div>
    </div>
    
    <div class="footer">
        <p>This is an automated email from your portfolio website.</p>
    </div>
</body>
</html>