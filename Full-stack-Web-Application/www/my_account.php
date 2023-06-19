<?php 

    session_start();
    if(!isset($_SESSION['user'])){
		header("location: login.php");	exit();
	}

    global $avatar;
    global $role;
    global $business_name;
    global $business_address;
    $user = $_SESSION['user'];
    $file = fopen('../data/account.db', 'r');
    while(!feof($file)){
        $line = fgets($file);
        $array = explode(";",$line);
    if(trim($array[0]) == $user){
            $role = trim($array[8]);
            $distribution_hub = trim($array[7]);
            $avatar = trim($array[2]);
            $business_name = trim($array[3]);
            $business_address = trim($array[4]);
            $customer_name = trim($array[5]);
            $customer_address = trim($array[6]);
            break;
        }}
    
    if(isset($_POST['change_avatar'])){
        $new_avatar = $_FILES["new_avatar"]["name"];
        $tmp_img_name=$_FILES["new_avatar"]["tmp_name"];
        $folder='..\img-user\/';
        move_uploaded_file($tmp_img_name,$folder.$new_avatar);
        $url = '../data/account.db';
        $data= file_get_contents($url);
        $strreplace = str_replace($avatar,$new_avatar,$data);
        file_put_contents($url,$strreplace);
        header("Refresh:0; url=my_account.php");
    }


	if(isset($_POST['logout'])){
		unset($_SESSION['user']);
		header("location: login.php");	exit();
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=p, initial-scale=1.0">
    <link rel="stylesheet" href="style-login.css">
    <title>My account</title>
</head>

<body>
<?php
        require_once('header.php')
?>

    <div class="myaccount">
    <div class="myaccount_container">
        <div class="content">
        <form action="" method="post" enctype="multipart/form-data">
             <div class="profile-image">
                <?php echo '<img src="../img-user/'.$avatar.'" alt="logo">'; ?>
            </div>
            <div class="info">
                <p>Username:   <?php echo $user?> </p>
            </div>
            <?php
                if($role == 'vendor'){echo'
                    <div class="info">
                        <p>Business name: '.$business_name.'</p>
                    </div>
                    <div class="info">
                        <p>Business address: '.$business_address.'</p>
                    </div>
                    ';
                }
            ?>
            <?php
             if($role == 'customer'){echo'
                    <div class="info">
                        <p>Name: '.$customer_name.'</p>
                    </div>
                    <div class="info">
                        <p>Address: '.$customer_address.'</p>
                    </div>
                    ';
                }
            ?>
             <?php
             if($role == 'shipper'){echo'
                    <div class="info">
                        <p>Distribution hub: '.$distribution_hub.'</p>
                    </div>
                    ';
                }
            ?>
            <div>
                <div class="form-label">
                    <label for="new_avatar">Change profile image:</label>
                </div>
                <div class="form-field">
                    <input type="file" name="new_avatar" class="form__input">
                </div>
            </div>
            <button class="button" type="submit" name="change_avatar" >Submit</button><br>
            <button class="button_logout" type="submit" name="logout" >Log out</button>
        </form>
        </div>
    </div>
    </div>
<?php
        require_once('footer.php')
?>
</body>
</html>
