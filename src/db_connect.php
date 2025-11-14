<?php

$servername = "db";
$username = "app_user";
$password = "app_pass";
$dbname = "app_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
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