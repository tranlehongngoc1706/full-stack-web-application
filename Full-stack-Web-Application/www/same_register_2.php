<?php
    $usernamephpErr = $passwordphpErr = $c_passwordphpErr = "";
    $usernamephp = $passwordphp = $passwordphphash = $c_passwordphp = $target_file = "";
    GLOBAL $usernamephpErr;
    GLOBAL $passwordErr;
    GLOBAL $c_passwordphpErr;

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check global uniqueness
        $myfile = fopen("../data/account.db","r");
        while (!feof($myfile))
        {
            $line = fgets($myfile);
            $array = explode (";", $line);
            $finduser = false;
            if (trim($array[0]) == $_POST["username"]) {
                GLOBAL $finduser;
                $finduser = true;
                break;
            }
        }
        fclose($myfile);

        if ($finduser == true) {
            echo "Already existed username. Please register again";
            echo "<br>";
        }  

        // Form validation
        function test_input($data) {
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        if (empty($_POST["username"])) {
            $usernamephpErr = "Username must not be empty";
        }
        else{
            $usernamephp = test_input($_POST['username']);
            if (!preg_match("/^[a-zA-Z0-9]+$/", $usernamephp)) {
                $usernamephpErr = "Username must contain only letters and digits";
            }
            elseif (strlen($_POST["username"]) < 8) {
                $usernamephpErr = "Username must contain at least 8 characters";
            }
            elseif (strlen($_POST["username"]) > 15) {
                $usernamephpErr = "Username must contain at most 15 characters";
            }
        }

        if (empty($_POST["password"])) {
            $passwordphpErr = "Password must not be empty";
        }
        else{
            $passwordphp = test_input($_POST["password"]);
            if (!preg_match("/(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!|@|#|$|%|^|&|*])/", $passwordphp)) {
                $passwordErr = "Password must contain  must contain at least one upper case letter, at least one lower case letter, at least one digit, at least one special letter in the set !@#$%^&* and NO other kind of characters";
            }
            elseif (strlen($_POST["password"]) < 8) {
                $passwordErr = "Password must contain at least 8 characters";
            }
            elseif (strlen($_POST["password"]) > 20) {
                $passwordErr = "Password must contain at most 20 characters";
            }
            else {
                $passwordphphash = password_hash($passwordphp, PASSWORD_DEFAULT);
            }
        }

        if (empty($_POST["c_password"])) {
            $c_passwordphpErr = "Confirm password must not be empty";
        }
        else{
            $c_passwordphp = test_input($_POST["c_password"]);
            if ($passwordphpErr !== "") {
                $c_passwordphpErr = "Password must be valid";
            }
            elseif (($_POST["password"] !== $_POST["c_password"])){
                $c_passwordphpErr = "Passwords must match";
            }
        }
        }
?>
