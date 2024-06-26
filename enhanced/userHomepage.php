<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Healthy Food</title>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/responsive.css">
    <style>
        body {
            background-color: #f0f0f0; /* Light grey background */
            color: #333; /* Dark grey text */
        }
        .navbar {
            background-color: #333; /* Dark grey navbar */
        }
        .navbar .nav-link, .navbar .navbar-brand {
            color: #ffcc00; /* Yellow text for links and brand */
        }
        .btn-secondary {
            background-color: #ffcc00; /* Yellow button */
            border-color: #ffcc00;
            color: #333; /* Dark grey text on button */
        }
        .btn-secondary:hover {
            background-color: #e6b800; /* Darker yellow on hover */
            border-color: #e6b800;
        }
        .welcome-message {
            color: #ffcc00; /* Yellow welcome message */
        }
        h2 {
            color: #333; /* Dark grey for headings */
        }
        p {
            color: #666; /* Medium grey for paragraphs */
        }
        .container {
            background-color: #fff; /* White background for container */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <?php
    require 'sessionCheck.php';
    require 'db_connect.php';

    // Check if the user is logged in
    if (!isset($_SESSION['useremail'])) {
        die('You are not logged in');
    }

    // Set Content Security Policy
    header("Content-Security-Policy: default-src 'self' https://stackpath.bootstrapcdn.com  style-src 'self' 'unsafe-inline' https://cdn.jsdelivr.net https://fonts.googleapis.com https://ka-f.fontawesome.com ");

    // Get the user's details from the database
    $sql = "SELECT name, height, weight, homeAddress, email, countryCodeMobile, mobilePhone FROM Userdetails WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_SESSION['useremail']);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if (!$user) {
        die('User not found');
    }

    // Calculate BMI
    $bmi = $user['weight'] / (($user['height'] / 100) * ($user['height'] / 100));

    // Determine BMI category
    function getBMICategory($bmi) {
        if ($bmi < 18.5) {
            return "Underweight";
        } elseif ($bmi < 24.9) {
            return "Normal weight";
        } elseif ($bmi < 29.9) {
            return "Overweight";
        } else {
            return "Obesity";
        }
    }

    $bmiCategory = getBMICategory($bmi);

    // Recommended next steps based on BMI category
    function getNextSteps($bmiCategory) {
        switch ($bmiCategory) {
            case "Underweight":
                return "Consider a balanced diet with more calories and consult a healthcare provider.";
            case "Normal weight":
                return "Maintain your current lifestyle and keep up with regular exercise.";
            case "Overweight":
                return "Consider a balanced diet with fewer calories and increase physical activity.";
            case "Obesity":
                return "Consult a healthcare provider for a personalized weight loss plan.";
        }
    }

    $nextSteps = getNextSteps($bmiCategory);

    // Additional information about BMI categories
    function getBMICategoryInfo($bmiCategory) {
        switch ($bmiCategory) {
            case "Underweight":
                return "Being underweight can lead to health issues such as weakened immune system, fragile bones, and fatigue. It's important to eat a nutrient-rich diet and consult with a healthcare provider.";
            case "Normal weight":
                return "Maintaining a normal weight is associated with a lower risk of chronic diseases. Continue with a balanced diet and regular physical activity to stay healthy.";
            case "Overweight":
                return "Being overweight can increase the risk of cardiovascular diseases, diabetes, and other health issues. Consider a balanced diet and regular exercise to manage your weight.";
            case "Obesity":
                return "Obesity is linked to a higher risk of serious health conditions such as heart disease, diabetes, and certain cancers. It's important to seek medical advice for a comprehensive weight management plan.";
        }
    }

    $bmiCategoryInfo = getBMICategoryInfo($bmiCategory);

    // Personalized diet recommendations
    function getDietRecommendations($bmiCategory) {
        switch ($bmiCategory) {
            case "Underweight":
                return "Include more calorie-dense foods like nuts, dried fruits, and whole grains. Ensure a balanced intake of proteins, fats, and carbohydrates.";
            case "Normal weight":
                return "Maintain a balanced diet with a variety of foods from all food groups. Focus on whole foods and avoid processed foods.";
            case "Overweight":
                return "Opt for a diet rich in fruits, vegetables, lean proteins, and whole grains. Reduce intake of sugary drinks and high-calorie snacks.";
            case "Obesity":
                return "Work with a healthcare provider to create a personalized diet plan. Focus on nutrient-dense foods and monitor portion sizes.";
        }
    }

    $dietRecommendations = getDietRecommendations($bmiCategory);

    // Exercise suggestions
    function getExerciseSuggestions($bmiCategory) {
        switch ($bmiCategory) {
            case "Underweight":
                return "Incorporate strength training exercises to build muscle mass. Ensure adequate rest and recovery.";
            case "Normal weight":
                return "Maintain a mix of cardiovascular exercises and strength training. Aim for at least 150 minutes of moderate exercise per week.";
            case "Overweight":
                return "Focus on low-impact exercises like walking, swimming, or cycling. Gradually increase intensity and duration.";
            case "Obesity":
                return "Start with low-impact activities and gradually increase intensity. Consult a healthcare provider for a safe exercise plan.";
        }
    }

    $exerciseSuggestions = getExerciseSuggestions($bmiCategory);

    // Ask for age and gender
    $age = isset($_POST['age']) ? $_POST['age'] : 25; // Default age
    $gender = isset($_POST['gender']) ? $_POST['gender'] : 'male'; // Default gender

    // Estimate daily caloric needs using Harris-Benedict equation
    function calculateCaloricNeeds($weight, $height, $age, $gender) {
        if ($gender == 'male') {
            return 88.362 + (13.397 * $weight) + (4.799 * $height) - (5.677 * $age);
        } else {
            return 447.593 + (9.247 * $weight) + (3.098 * $height) - (4.330 * $age);
        }
    }

    $caloricNeeds = calculateCaloricNeeds($user['weight'], $user['height'], $age, $gender);
    ?>

    <!-- Navigation Bar -->
    <div class="top-navbar">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Healthy Eating</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="userPage.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
			<button id="toggleButton" class="btn btn-secondary">Show Email and Session ID</button>
				<div id="emailSessionInfo" style="display: none;">
				    <h2>Email: <?php echo $_SESSION['useremail']; echo "<br>Session ID: ".session_id();?>!</h2>
				</div>
				<script>
				    document.addEventListener('DOMContentLoaded', function() {
				        var infoDiv = document.getElementById('emailSessionInfo');
				        infoDiv.style.display = 'none';
				    });

				    document.getElementById('toggleButton').addEventListener('click', function() {
				        var infoDiv = document.getElementById('emailSessionInfo');
				        if (infoDiv.style.display === 'none') {
				            infoDiv.style.display = 'block';
				            this.textContent = 'Hide Email and Session ID';
				        } else {
				            infoDiv.style.display = 'none';
				            this.textContent = 'Show Email and Session ID';
				        }
				    });
				</script>
                <h1 class="welcome-message">Welcome, <?php echo htmlspecialchars($user['name']); ?>!</h1>
                <p>Your BMI is: <?php echo number_format($bmi, 2); ?> (<?php echo $bmiCategory; ?>)</p>
                <p><?php echo $bmiCategoryInfo; ?></p>
                <h2>Next Steps</h2>
                <p><?php echo $nextSteps; ?></p>
                <h2>Diet Recommendations</h2>
                <p><?php echo $dietRecommendations; ?></p>
                <h2>Exercise Suggestions</h2>
                <p><?php echo $exerciseSuggestions; ?></p>
                <h2>Estimated Daily Caloric Needs</h2>
                <p>Your estimated daily caloric needs are: <?php echo number_format($caloricNeeds, 2); ?> calories.</p>

                <!-- Form for Age and Gender -->
                <form method="post" action="">
                    <label for="age">Age:</label>
                    <input type="number" id="age" name="age" value="<?php echo htmlspecialchars($age); ?>" required>
                    <label for="gender">Gender:</label>
                    <select id="gender" name="gender" required>
                        <option value="male" <?php if ($gender == 'male') echo 'selected'; ?>>Male</option>
                        <option value="female" <?php if ($gender == 'female') echo 'selected'; ?>>Female</option>
                    </select>
                    <input type="submit" value="Update" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
