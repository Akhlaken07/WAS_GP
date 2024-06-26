
<?php
session_start();
header("Content-Security-Policy: default-src 'self' https://stackpath.bootstrapcdn.com  style-src 'self' 'unsafe-inline' https://cdn.jsdelivr.net https://fonts.googleapis.com https://ka-f.fontawesome.com ");

$_SESSION['csrf_token'] = bin2hex(random_bytes(32));
?>
<!DOCTYPE html>

<html>
<head>
<title>Registration Form</title>
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
<div class="top-navbar">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="userHomepage.php">Healthy Eating</a>
            
        </nav>
    </div>
     <div class="container h-100">
    <h1 class="text-center mb-4">Register</h1>
            <div class="row justify-content-center">
            
                <form action="register.php" method="post" onsubmit="return validateForm1()" class="col-4">
                <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                    <div class="form-group mt-3">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" pattern="[A-Za-z\s]+" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="height">Height (cm):</label>
                        <input type="number" id="height" name="height" min="0" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="weight">Weight (kg):</label>
                        <input type="number" id="weight" name="weight" min="0" class="form-control">
                    </div>
                  
                    <div class="form-group">
                        <label for="homeAddress">Home Address:</label>
                        <input type="text" id="homeAddress" name="homeAddress" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="countryCodeMobile">Mobile Phone No:</label>
                        <div class="row">
                            <div class="col-3">
                                <input type="text" id="countryCodeMobile" name="countryCodeMobile" placeholder="Country Code" pattern="\+\d{1,3}" class="form-control">
                            </div>
                          <p class="mt-1">-</p>
                            <div class="col">
                                <input type="text" id="mobilePhone" name="mobilePhone" pattern="\d{9,12}" class="form-control">
                            </div>
                        </div>
                    </div>
                   

                    <input type="submit" value="Register" class="btn btn-primary">
                    <p class="mt-3">Already have an account? <a href="loginPage.php" style="margin-left: 10px;">Log in</a></p>
                  
                </form>
             
                
            </div>
        
    </div>
    <script src="js/registerregex.js"></script>
</body>
</html>