<?php
    session_start();
    require_once(__DIR__.'/../config/connection.php');

    if($_SERVER["REQUEST_METHOD"] != 'POST'){
        http_response_code(404);
        exit;
    }

    $errors = [];

    $name = $_POST['name'];
    $email = $_POST['email'];
    $user = $_POST['username'];
    $password = $_POST['password'];
    $confpassword = $_POST['confpassword'];

    $reName = "/^[A-Z]{1}[a-z]{2,20}$/";
    $reUsername = "/^([A-Za-z]+[0-9]|[0-9]+[A-Za-z])[A-Za-z0-9]*$/";
    $rePassword = "/([\w\W\D\d]){7,40}/";

    if(!isset($_POST['name'])){
        $errors[] = 'Enter your name';
    }
    if(!isset($_POST['username'])){
        $errors[] = 'Enter your username';
    }
    if(!isset($_POST['email'])){
        $errors[] = 'Enter your email';
    }
    if(!isset($_POST['password'])){
        $errors[] = 'Enter your password';
    }
    if(!isset($_POST['confpassword'])){
        $errors[] = 'Enter your confpassword';
    }
       
    if(!preg_match($reName, $name)){
        $errors[] = "Ime nije ok";
    }

    if(!preg_match($reUsername, $user)){
        $errors[] = "Korisnik nije ok";
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors[] = "Email nije ok";
    }

    if(!preg_match($rePassword, $password)){
        $errors[] = "Lozinka nije ok";
    }

    if($password != $confpassword){
        $errors[] = "Lozinke se ne podudaraju";
    }

    //Provera da li vec postoji korisnik sa tim email-om!!!

    // $upit = "SELECT count(*) FROM korisnici WHERE email = :email";

    // $stat = $conn->prepare($upit);
    // $stat -> bindParam(":email", $email);

    // try{
    //     $stat -> execute();
    //     $result = $stat->fetch();

    //     if($result > 0){
    //         $errors[] ="Email vec postoji!";
    //     }
    // }
    // catch(PDOException $e ){
    //     var_dump($e->getMessage());
    // }





    if(count($errors) == 0){
        

        $password = md5($password);
        $datum = date("Y-m-d H:i:s");

        $unosKorisnika = $conn->prepare("INSERT INTO korisnici VALUES (NULL, ?, ?, ?, ?, ?, 2)" );
        
        try{
            $unosKorisnika->execute([$user, $email, $password, $name, $datum]);

            $_SESSION['uspeh'] = ["Uspesno ste se registrovali!"];
            header("Location: ../index.php?page=login");
        }

        //kad bacim na stranicuda se logovao ide ono page=...

        catch(PDOException $e){
            $_SESSION['greske'] = ["Vec postoji korisnik sa tim email!"];

            header("Location: ../index.php?page=register");
        }
    }
    else
    {
        $_SESSION['greske'] = ["Vec postoji korisnik sa tim email!"];
        header("Location: ../index.php?page=register");
    }
?>