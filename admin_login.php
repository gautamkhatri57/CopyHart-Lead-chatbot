<?php

session_start();

$error = "";


/*
=====================================================
ADMIN CREDENTIALS
=====================================================
Local testing ke liye fallback values hain.
Render par ADMIN_USERNAME aur ADMIN_PASSWORD
environment variables se values li jayengi.
=====================================================
*/

$adminUsername = getenv("ADMIN_USERNAME");

$adminPassword = getenv("ADMIN_PASSWORD");


/*
=====================================================
LOCAL DEVELOPMENT FALLBACK
=====================================================
*/

if ($adminUsername === false || $adminUsername === "") {

    $adminUsername = "admin";

}

if ($adminPassword === false || $adminPassword === "") {

    $adminPassword = "CopyHart@2026";

}


/*
=====================================================
LOGIN
=====================================================
*/

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"] ?? "";

    $password = $_POST["password"] ?? "";


    if (
        hash_equals($adminUsername, $username) &&
        hash_equals($adminPassword, $password)
    ) {

        session_regenerate_id(true);

        $_SESSION["admin_logged_in"] = true;

        header("Location: leads.php");

        exit;

    } else {

        $error = "Invalid username or password.";

    }

}

?>


<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>CopyHart Admin Login</title>


    <style>

        * {
            box-sizing: border-box;
        }


        body {

            margin: 0;

            min-height: 100vh;

            display: flex;

            justify-content: center;

            align-items: center;

            font-family: Arial, sans-serif;

            background: #f5f6f8;

        }


        .login-box {

            width: 380px;

            max-width: 90%;

            background: white;

            padding: 35px;

            border-radius: 15px;

            box-shadow:
                0 8px 30px rgba(0,0,0,0.10);

        }


        h1 {

            margin: 0 0 8px;

            text-align: center;

        }


        .subtitle {

            text-align: center;

            color: #666;

            margin-bottom: 25px;

        }


        label {

            display: block;

            margin-bottom: 7px;

            font-weight: bold;

        }


        input {

            width: 100%;

            padding: 12px;

            margin-bottom: 18px;

            border: 1px solid #ddd;

            border-radius: 8px;

            font-size: 15px;

        }


        button {

            width: 100%;

            padding: 13px;

            border: none;

            border-radius: 8px;

            background: #111827;

            color: white;

            font-size: 15px;

            cursor: pointer;

        }


        button:hover {

            opacity: 0.9;

        }


        .error {

            background: #fee2e2;

            color: #991b1b;

            padding: 10px;

            border-radius: 7px;

            margin-bottom: 15px;

            text-align: center;

        }

    </style>

</head>


<body>


<div class="login-box">


    <h1>
        CopyHart
    </h1>


    <div class="subtitle">
        Admin Login
    </div>


    <?php if ($error !== ""): ?>

        <div class="error">

            <?php echo htmlspecialchars($error); ?>

        </div>

    <?php endif; ?>


    <form method="POST">


        <label>
            Username
        </label>


        <input
            type="text"
            name="username"
            placeholder="Enter username"
            required
            autocomplete="username"
        >


        <label>
            Password
        </label>


        <input
            type="password"
            name="password"
            placeholder="Enter password"
            required
            autocomplete="current-password"
        >


        <button type="submit">
            Login
        </button>


    </form>


</div>


</body>

</html>