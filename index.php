<?php
   session_start();
   $title = "Fooseshoes";
   $keywords = "fooseshoes";
   $description = "Obuca";

//include('class/products.php');

require_once('config/connection.php');

require_once('views/fixed/head.php');
require_once('views/fixed/header.php');

if(!isset($_GET['page'])){

    require_once('views/pages/slajder.php');
    require_once('views/pages/tabbar.php');
    require_once('views/pages/galerija.php');
    
}else{
    switch($_GET['page']){
        case 'login':
                // $title = "Login";
                // $keywords = "Logovanje";
                // $description = "Logovanje";    
            require_once('views/pages/login.php');
            break;

        case 'register':
            require_once('views/pages/register.php');
            break;
        
        case 'proizvodi':
            require_once('views/pages/proizvodi.php');
            break;

        case 'contact':
            require_once('views/pages/contact.php');
            break;

        case 'aboutme':
            require_once('views/pages/aboutme.php');
            break;

        case 'bestoffer':
            require_once('views/pages/bestoffer.php');
            break;

        case 'gallery':
            require_once('views/pages/gallery.php');
            break;

        case 'onsale':
            require_once('views/pages/onsale.php');
            break;

        case 'uspeh':
            require_once('views/pages/uspeh.php');
            break;
        case 'musthave':
            require_once('views/pages/musthave.php');
            break;
        case 'admin':
            require_once('views/pages/admin.php');
            break;
        case 'korpa':
            require_once('views/pages/korpa.php');
            break;
        case 'brisanjeizkorpe':
            require_once('models/brisanjeizkorpe.php');
            break;
        case 'votes':
            require_once('models/votes.php');
            break;
        case 'crud':
            require_once('models/crud.php');
            break;
    }
}

require_once('views/fixed/dno.php');
require_once('views/fixed/footer.php');





   
?>