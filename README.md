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
    - ### Authentication [Azhad]
      | Original  | Enhanced |
      | ------------- | ------------- |
      | No login.php   | Added a login page where username and password need to be enter |
      |   | After username and password has been entered, admin need to scan a QR code with OTP number to access the database  |
      |   | XSS prevention with REGEX   |
      
2. For Authorization, it will show the different when a user and admin login
    - ### Authorization [Azhad]
      | Original  | Enhanced |
      | ------------- | ------------- |
      | No user and admin   | Added a admin role where they can see the feedback and users data  |
      |   | Added users role where they can see their profile and bmi calculation  |
      |   | XSS prevention with REGEX   |
   
3. For Input Validation, Implement regex for user input on client side, server side and javascript to validate user input. 
    - ### Input Validation [Saufi]
      | Original  | Enhanced |
      | ------------- | ------------- |
      | No validation for user input   | Create a regex pattern for contact form and register form |
      |   | Create our own error message to inform user either it submited or an error occured   |
      |   | Deleted unnecessary input to reduce the pontential number of vulnerabilities |

4. XXS and CSRF Prevention, Implement regex for user input on client side, server side and javascript to validate user input. 
    - ### XXS and CSRF Prevention [Saufi]
      | Original  | Enhanced |
      | ------------- | ------------- |
      | Input not been sanitize  | Sanitize the input to prevent any spesial symbol to be used for xxs and csrf |
      |   | Using post method for form   |
      |  Csp not implement | Implement Content Security Policy to restrict the resource that a page can load to mitigate xxs and csrf |
      |  Csrf Not implement| Implement Csrf token prevent unauthorized commands from being transmitted  |

5. **Session Management** [Azhad]
    - Added a logout feature that destroys sessions when the user clicks the logout button.

6. **Database Security** [Qoys]
    - Included a database connection with custom username and password.

7. **Server Configuration** [Qoys]
    - Disabled file directory listing by removing 'Indexes' in `httpd.conf` (Options ~~Indexes~~ FollowSymLinks Includes ExecCGI).

8. **URL Security** [Qoys]
    - Implemented URL shortening by creating an `.htaccess` file in `htdocs` to prevent URL rewriting, which can lead to unauthorized changes to the folders.
  


## References
1. Webappsec class handouts from our course instructor: [Dr. Muhamad Sadry Abu Seman](https://github.com/muhdsadry), DIS, KICT, IIUM
