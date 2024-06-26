<?php
 
require 'sessionCheck.php';
header("Content-Security-Policy: default-src 'self' https://stackpath.bootstrapcdn.com  style-src 'self' 'unsafe-inline' https://cdn.jsdelivr.net https://fonts.googleapis.com https://ka-f.fontawesome.com ");
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #e4e4e4; /* Dark grey background */
        }
        h1, .alert {
            background-color: #ffeb3b; /* Yellow background */
            color: #343a40; /* Dark grey text */
        }
        .btn-primary {
            background-color: #ffeb3b; /* Yellow background */
            color: #343a40; /* Dark grey text */
            border-color: #ffeb3b;
        }
        .btn-primary:hover {
            background-color: #fdd835; /* Darker yellow on hover */
            border-color: #fdd835;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #e9ecef; /* Light grey for odd rows */
        }
        .table-striped tbody tr:nth-of-type(even) {
            background-color: #f8f9fa; /* Lighter grey for even rows */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p>Welcome, <?php echo $_SESSION['role']; echo "<br>session_id(): ".session_id();?>!</p>
                <form action="logout.php" method="post" class="float-right">
                    <input type="submit" value="Logout" class="btn btn-primary">
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center my-5">
                <h1>User Details Table</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-striped">
                    <tbody id="data-container">
                        <script src="js/loadUser.js"></script>
                    </tbody>
                </table>
            </div>
        </div>
        <?php if (isset($_GET['message'])): ?>
            <div class="row">
                <div class="col-12">
                    <div id="message" class="alert alert-success" role="alert">
                        <?php echo htmlspecialchars($_GET['message']); ?>
                    </div>
                    <script>
                        setTimeout(function() {
                            document.getElementById('message').style.display = 'none';
                        }, 3000);
                    </script>
                </div>
            </div>
            
        <?php endif; ?>
    </div>
    <?php
    include "database_feedback.php"
    ?>
    
</body>
</html>