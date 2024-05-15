# Hackathon en php

building a secure authentication system using PHP. Authentication is a critical aspect of web applications, ensuring that only authorized users have access to protected resources. By following best practices and implementing security measures, we can create a robust authentication system that protects user accounts and sensitive data from unauthorized access.

# SIGN UP FORUM
check if the form is submitted by this function ($_SERVER["REQUEST_METHOD"] == "POST").Then it validates input fields (name, email, password, confirm_password) for emptiness and sanitizes them.Also it ensures if the password matches the confirm password and hashes the password using *password_hash()*.It checks if the email already exists in the database and displays an error message if it does.If all validations pass, it inserts the user's details into the database and redirects to the login page.
<p align="center" width="400"> 
  
  ![Image description](https://dev-to-uploads.s3.amazonaws.com/uploads/articles/g3bap15xmbp3vco8qwvt.PNG) 
</p>


# LOG IN FORM
we will verify the e-mail adresse and Username if they're available in our database then we're going to bring our hashed password then in-hash it by this function **password_verify()** and at the same time we compare it by the one in our database to see if it's correct or not and we created a session we put the username so we can use it in the dashboard.
  
<p align="center" width="400"> 
  
![Image description](https://dev-to-uploads.s3.amazonaws.com/uploads/articles/r1x27apvr6x46r4ey8gf.PNG)
</p>

# DASHBOARD
the dashboard that displays to the user when you put your information correctly and destroys the session when we click on Logout from the dashboard
<p align="center" width="400"> 
  
![Image description](https://dev-to-uploads.s3.amazonaws.com/uploads/articles/c14n2buzbujybmlt9iti.png) 
</p>

# LOG OUT
<p align="center" width="400"> 
  
![Image description](https://dev-to-uploads.s3.amazonaws.com/uploads/articles/2py3iq6y5s0avg0tk7zb.png)
</p>


# ERROR Page
When we want to have access to our dashboard without login its shows an error page.
<p align="center" width="400"> 
  
![Image description](https://dev-to-uploads.s3.amazonaws.com/uploads/articles/s9tpd1cghtqt1zsqere7.png) </br>
</p>
