<!DOCTYPE html>
<html>
<head>
	<title>SIGN UP</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <form action="signup-check.php" method="post">
          <h2>SIGN UP</h2>
          <?php if (isset($_GET['error'])) { ?>
               <p class="error"><?php echo $_GET['error']; ?></p>
          <?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

          <label>Name</label>
          <?php if (isset($_GET['name'])) { ?>
               <input type="text" 
                      name="name" 
                      placeholder="Name"
                      value="<?php echo $_GET['name']; ?>" autocomplete="off"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="name" 
                      placeholder="Name" autocomplete="off"><br>
          <?php }?>

          <label>Email Address</label>
          <?php if (isset($_GET['ename'])) { ?>
               <input type="email" 
                      name="ename" 
                      placeholder="Email Address"
                      value="<?php echo $_GET['ename']; ?>" autocomplete="off"><br>
          <?php }else{ ?>
               <input type="email" 
                      name="ename" 
                      placeholder="Email Address" autocomplete="off"><br>
          <?php }?>


          <label>Password</label>
          <input type="password" 
                 name="password" 
                 placeholder="Password" autocomplete="off"><br>

          <label>Confirm Password</label>
          <input type="password" 
                 name="confirm_password" 
                 placeholder="Confirm Password" autocomplete="off"><br>

          <button type="submit">Sign Up</button>
          <a href="index.php" class="ca">Already have an account?</a>
     </form>
</body>
</html>