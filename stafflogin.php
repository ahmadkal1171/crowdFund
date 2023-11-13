<!DOCTYPE html>

<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>STAFF LOGIN</title>
      <link rel="stylesheet" href="css/register.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   
   <body>
      <div class="wrapper">
         <div class="title-text">
            <div class="title login">
            STAFF LOGIN
            </div>
         </div>

         

            <div class="form-inner">
               
               <form name="f1" action="login_staff.php" class="login" onsubmit = "return validation()" method = "POST">
                  <div class="field">
                     <input type="text" id="staffemail" name="staffemail" placeholder="Email Address" required>
                  </div>
                  <div class="field">
                     <input type="password" id="staffpass" name="staffpass" placeholder="Password" required>
                  </div>
                  <div class="field btn">
                     <div class="btn-layer"></div>
                     <input type="submit" name = "loginstaff" value="Login">
                  </div>
                  <div class="signup-link">
                     <a href="register.php">BACK TO CUSTOMER LOGIN</a>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <script>
         const loginText = document.querySelector(".title-text .login");
         const loginForm = document.querySelector("form.login");
         const loginBtn = document.querySelector("label.login");
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
               var id=document.f1.staffemail.value;  
               var ps=document.f1.staffpass.value;  
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