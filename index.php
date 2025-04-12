<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cybersecurity Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #1e1e2f, #2a2a3d);
            font-family: 'Poppins', sans-serif;
            color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background: #2f2f47;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 0 25px rgba(0, 0, 0, 0.5);
            text-align: center;
            max-width: 400px;
            width: 90%;
        }

        h1 {
            font-size: 26px;
            margin-bottom: 30px;
            color: #f4f4f4;
        }

        .button-group {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .btn {
            text-decoration: none;
            background-color: #4e54c8;
            padding: 14px 20px;
            border-radius: 10px;
            color: #fff;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btn:hover {
            background-color: #6c63ff;
            transform: translateY(-2px);
        }

        @media (max-width: 480px) {
            .container {
                padding: 30px 20px;
            }

            h1 {
                font-size: 22px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🔐 Cybersecurity Dashboard</h1>
        <div class="button-group">
            <a href="password_suggestions.php" class="btn">🔑 Password Suggestions</a>
            <a href="password_checker.php" class="btn">🛡️ Password Strength Checker</a>
        </div>
    </div>
</body>
</html>
