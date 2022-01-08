<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div>
          <h3>CAS Document System</h3>
     </div>
     <form action="login.php" method="post">
          <br><h2>LOG IN</h2>
          <?php if (isset($_GET['error'])) { ?>
               <p class="error"><?php echo $_GET['error']; ?></p>
          <?php } ?>
          <label>Email Address</label>
          <input type="email" name="ename" placeholder="Email Address" autocomplete="off"><br>

          <label>Password</label>
          <input type="password" name="password" placeholder="Password" autocomplete="off"><br>


          <button type="submit" class="login">Login</button>
          <a href="forgot.php" class="ca">Forgot Password?</a>
          <a href="signup.php" class="ca">Create an account</a>
     </form>

    <footer class="footer"> <br>
        <span class="text-muted" style="color: white;" >Copyright &copy; 2021 Sadsan Tech PH Edition</span>
   </footer>
</body>
</html>