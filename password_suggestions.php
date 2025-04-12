<!-- password_suggestions.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Password Suggestions</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function copyToClipboard() {
            const password = document.getElementById("generatedPassword").innerText;
            navigator.clipboard.writeText(password).then(() => {
                document.getElementById("copyMessage").innerText = "Password copied to clipboard!";
                setTimeout(() => document.getElementById("copyMessage").innerText = "", 2000);
            });
        }

        function updateStrengthBar(password) {
            const bar = document.getElementById("strengthBarFill");
            let strength = 0;
            if (password.length >= 8) strength += 1;
            if (/[A-Z]/.test(password)) strength += 1;
            if (/[a-z]/.test(password)) strength += 1;
            if (/[0-9]/.test(password)) strength += 1;
            if (/[^A-Za-z0-9]/.test(password)) strength += 1;

            let width = ["20%", "40%", "60%", "80%", "100%"][strength - 1] || "10%";
            let color = ["#ff4d4d", "#ff944d", "#ffcc00", "#99cc33", "#33cc33"][strength - 1] || "#888";

            bar.style.width = width;
            bar.style.backgroundColor = color;
        }

        document.addEventListener("DOMContentLoaded", function () {
            const passEl = document.getElementById("generatedPassword");
            if (passEl) updateStrengthBar(passEl.innerText);
        });
    </script>
</head>
<body>
<div class="container">
    <h1>🔑 Password Suggestions</h1>
    <form method="post">
        <label><input type="checkbox" name="uppercase" checked> Include Uppercase</label>
        <label><input type="checkbox" name="lowercase" checked> Include Lowercase</label>
        <label><input type="checkbox" name="numbers" checked> Include Numbers</label>
        <label><input type="checkbox" name="symbols" checked> Include Symbols</label>
        <label>Length:
            <input type="number" name="length" value="12" min="6" max="30" required>
        </label>
        <button type="submit">Generate Password</button>
    </form>

    <?php
    function generatePassword($length, $upper, $lower, $nums, $syms) {
        $upperChars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $lowerChars = 'abcdefghijklmnopqrstuvwxyz';
        $numberChars = '0123456789';
        $symbolChars = '!@#$%^&*()-_=+[]{}|;:,.<>?';
        
        $all = '';
        if ($upper) $all .= $upperChars;
        if ($lower) $all .= $lowerChars;
        if ($nums) $all .= $numberChars;
        if ($syms) $all .= $symbolChars;

        if ($all == '') return 'Select at least one character set.';

        $password = '';
        for ($i = 0; $i < $length; $i++) {
            $password .= $all[random_int(0, strlen($all) - 1)];
        }
        return $password;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $len = $_POST["length"];
        $pass = generatePassword(
            $len,
            isset($_POST["uppercase"]),
            isset($_POST["lowercase"]),
            isset($_POST["numbers"]),
            isset($_POST["symbols"])
        );
        echo "<div class='result'>Suggested Password: <strong id='generatedPassword'>$pass</strong></div>";
        echo "
            <div class='strength-bar'>
                <div class='strength-fill' id='strengthBarFill'></div>
            </div>
        ";
        echo "<button onclick='copyToClipboard()'>📋 Copy Password</button>";
        echo "<div id='copyMessage'></div>";
        echo "<div style='margin-top:10px; text-align:left; font-size:14px; color:#aaa;'>
                <strong>Tips:</strong>
                <ul style='padding-left:20px;'>
                    <li>Use all character types for strongest passwords</li>
                    <li>12+ characters is recommended</li>
                    <li>Don't reuse old passwords</li>
                </ul>
              </div>";
    }
    ?>

    <a href="index.php">← Back to Home</a>
</div>
</body>
</html>
