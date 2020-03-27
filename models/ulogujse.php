<?php
    session_start();
    if($_SERVER["REQUEST_METHOD"] != 'POST'){
        http_response_code(404);
        exit;
    }
    
    if(isset($_POST['login-taster'])){
        
        // $errors = [];

        $user = $_POST['username'];
        $password = $_POST['password'];

        // $reUsername = "/^([A-Za-z]+[0-9]|[0-9]+[A-Za-z])[A-Za-z0-9]*$/";
        // $rePassword = "/([\w\W\D\d]){7,40}/";


        // if(!isset($_POST['username'])){
        //     $errors[] = 'Enter your username';
        // }

        // if(!isset($_POST['password'])){
        //     $errors[] = 'Enter your password';
        // }

        // if(!preg_match($reUsername, $user)){
        //     $errors[] = "Wrong username";
        // }

        // if(!preg_match($rePassword, $password)){
        //     $errors[] = "Wrong password";
        // }

    
        require_once(__DIR__.'/../config/connection.php');
        $password = md5($password);

        $login = $conn->prepare('SELECT * FROM korisnici WHERE username = ? AND password = ?');
        $provera = $login->execute([$user, $password]);
        
        if($provera){
            if($login->rowCount() == 1){
                $userlogin = $login->fetch();
            
                $_SESSION['user'] = $userlogin;
            
                    if($_SESSION['user']->ulogaId == 2){
                        header("Location: ../index.php");
                    }elseif($_SESSION['user']->ulogaId == 1){
                        header("Location: ../index.php");
                    }
            }
            else
            {
                header("Location: ../index.php");
                $_SESSION['greske'] = "Your username or password is wrong!";
            }
        }
        else
        {
            $_SESSION['greske'] = "Your username or password is wrong!";
            header("Location: ../index.php?page=login='Pogresno'");
        }
    }
    else
    {
        header("Location: ../index.php");
    }
?>
    