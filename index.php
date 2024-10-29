<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Send Email</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input, textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Send Email</h2>
    <form action="send_email.php" method="post">
        <label for="from_name">Your Name:</label>
        <input type="text" id="from_name" name="from_name" required>
        
        <label for="from_email">Your Email:</label>
        <input type="email" id="from_email" name="from_email" required>
        
        <label for="to">Recipient Emails (comma-separated):</label>
        <input type="text" id="to" name="to" required>
        
        <label for="subject">Subject:</label>
        <input type="text" id="subject" name="subject" required>
        
        <label for="content">Message:</label>
        <textarea id="content" name="content" rows="5" required></textarea>
        
        <button type="submit">Send Email</button>
    </form>
</body>
</html>