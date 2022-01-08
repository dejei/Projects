<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
         <form action="requestReset.php" method="post">
        <h2>Forgot Password</h2>
        <label>Enter your email address</label>
        <input type="email" name="email" placeholder="Enter email address"><br>
        <button type="submit">Send Link</button>
          <a href="index.php" class="ca">Back</a>
     </form>
</body>
</html>