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
                header('Location:loginact.php');
            }else{
                echo"Login Gagal <br><br><a href='logout.php'>Kembali</a> ";
            }
            fclose($myfile);
        }else{
            echo "Email dan password Kosong";
        }
    }else{
        echo "Selamat Sudah Berhasil Login, ".$_SESSION["username"].
        "<br><br><a href='logout.php'>Log Out</a>" ;
    }
?>

