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
Healthy Eating Website which promote healthy lifestyle that have been implement a security in multiple area. 


## Objectives
1. To secure the database of users with proper authentication and authorization
2. Preventing Cross Site Scripting and Cross Site Forgery with proper implementation
3. Implementing REGEX and Sanitization 
4. ??
5. ??
6. ??
      
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
   

## References
1. Webappsec class handouts from our course instructor: [Dr. Muhamad Sadry Abu Seman](https://github.com/muhdsadry), DIS, KICT, IIUM
