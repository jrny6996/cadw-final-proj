<?php


// $server_name = "localhost";
// $username = "jdc356";
// $password = "Aifee7hi";
// $db_name = "jdc356";

// // Create connection
// $conn = new mysqli($server_name, $username, $password, $db_name);

$servername = "db";
$username = "app_user";
$password = "app_pass";
$dbname = "app_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);



?>


<?php
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
?>
    <!-- <div class="connection-status">
        Connected successfully
    </div> -->
    <div>

    </div>
<?php

}
?>