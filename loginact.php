<?php

    session_start();
    if (empty($_SESSION['username'])) {
        if(!empty($_POST['username']) && !empty($_POST['password'])){
            $data['username'] = $_POST['username'];
            $data['password'] = $_POST['password'];

            $myfile = fopen("data.json", "r") or die("Unable to open file!");
            $credential = json_decode(fread($myfile,filesize("data.json")));
            if($data['username'] == $credential->username && ($data['password']) == $credential->password){
                $_SESSION["username"] = $data['username'];
                header('Location:pageafterlogin.php');
            }else{
                echo"Login Gagal <br><br><a href='logout.php'>Kembali</a> ";
            }
            fclose($myfile);
        }else{
            echo "username atau masih password kosong";
        }
    }else{
        header('location: welcome.php');
    }
?>

