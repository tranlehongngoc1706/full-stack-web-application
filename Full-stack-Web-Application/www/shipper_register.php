<?php
    require_once('same_register_2.php');
?>
<?php
    $distribution_hubphp = "";
    $success_message = "";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($finduser == false && $usernamephpErr == "" && $passwordphpErr =="" && $c_passwordphpErr == "") {
                // Display user's input
                echo "<h1> Registration Information </h1>";
                echo "Username:".$usernamephp;
                echo "<br>";
                echo "Password:".$passwordphp;
                echo "<br>";
                echo "Profile picture name:".$_FILES["image"]["name"];
                echo "<br>";
                $distribution_hubphp = $_POST["distribution_hub"];
                echo "Distribution hub:".$distribution_hubphp;

                // Image upload
                $target_dir = "../img-user/ ";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);

                move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

                // File handling
                $file = fopen("../data/account.db", "a") or die("Unable to open file!");
                fputs($file,($usernamephp.";".$passwordphphash.";".$_FILES["image"]["name"].";"."no".";"."no".";"."no".";"."no".";".$distribution_hubphp.";"."shipper"."\r\n"));
                fclose($file);
                $success_message ='Registered successfully!';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shipper Register</title>
    <link rel="stylesheet" href="style-register.css">
    <script defer src="register.js"> </script>
</head>
<body>
<div class= "form-container">
    <form action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" id="form" enctype= "multipart/form-data" novalidate>
        <?php
        require_once('same_register.php');
        ?>
        <div class="form_row">
            <div class="form_label">
                <label for="distribution_hub">Distribution hub</label>
            </div>
            <div class="form_field">
                <select name= "distribution_hub">
                    <option value="District1"> District 1 </option>
                    <option value="District2"> District 2 </option>
                    <option value="District3"> District 3 </option>
                </select>
            </div>
        </div>
           
        <div class="form_row">
            <input type="submit" name= "act" class="btn" value= "Register now"> <br>
            <span class="message-success"><?php echo $success_message ?></span> <br>
        </div>
        <input type="hidden" name="shipper">
        <p> Already have an account? <a href= "login.php"> Login now </a> </p>
    </form>
</div>
</body>
</html>
