<!DOCTYPE html>
<html lang="en">

   <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="login_customer.php">
    
    <title>Sign-up Form</title>
   </head>

    <body>
      <div class="logo">
        <p>ELIGERE</p>
      </div>
      <div class="nav_menu">
        <ul>
           <li><a href="#" class="link">Home</a></li>
           <li><a href="#" class="link">About Us</a></li>
           <li><a href="#" class="link">Contact Us</a></li>
           <li><a href="#" class="link">Sign-up</a></li>
        </ul>
     </div>
      <div class="wrapper">
          <form action="">
              <h1>Sign Up</h1>
              <div class = "input-box">
                <input type = "text" placeholder="Fullname" required>
                <i class="bi bi-person-fill"></i>
              </div>
              <div class = "input-box">
                <input type = "text" placeholder="Complete Address" required>
                <i class="bi bi-house-fill"></i>
              </div>
              <div class = "input-box">
                <input type = "text" placeholder="Contact Number" required>
                <i class="bi bi-phone-fill"></i>
              </div>
              <div class = "input-box">
                <input type = "text" placeholder="Email" required>
                <i class="bi bi-envelope-fill"></i>
              </div>
              <div class = "input-box">
                <input type = "text" placeholder="Password" required>
                <i class="bi bi-lock-fill"></i>
              </div>
             <button type="submit" class="button">Sign-up</button>
             <div class="register-link">
               <p>Already have an account? <a href ="login_customer.php">Login</a></p>
             </div>
          </form>
      </div>

    </body>


</html>