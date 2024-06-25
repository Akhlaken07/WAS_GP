<?php
session_start();
header("Content-Security-Policy: default-src 'self' https://stackpath.bootstrapcdn.com");
$_SESSION['csrf_token'] = bin2hex(random_bytes(32));
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
    <!-- Include Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #343a40; /* Dark grey background */
        }
        .container {
            background-color: #343a40; /* Dark grey background */
            color: #ffc107; /* Yellow text */
            border-radius: 10px;
            padding: 20px;
        }
        .btn-primary {
            background-color: #ffc107; /* Yellow button */
            border-color: #ffc107;
            color: #343a40; /* Dark grey text */
        }
        .btn-primary:hover {
            background-color: #e0a800; /* Darker yellow on hover */
            border-color: #e0a800;
        }
        .form-control {
            background-color: #495057; /* Dark grey input background */
            color: #ffc107; /* Yellow input text */
            border: 1px solid #ffc107; /* Yellow border */
        }
        .form-control:focus {
            background-color: #495057;
            color: #ffc107;
            border-color: #e0a800; /* Darker yellow on focus */
            box-shadow: none;
        }
        .form-group label {
            color: #ffc107; /* Yellow label text */
        }
        a {
            color: #ffc107; /* Yellow link */
        }
        a:hover {
            color: #e0a800; /* Darker yellow on hover */
        }
    </style>
</head>
<body>
    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-4">
                <h1 class="text-center mb-4">Login</h1>
                <form action="login.php" method="post" onsubmit="return validateLoginForm()">
                    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                    <div class="form-group mt-3">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" pattern="^[a-zA-Z0-9!@#$%^&*]{6,}$" class="form-control" required>
                    </div>
                    <input type="submit" value="Login" class="btn btn-primary">
                    <p class="mt-3">Don't have an account? <a href="registerPage.php" style="margin-left: 10px;">Register Here</a></p>
                </form>
            </div>
        </div>
    </div>
    <script src="js/loginregex.js"></script>
</body>
</html>