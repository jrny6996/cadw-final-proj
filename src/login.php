<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="js/lib/htmx.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <title>Pear</title>
</head>
<body class="inter" style="background: #f0f0f0f0;">
    <?php
    include "components/header.php";
    ?>
     <main class="container" style=" padding-top: 24px;">
        <div id="content">

    <h1>Login</h1>
    <form class="card card-body default-form"
        hx-patch="/account.php"
        hx-trigger="submit"    
        hx-target="main"
        hx-select="main"
          hx-encoding="json"
    >

        <input type="email" name="email" required>
        <input type="password" name="pw" required >
        <a href="/register.php" style="display: block; margin-top: 12px;">Don't have an account yet?</a>
        <input type="submit" value="Submit" class="btn-primary" >

    </form>
        </div>
</main>
  
  
</body>
</html>