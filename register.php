<!DOCTYPE html>

<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Login and Registration</title>
      <link rel="stylesheet" href="css/register.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   
   <body>
      <div class="wrapper">
         <div class="title-text">
            <div class="title login">
               Login
            </div>
            <div class="title signup">
               Signup
            </div>
         </div>

         <div class="form-container">
            <div class="slide-controls">
               <input type="radio" name="slide" id="login" checked>
               <input type="radio" name="slide" id="signup">
               <label for="login" class="slide login">Login</label>
               <label for="signup" class="slide signup">Signup</label>
               <div class="slider-tab"></div>
            </div>

            <div class="form-inner">
               
               <form name="f1" action="login_form.php" class="login" onsubmit = "return validation()" method = "POST">
                  <div class="field">
                     <input type="text" id="cusEmail" name="cusEmail" placeholder="Email Address" required>
                  </div>
                  <div class="field">
                     <input type="password" id="cusPassword" name="cusPassword" placeholder="Password" required>
                  </div>
                  <div class="pass-link">
                     <a href="#">Forgot password?</a>
                  </div>
                  <div class="field btn">
                     <div class="btn-layer"></div>
                     <input type="submit" name = "login" value="Login">
                  </div>
                  <div class="signup-link">
                     <a href="stafflogin.php">STAFF LOGIN</a>
                  </div>
               </form>

               <form action="register_form.php" class="signup" method="POST">
                  <div class="field">
                     <input type="text" placeholder="Email Address" name="cusEmail" required>
                  </div>
                  <div class="field">
                     <input type="password" placeholder="Password" name="cusPassword" required>
                  </div>
                  <div class="field">
                     <input type="text" placeholder="Full Name" name="cusName" required>
                  </div>
                  <div class="field">
                     <input type="textarea" placeholder="Address" name="cusAddress" required>
                  </div>
                  <div class="field">
                     <input type="text" placeholder="Phone Number" name="cusNumPhone" required>
                  </div>
                  <div class="field">
                     <input type="text" name="cusDOB" placeholder="Date of Birthday" onfocus="(this.type='date')" required>
                  </div>

                  <div class="field btn">
                     <div class="btn-layer"></div>
                     <input type="submit" name = "signup" value="Signup">
                     
                  </div>
               </form>
            </div>
         </div>
      </div>
      <script>
         const loginText = document.querySelector(".title-text .login");
         const loginForm = document.querySelector("form.login");
         const loginBtn = document.querySelector("label.login");
         const signupBtn = document.querySelector("label.signup");
         signupBtn.onclick = (()=>{
           loginForm.style.marginLeft = "-50%";
           loginText.style.marginLeft = "-50%";
         });
         loginBtn.onclick = (()=>{
           loginForm.style.marginLeft = "0%";
           loginText.style.marginLeft = "0%";
         });
         signupLink.onclick = (()=>{
           signupBtn.click();
           return false;
         });
      </script>

      <script>  
         function validation()  
         {  
               var id=document.f1.cusEmail.value;  
               var ps=document.f1.cusPassword.value;  
               if(id.length=="" && ps.length=="") {  
                  alert("User Name and Password fields are empty");  
                  return false;  
               }  
               else  
               {  
                  if(id.length=="") {  
                     alert("User Name is empty");  
                     return false;  
                  }   
                  if (ps.length=="") {  
                  alert("Password field is empty");  
                  return false;  
                  }  
               }                             
         }  
      </script>  

   </body>
</html>