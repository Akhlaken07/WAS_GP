// Define the regular expressions for email and password
var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
var passwordRegex =  /^[a-zA-Z0-9!@#$%^&*]{6,}$/; 

// Sanitize input
function sanitizeInput(input) {
    return encodeURI(input);
}

// Validate email and password
function validateLoginForm() {
    // Get the form values
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;

    // Sanitize the inputs
    var sanitizedEmail = sanitizeInput(email);
    var sanitizedPassword = sanitizeInput(password);

    // Validate the form values
    if (!emailRegex.test(sanitizedEmail)) {
        alert('Invalid email format.');
        return false;
    }
    if (!passwordRegex.test(sanitizedPassword)) {
        alert('Password must contain at least one lowercase letter, one uppercase letter, and one digit. Minimum length of 7 characters.');
        return false;
    }

    // If all validations pass, show the success message
    alert("Login form has been successfully validated.");
    return true;
}

// Attach the validateLoginForm function to the form's submit event
document.addEventListener('DOMContentLoaded', function() {
    var form = document.querySelector('form');
    if(form) {
        form.onsubmit = validateLoginForm;
    }
});