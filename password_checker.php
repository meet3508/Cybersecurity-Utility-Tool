<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Password Strength Checker</title>
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
            max-width: 450px;
            width: 90%;
        }

        h1 {
            font-size: 26px;
            margin-bottom: 25px;
        }

        input[type="password"] {
            padding: 12px;
            width: 100%;
            border-radius: 8px;
            border: none;
            background: #444;
            color: white;
            margin-bottom: 15px;
        }

        button {
            padding: 12px 20px;
            background-color: #4e54c8;
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-weight: bold;
            width: 100%;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        button:hover {
            background-color: #6c63ff;
            transform: translateY(-2px);
        }

        .result {
            background-color: #1f1f2f;
            padding: 15px;
            border-radius: 10px;
            margin-top: 20px;
            font-weight: bold;
            font-size: 18px;
        }

        .weak {
            color: #ff4e4e;
        }

        .moderate {
            color: #ffcc00;
        }

        .strong {
            color: #00e676;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #bbb;
            text-decoration: none;
        }

        a:hover {
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🛡️ Password Strength Checker</h1>
        <form method="post">
            <input type="password" name="password" placeholder="Enter your password" required>
            <button type="submit">Check Strength</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $password = $_POST["password"];
            $strength = "Weak 😟";
            $class = "weak";

            $length = strlen($password);
            $hasUpper = preg_match('@[A-Z]@', $password);
            $hasLower = preg_match('@[a-z]@', $password);
            $hasDigit = preg_match('@[0-9]@', $password);
            $hasSymbol = preg_match('@[\W_]@', $password);

            if ($length >= 12 && $hasUpper && $hasLower && $hasDigit && $hasSymbol) {
                $strength = "Strong 💪";
                $class = "strong";
            } elseif ($length >= 8 && ($hasUpper || $hasDigit || $hasSymbol)) {
                $strength = "Moderate 😐";
                $class = "moderate";
            }

            echo "<div class='result $class'>Password Strength: <strong>$strength</strong></div>";
        }
        ?>

        <a href="index.php">← Back to Home</a>
    </div>
</body>
</html>
