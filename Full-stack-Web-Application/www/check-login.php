<?php  session_start(); 

/*if(isset($_SESSION['use']))   // Checking whether the session is already there or not if 
                              // true then header redirect it to the home page directly 
 {
    header("Location:home.php"); 
 }*/
 
if(isset($_POST['login']))   // it checks whether the user clicked login button or not 
{
    $user = $_POST['user'];
    $pass =  $_POST['pass'];
 
    if(isset($_POST["user"]) && isset($_POST["pass"])){
        $file = fopen('../data/account.db', 'r');
        $good=false;
        while(!feof($file)){
            $line = fgets($file);
            $array = explode(";",$line);
        if(trim($array[0]) == $_POST['user'] && password_verify($_POST['pass'], trim($array[1]))){
                $role = trim($array[8]);
                $hub = trim($array[7]);
                $name = trim($array[5]);
                $adress = trim($array[6]);
                $good=true;
                break;
            }
        }
 
    if($good){
    $_SESSION['user'] = $user;
    $_SESSION['role'] = $role;
    $_SESSION['name'] = $name;
    $_SESSION['adress'] = $adress;
    $_SESSION['hub'] = $hub;
    header("Location: my_account.php");
    }else{
        echo "invalid UserName or Password";
    }
    fclose($file);
    }
}
?>