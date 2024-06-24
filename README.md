# Web Application Security Final Assessment Group Project

## Group Name
AWASP

## Group Members
1. Muhammad Azhad bin Muhammad Nasim (2015905)
2. 
3. 

## Title
Healthy Eating

## Introduction
Website to introduce on healthy eating which have been improve with web application security


## Objectives
1. To authenticate and authorize valid user that can place their order through the website.
2. To prevent unauthorize access by implementing session management.
3. To implement Regex and input validation to prevent SQL injection and XSS in the text box especially in the login and register page.
4. File directory cannot be accessed by unauthorize user since it has been disabled.
5. To prevent CSRF by implementing Anti-CSRF token and secure session management.
6. To create a safer environment for the user to access and use the website.
      
## Web Application Security Enhancements

1. Added user authorisation pages which are register.php and login.php and auth.php
    - ### [register.php](Enhanced/register.php) [hani]
      | Original  | Enhanced |
      | ------------- | ------------- |
      | Register.php has not been developed yet  | Add input validation using Regex and create error message in line 1 - 82 in the code  |
      |   | XSS prevention in line 1 - 82 in the code  |
      |   | Connect with the database in line 106 in the code  |
      |   | SQL injection prevention in line 105 - 130 in the code  |
      |   | Create registration form and include validate early in line 152 - 179 in the code   |
      |   | Display error message in line 157 , 161, 165, 169 and 173 in the code   |
      |   | Improving on the CSP in line 181 & 182 in the code  |
      |   | In line 190 - 193 in the code, if there is no error, then, the user is registered  |
      |   | Data redundancy prevention in line 194 - 199 in the code  |


    - ### [login.php](Enhanced/login.php) [syamira]
      | Original  | Enhanced |
      | ------------- | ------------- |
      | Login.php has not been developed yet  | Add input validation using Regex and create error message in line 1 - 82 in the code  |
      |   | There is session.php implemented and being included in all pages.  |
      |   | Connect with the database in line 3 in auth.php where it is being included with db.php  |
      |   | SQL injection prevention in line 8-11 in the code at auth.php |
      |   | Create login form and include validate early in line 92-122 in the login.php   |
      |   | There is function validation in line 125-146 which alert the user if no email and password is being inserted.   |
      |   | In line 23 in the code of auth.php, if there is error, then, "Login failed! Please try again" is displayed |

    - ### [auth.php](Enhanced/auth.php) [syamira] 
      | Original  | Enhanced |
      | ------------- | ------------- |
      | auth.php has not been developed yet | Authn logic file for login.php line 1 - 19|
      |   | Email passed in session to mark as logged in in line 20	[zaidi]|	 	
      |   | Cryptographically generated sessionid in line 22 - 27 [zaidi]|
      |   | Anti-CSRF token generated in line 29 - 38	[zaidi]|
The Anti-CSRF token is generated using HMAC (Hash-based Message Authentication Code), recommended by OWASP, with the secret key located in the .env file.<br><br>

3. Added functionality to menu, order and review pages

    - ### [menu.php](Enhanced/menu.php) [zaidi]
      | Original  | Enhanced |
      | ------------- | ------------- |
      | Only displays menu item | Add to cart buttons added below menu item e.g. at line 64 - 66|
      |   | Authorization only logged in can add to cart logic in line 7 - 10	|	 	
      |   | Passing cart items using session in line 12 - 35	|

    - ### [order.php](Enhanced/order.php) [zaidi]
      | Original  | Enhanced |
      | ------------- | ------------- |
      | Only displays Google Forms to order | Print cart from session loop at line 34 - 41|
      |   | Total price calculation in line 4 - 10	|	 	
      |   | CSRF token check to ensure only valid logged in users can finalize transaction in line 49 - 63|
      |   | Clear cart with unset session in clear_cart.php in line 67 - 69|

    - ### [review.php](Enhanced/review.php) [faiz]
      | Original  | Enhanced |
      | ------------- | ------------- |
      | Only displays a static HTML page | Add forms to enable the user to submit their review by asking their name, rating and review details|
      |  The review from user is hardcoded | The review submitted from user is automatically published |
      |   | Displays the reviews by the users |	 	
      |   | Implement regex to sanitize the input |

    - ### [reviewsubmit.php](Enhanced/reviewsubmit.php) [faiz]
      | Original  | Enhanced |
      | ------------- | ------------- |
      | reviewsubmit.php did not exist| Add reviewsubmit.php to sanitize the input from users |
      |   | Implement input sanitization from server side|	 	
      |   | Submit review to database with regex |

4. Added session management. session.php file also acts as header file.

    - ### [session.php](Enhanced/session.php) [zaidi]
      | Original  | Enhanced |
      | ------------- | ------------- |
      | session.php has not been developed yet  | Included in every page to pass session variables and as header|
      |   | Absolute session timeout in line 2 in the code  |
      |   | Calls session in line 3 |
      |   | Included general CSP for all pages in line 5|
      |   | Strict-Transport-Security which forces browser to use https in line 6|
      |   | Prevent MIME sniffing which can translate to XSS attacks in line 7|
      |   | Same-origin referrer to protect user privacy when making requests to other websites in line 8|
      |   | XSS filtering and prevent rendering page if attack detected in line 9|

5. Added [logout.php](Enhanced/logout.php) which destroy sessions [zaidi]

6. Included database with [db.php](Enhanced/db.php) with custom username & password [hani]

7. Disable file directory by removing 'Indexes' in httpd.conf (Options ~~Indexes~~ FollowSymLinks Includes ExecCGI) [hani][syamira]  

8. Prevent robots/indexers from crawling certain files (secret key .env file) and folders with [robots.txt](Enhanced/robots.txt) [zaidi]

9. Shortened the URL is being implemented by creating .htacces file in htdocs to prevent any URL rewriting which can lead the attackers to make any changes to the folders. [hani][syamira] 

    .htaccess file is shown below:

   ![htaccessjpg](https://github.com/Konaya245/webappsec-enhance/assets/121520663/40996b35-1d68-4beb-a2f2-398651181108)

   

## References
1. Webappsec class handouts from our course instructor: [Dr. Muhamad Sadry Abu Seman](https://github.com/muhdsadry), DIS, KICT, IIUM
