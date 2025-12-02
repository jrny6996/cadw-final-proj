<?php


class AccountHandler
{
    public $method;
    public $body;

    public function __construct($method, $body)
    {
        $this->method = $method;
        $this->body = $body;
    }


    public function handle($conn)
    {
        return;
    }
    public function debug()
    {
        // var_dump($this->method);
        // var_dump($this->body);
    }
}

class AccountPost extends AccountHandler
{
    public function insert_user($email, $hashed_pw, $conn)
    {

        $curr = $conn->prepare("SELECT * FROM users WHERE email =?");
        $curr->bind_param("s", $email);
        $curr->execute();

        $result = $curr->get_result();
        if ($result->num_rows != 0) {
            $row = $result->fetch_assoc();
            $db_pw = $row["hashed_password"];
            if (!empty($db_pw)) {
                // return false;
                $markup = '<div class="container"><h1  style="margin: 10px 0px; ">Account already exists</h1></div>';
                return ['code' => 400, 'display' => $hashed_pw];
            }
            return ['code' => 400, 'display' => '<div class="container"><h1 class="container" style="margin: 100px 0px 0px 0px; ">Account already exists</h1></div>'];
        }

        $curr = $conn->prepare("INSERT INTO users(email, hashed_password) VALUES(?, ?)");
        $curr->bind_param("ss", $email, $hashed_pw);
        $curr->execute();
        $result = $curr->get_result();
        // var_dump($result);
        return ['code' => 200];
    }

    public function handle($conn)
    {
        $email = htmlentities($this->body['email']);
        $hashed_pw = password_hash($this->body['pw'], PASSWORD_DEFAULT);
        $db_status = $this->insert_user($email, $hashed_pw, $conn);
        if ($db_status['code'] == 200) {
            echo ("Created user");
        } else {
            echo ($db_status['display']);
        }
    }
}

class AccountPatch extends AccountHandler
{

    public function check_user($conn)
    {
        $email = htmlentities($this->body['email']);
        $curr = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $curr->bind_param("s", $email);
        $curr->execute();
        $result = $curr->get_result();
        if ($result->num_rows == 1) {

            $row =  $result->fetch_assoc();
            $db_pw = $row['hashed_password'];

            if (password_verify($this->body['password'], $db_pw)) {
                $_SESSION['user_id'] =  $row['id'];
                $_SESSION['logged_in'] = true;
                $_SESSION['user_email'] = $row['email'];

                return true;
            }
            // session_unset();   
            // session_destroy();
            // header('Location: /login.php?error=invalidPassword');
            // exit();  
            return false;
        }

        return false;
    }

    public function handle($conn)
    {
        if ($this->check_user($conn)) {

            echo "Welcome, " . $_SESSION['user_email'];
        }
    }
}
