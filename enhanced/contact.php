<?php
$conn = new mysqli('localhost', 'root', '', 'healthywebsite');
if ($conn->connect_error) {
    die('Connection Failed : ' . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['name'], $_POST['mail'], $_POST['phone'], $_POST['address'], $_POST['message'])) {
    
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $mail = filter_var($_POST['mail'], FILTER_SANITIZE_EMAIL);
    $phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
    $address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

    // Validate input
    $nameRegex = "/^[a-zA-Z\s]+$/";
    $emailRegex = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/";
    $phoneRegex = "/^[0-9]{10,15}$/";
    $addressRegex = "/^[a-zA-Z0-9\s,.'-]{3,}$/";
    $messageRegex = "/^[\w\s,.!?-]{5,}$/"; // Simple regex for demonstration

    if (!preg_match($nameRegex, $name)) {
        die('Invalid name format');
    }
    if (!preg_match($emailRegex, $mail)) {
        die('Invalid email format');
    }
    if (!preg_match($phoneRegex, $phone)) {
        die('Invalid phone number format');
    }
    if (!preg_match($addressRegex, $address)) {
        die('Invalid address format');
    }
    if (!preg_match($messageRegex, $message)) {
        die('Invalid message format');
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO feedback (name, mail, phone, address, message) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $mail, $phone, $address, $message);

    // Execute
    $stmt->execute();
    echo "Message submitted successfully";
    $stmt->close();
}
$conn->close();
?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Contact</title>
      <link rel="stylesheet" href="css/Dstyles.css">
  </head>

  <body>
    <h1 style="background-color: black; color: white; text-align: center; padding: 15px 32px; font-family: serif; font-size: 32px;font-weight:bold;">Healthy Eating</h1>
  
    <header class="top-navbar">
      <nav class="navbar">
        <a class="nav-link" href="index.php" title="Home">Home</a>
        <a class="nav-link" href="about-us.html" title="About us">About us</a>
        <a class="nav-link" href="why-healthy-meal.html" title="Why Healthy Meal">Why Healthy Meal</a>
        <a class="nav-link" href="healthy-food.html" title="Healthy Food">Healthy Food</a>
        <a class="nav-link" href="contact.html" title="Contact">Contact</a>
        <a class="nav-link" href="about-your-body.html" title="About Your Body">About Your Body</a>
        <a class="nav-link" href="login.php" title="Admin Login" style=" right: 0; transform: translateY(-50%);">Admin Login</a>
      </nav>
    </header>

   <br><br>

<div class="contacts">
<img src="images\lappy.jpg" />

</div>

<div class="words">
<h1>Contact</h1>
<p>No. 244 MyTown, Cheras</p>
<p>healthyeating@gmail.com</p>
<p>016-5748329</p>

</div>

<div class="form">
<div class="transbox">

  <form id="myForm" onsubmit="return validateForm()" method="post">
    <label for="myname">Name: </label>
    <input type="text" id="name" name="name" pattern="^[a-zA-Z\s]+$" required><br>
    <label for="myemail">Email: </label>
    <input type="text" id="mail" name="mail" pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" required><br>
    <label for="myphone">Phone No: </label>
    <input type="text" id="phone" name="phone" pattern="^[0-9]{10,15}$" required><br>
    <label for="myaddress">Address: </label>
    <input type="text" id="address" name="address" pattern="^[a-zA-Z0-9\s,.'-]{3,}$" required><br>
    <label for="mymessage">Message: </label>
    <input type="text" id="message" name="message" pattern="^[\w\s,.!?-]{5,}$" required><br>
    <button type="submit">Submit</button>
  
  </form>

</div>
</div>


<div class="contacts">
<img src="images\maps.png" />
<script src="js/regex.js"></script>

  </body>
</html>
