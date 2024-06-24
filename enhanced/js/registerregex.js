// Define the regular expressions
var passwordRegex = /^[a-zA-Z0-9!@#$%^&*]{6,}$/; // Example: At least 6 characters long
var heightRegex = /^\d+$/; // Only digits
var weightRegex = /^\d+$/; // Only digits
var homeAddressRegex = /^[a-zA-Z0-9\s,.'-]{3,}$/; // Similar to addressRegex
var mobilePhoneRegex = /^\+\d{1,3}\d{9,12}$/; // Combined country code and phone number
var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/; // Email validation

function validateForm1() {
    // Get the form values
    var email = document.getElementById('email').value; 
    var password = document.getElementById('password').value;
    var height = document.getElementById('height').value;
    var weight = document.getElementById('weight').value;
    var homeAddress = document.getElementById('homeAddress').value;
    var countryCodeMobile = document.getElementById('countryCodeMobile').value;
    var mobilePhone = document.getElementById('mobilePhone').value;
  // Get the email value

    // Sanitize the inputs
    var sanitizedEmail = encodeURI(email); 
    var sanitizedPassword = encodeURI(password);
    var sanitizedHeight = encodeURI(height);
    var sanitizedWeight = encodeURI(weight);
    var sanitizedHomeAddress = encodeURI(homeAddress);
    var sanitizedMobilePhone = encodeURI(countryCodeMobile + mobilePhone);
    

    // Validate the form values
    if (!emailRegex.test(sanitizedEmail)) { // Validate the email
        alert('Invalid email address');
        return false;
      }
    if (!passwordRegex.test(sanitizedPassword)) {
      alert('Invalid password');
      return false;
    }
    if (!heightRegex.test(sanitizedHeight)) {
      alert('Invalid height');
      return false;
    }
    if (!weightRegex.test(sanitizedWeight)) {
      alert('Invalid weight');
      return false;
    }
    if (!homeAddressRegex.test(sanitizedHomeAddress)) {
      alert('Invalid home address');
      return false;
    }
    if (!mobilePhoneRegex.test(sanitizedMobilePhone)) {
      alert('Invalid mobile phone number');
      return false;
    }
}