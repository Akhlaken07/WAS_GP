# Web Application Security Final Assessment Group Project

## Group Name
AWASP

## Group Members
1. Muhammad Azhad bin Muhammad Nasim (2015905)
2. Qoys Al Hanif bin Jaafar (2016863)
3. Saufi Bin Azmi (2018781)

## Title
Healthy Eating

## Introduction
Healthy Eating Website which promotes a healthy lifestyle and implements security in multiple areas.


## Objectives
1. To authenticate and authorize valid user that access theirhealth information through the website.
2. To prevent unauthorize access by implementing session management.
3. To implement Regex and input validation to prevent SQL injection and XSS in the text box especially in the login and register page.
4. File directory cannot be accessed by unauthorize user since it has been disabled.
5. To prevent CSRF by implementing Anti-CSRF token and secure session management.
6. To create a safer environment for the user to access and use the website.

## Task Distribution 
| Enhancement | Assigned |
| ------------- | ------------- |
| Authentication & Authorization | Azhad |
| XSS and CSRF prevention & Input validation | Saufi |
| Database security principles & File security principle | Qoys |

## Enhancement
The authors of the file additions/enhancements are encased in square brackets as such: 
- [azhad] refers to [Muhammad Azhad bin Muhammad Nasim](https://github.com/Akhlaken07)
- [saufi] refers to [Saufi bin Azmi](https://github.com/SaufiAzmi)
- [qoys] refers to [Qoys Al Hanif bin Jaafar](https://github.com/QHanif)

## Web Application Security Enhancements

1. For Authentication, a login with two factor authentication have been added before admin can access the database
    - ### Authentication [Azhad] [login.php](enhanced/login.php) [loginPage.php](enhanced/loginPage.php) [register.php](enhanced/register.php) [registerPage.php](enhanced/registerPage.php)
      | Original  | Enhanced |
      | ------------- | ------------- |
      | No login.php   | Added a login and register page where username and password need to be enter |
      |   | After username and password has been entered, admin need to scan a QR code with OTP number to access the database  |
      |   | XSS prevention with REGEX at login page  |
      |   | Added session check in this layer   |
      
2. For Authorization, it will show the different when a user and admin login
    - ### Authorization [Azhad] [qr_otp.php](enhanced/qr_otp.php) 
      | Original  | Enhanced |
      | ------------- | ------------- |
      | No user and admin   | Added a admin role where they can see the feedback and users data  |
      |   | Added users role where they can see their profile and bmi calculation  |
      |   | XSS prevention with REGEX   |
      |   | Added session check in this layer   |
   
3. For Input Validation, Implement regex for user input on client side, server side and javascript to validate user input. 
    - ### Input Validation [Saufi] [contact.php](enhanced/contact.php) [regex.js](enhanced/js/regex.js [register.php](enhanced/register.php) [registerPage.php](enhanced/registerPage.php)
      | Original  | Enhanced |
      | ------------- | ------------- |
      | No validation for user input   | Create a regex pattern for contact form and register form |
      |   | Create our own error message to inform user either it submited or an error occured   |
      |   | Deleted unnecessary input to reduce the pontential number of vulnerabilities |

4. XXS and CSRF Prevention, Implement regex for user input on client side, server side and javascript to validate user input. 
    - ### XXS and CSRF Prevention [Saufi] [register.php](enhanced/register.php) [registerPage.php](enhanced/registerPage.php) [csrf_verify.php](enhanced/csrf_verify.php)
      | Original  | Enhanced |
      | ------------- | ------------- |
      | Input not been sanitize  | Sanitize the input to prevent any spesial symbol to be used for xxs and csrf |
      |   | Using post method for form   |
      |  Csp not implement | Implement Content Security Policy to restrict the resource that a page can load to mitigate xxs and csrf |
      |  Csrf Not implement| Implement Csrf token prevent unauthorized commands from being transmitted  |

5. **User Homepage** [Qoys]
    - ### [userHomepage.php](enhanced/userHomepage.php)
      | Original  | Enhanced |
      | ------------- | ------------- |
      | No Content Security Policy | Added CSP header to restrict resources (line 64) |
      | No session check | Added session check to ensure user is logged in (line 59) |
    

6. **User Page** [Qoys]
    - ### [userPage.php](enhanced/userPage.php)
      | Original  | Enhanced |
      | ------------- | ------------- |
      | No Content Security Policy | Added CSP header to restrict resources (line 19) |
      | No CSRF protection | Added CSRF token generation and validation (lines 22 & 33) |
      | No session check | Added session check to ensure user is logged in (line 27) |
      | No user details update | Added form to update user details with CSRF protection (lines 111) |

7. **User Details Page** [Qoys]
    - ### [userDetailsPage.php](enhanced/userDetailsPage.php)
      | Original  | Enhanced |
      | ------------- | ------------- |
      | No Content Security Policy | Added CSP header to restrict resources (line 4) |
      | No user details table | Added table to display user details (lines 40) |

8. **Database Connection** [Qoys]
    - ### [db_connect.php](enhanced/db_connect.php)
      | Original  | Enhanced |
      | ------------- | ------------- |
      | No database connection | Added database connection with custom username and password (lines 2-12) |

9. **Edit User** [Qoys]
    - ### [editUserPage.php](enhanced/editUserPage.php)
      | Original  | Enhanced |
      | ------------- | ------------- |
      | No CSRF protection | Added CSRF token generation (line 5) |
      | No session check | Added session check to ensure user is logged in (line 3) |
      | No form data validation | Added form data validation and update logic (lines 8-30) |


10. **Session Management** [Azhad] [logout.php](enhanced/logout.js)
    - Added a logout feature that destroys sessions when the user clicks the logout button.

11. **Database Security** [Qoys]
    - Included a database connection with custom username and password.

12. **Server Configuration** [Qoys]
    - Disabled file directory listing by removing 'Indexes' in `httpd.conf` (Options ~~Indexes~~ FollowSymLinks Includes ExecCGI).
    - 
      ![image](https://github.com/Akhlaken07/WAS_GP/assets/96472091/20ad1767-2079-4129-9dd1-30bcdb61397c)


13. **URL Security** [Qoys]
    - Implemented URL shortening by creating an `.htaccess` file in `htdocs` to prevent URL rewriting, which can lead to unauthorized changes to the folders.
  
![image](https://github.com/Akhlaken07/WAS_GP/assets/96472091/4ae42b89-6d5e-422f-970d-898887b60ea6)


## References
1. https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers
2. https://infosec.mozilla.org/guidelines/web_security
3. https://cheatsheetseries.owasp.org/cheatsheets
4. Webappsec class handouts from our course instructor: [Dr. Muhamad Sadry Abu Seman](https://github.com/muhdsadry), DIS, KICT, IIUM
