// validation.js
var validationRules = {
    name: /^[A-Za-z\s]+$/,
    email: /^.+@gmail.com$/,
    countryCode: /^\+\d{1,3}$/,
    phoneNo: /^\d{9,15}$/
};

function validateForm() {
    var name = document.getElementById('name').value;
    if (!validationRules.name.test(name)) {
        alert('Invalid name');
        return false;
    }

    

    var email = document.getElementById('email').value;
    if (!validationRules.email.test(email)) {
        alert('Invalid email');
        return false;
    }

    var countryCodeMobile = document.getElementById('countryCodeMobile').value;
    if (!validationRules.countryCode.test(countryCodeMobile)) {
        alert('Invalid mobile country code');
        return false;
    }

    var mobilePhone = document.getElementById('mobilePhone').value;
    if (!validationRules.phoneNo.test(mobilePhone)) {
        alert('Invalid mobile phone number');
        return false;
    }


    // If all validations pass
    return true;
}