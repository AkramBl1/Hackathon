# Hackathon 
##**INTRODUCTION**

In this tutorial, we'll walk through the process of building a secure authentication system using PHP. Authentication is a critical aspect of web applications, ensuring that only authorized users have access to protected resources. By following best practices and implementing security measures, we can create a robust authentication system that protects user accounts and sensitive data from unauthorized access.
##**CREATING A DATABASE AND TABLE**
-In these codes below us we're going to show you how to create a database by PDO and a table in our database.
    <img src="![code1](https://github.com/AkramBl1/Hackathon/assets/155922765/ac8cdbc7-e6df-4c21-80d0-b2fd025ef7a4)
" >
-Now we're going to show you how it this code works.
![Image description](https://dev-to-uploads.s3.amazonaws.com/uploads/articles/wiv394qtg0qwkhou83uo.PNG)
##**SIGN UP FORUM**
![Image description](https://dev-to-uploads.s3.amazonaws.com/uploads/articles/0werktaxmy8xi59aaaz0.png)-In this code we check if the form is submitted by this function ($_SERVER["REQUEST_METHOD"] == "POST").Then it validates input fields (name, email, password, confirm_password) for emptiness and sanitizes them.Also it ensures if the password matches the confirm password and hashes the password using password_hash().It checks if the email already exists in the database and displays an error message if it does.If all validations pass, it inserts the user's details into the database and redirects to the login page.![Image description](https://dev-to-uploads.s3.amazonaws.com/uploads/articles/g3bap15xmbp3vco8qwvt.PNG)-This is how the sign up form shows up.
##**LOG IN FORUM**
![Image description](https://dev-to-uploads.s3.amazonaws.com/uploads/articles/f8nkgnewrx4sseia0u0s.png)-In this code we will verify the e-mail adresse and Username if they're available in our database then we're going to bring our hashed password then in-hash it by this function **password_verify()** and at the same time we compare it by the one in our database to see if it's correct or not and we created a session we put the username so we can use it in the dashboard.
![Image description](https://dev-to-uploads.s3.amazonaws.com/uploads/articles/r1x27apvr6x46r4ey8gf.PNG)-This is how the forum shows up.
##**DASHBOARD**
![Image description](https://dev-to-uploads.s3.amazonaws.com/uploads/articles/utfzdbov5wvuzt8xcz3t.png)-This code represents the dashboard that displays to the user when you put your information correctly
![Image description](https://dev-to-uploads.s3.amazonaws.com/uploads/articles/c14n2buzbujybmlt9iti.png)-This is how the dashboard shows up after you fill in the information correctly.
##**LOG OUT**
![Image description](https://dev-to-uploads.s3.amazonaws.com/uploads/articles/36jv5f0cdd3gvy6fnn3y.png)-This code destroys the session when we click on Logout from the dashboard .We can log out like in the picture below
![Image description](https://dev-to-uploads.s3.amazonaws.com/uploads/articles/2py3iq6y5s0avg0tk7zb.png)
##**ERROR**
![Image description](https://dev-to-uploads.s3.amazonaws.com/uploads/articles/s9tpd1cghtqt1zsqere7.png)-When we want to have access to our dashboard without login its shows an error page.
![Image description](https://dev-to-uploads.s3.amazonaws.com/uploads/articles/fxnltqd12z48bepbcraq.png)-This code is commonly used for session-based authentication. If a user tries to access a page without being logged in, they are redirected to another page, typically a login page or an error page.
