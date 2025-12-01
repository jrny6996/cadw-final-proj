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
    <h1>Create an Account</h1>
    <form class="card card-body default-form"
    action="/account.php"
    method="POST"
    
    >

        <input type="email" name="email" required  placeholder="john@example.com">
        <input type="password" name="pw" required placeholder="password" >
        <input type="password" name="pw-2" required placeholder="confirm password">
        <p  style="display: block; margin: 12px 0px 0px 0px; padding: 0px;">Already have an account? Login: <a href="/login.php">here</a></p>
        <input type="submit" value="Submit" class="btn-primary" style="width: 100% !important;">

    </form>
</main>

    <script>
        const regForm = document.querySelector("#register-form")
        regForm.addEventListener("submit", (e)=> {
            e.preventDefault()

            const inps = regForm.querySelectorAll('input')
            if (
                
                inps[1].value
                !== inps[2].value
            ){
                alert("passwords do not match")
            }else{
                regForm.submit()
            }
         
            
        })
    </script>
</body>
</html>