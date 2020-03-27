<?php
    require_once(__DIR__.'/../config/connection.php');

    if($_SERVER["REQUEST_METHOD"] != 'POST'){
        http_response_code(404);
        exit;
    }
    
    $errors1 = [];

  
    if(isset($_POST['dugme'])){
        
        $firstname = $_POST['first-name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $msg = $_POST['message'];

        if(empty($firstname) || empty($email)  || empty($subject) || empty($msg)){

            $_SESSION['greska'] = "ne radi!";
            header("Location: ../index.php?page=contact");

        }
    


        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors1[] = "Email nije ok";
        }

        if(count($errors1) == 0){
            

            $emailporuka= $conn->prepare("INSERT INTO emailcontact VALUES (NULL, ?, ?, ?)" );
            
            try{
                $emailporuka->execute([$firstname, $email, $subject]);
                    $to = "acojanjic995@gmail.com";
                    $subject = "From: ". $email;
                    $msg = "You have an E-mail from :".$firstname."\n\n".$msg;

                    if(mail($to, $subject, $msg, $email)){
                        header("Location: ../views/pages/contact.php?success");
                    }
            }

            //kad bacim na stranicuda se logovao ide ono page=...

            catch(PDOException $e){
                $_SESSION['greske1'] = ["Vec postoji korisnik sa tim email!"];

                header("Location: ../index.php?page=contact");
            }
        }
        else
        {
            $_SESSION['greske'] = ["Vec postoji korisnik sa tim email!"];
            header("Location: ../index.php?page=contact");
        }
    }
    else
    {
        $_SESSION['greske'] = ["Vec postoji korisnik sa tim email!"];
        header("Location: ../index.php?page=contact");
    }
?>