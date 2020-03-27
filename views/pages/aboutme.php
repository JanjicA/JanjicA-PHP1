<?php

?>
<div class="container">
    <div class="row">
        <div class="col-lg-6 aboutetekst">
            <h2 class="text-center">About me</h2>
        </div>

        <div class="col-lg-6 aboutetekst">
        <h2 class="text-center">Anketa</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 about">

            <img src="assets/images/aco.jpg" alt="Aco"/>

            <div id="ispis">
                <table class="tableabout">
                    <tbody class="tabletd">
                        <tr>
                        <td>Name</td>
                        <td>Aleksandar</td>
                        </tr>
                        <tr>
                        <td>Last name</td>
                        <td>Janjic</td>
                        </tr>
                        <tr>
                        <td>Date of birthday</td>
                        <td>18.01.1995</td></tf>
                        </tr>
                        <tr>
                        <td>Index number</td>
                        <td>331/16</td></tf>
                        </tr>
                    </tbody>
                </table>
            </div>			
        </div> 
        
        <div class="col-lg-6 anketa">
            <div class="anketapitanje text-center">
                <h3>What was most interesting to you?</h3>
            </div>

            <form action="index.php?page=aboutme" method="POST" class="formanketa">

                <img src="assets/images/html.jpg" alt="Web Dizajn" />
                <img src="assets/images/js.png" alt="Web Programiranje"/>
                <img src="assets/images/php.svg" alt="PHP"/>

                <input type="submit" value="HTML/CSS" name="wd" class="btn btn-danger prikaz"/>
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="submit" value="JavaScript" name="wp" class="btn btn-danger prikaz"/>
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="submit" value="PHP" name="php" class="btn btn-danger prikaz"/>
            </form>
            <?php

                require_once (__DIR__ . "/../../config/connection.php");
                if(isset($_SESSION['user'])){
                    if(isset($_POST['wd'])){

                        $vote = $conn->prepare("UPDATE anketa SET web_dizajn = web_dizajn + 1");
    
                        $run = $vote->execute();
    
                        if($run){
                            echo "<h3 align='center'> Izabrali ste HTML/CSS!</h3>";  
                            echo "<button class='btn dugmence'>View Results</button>";
                        }
                    }
    
                    if(isset($_POST['wp'])){
    
                        $vote = $conn->prepare("UPDATE anketa SET web_programiranje = web_programiranje + 1");
    
                        $run = $vote->execute();
    
                        if($run){
                            echo "<h3 align='center'> Izabrali ste JavaScript!</h3>";
                            echo "<button class='btn dugmence'>View Results</button>";
                        }
                    }
    
                    if(isset($_POST['php'])){
    
                        $vote = $conn->prepare("UPDATE anketa SET php = php + 1");
    
                        $run = $vote->execute();
    
                        if($run){
                            echo "<h3 align='center'> Izabrali ste PHP!</h3>";
                            echo "<button class='btn dugmence'>View Results</button>";
                        }
                    }
    
    
                 //Prikaz rezultata
                 
                    
                 $getVote =  $conn->query("SELECT * FROM anketa")->fetch();
                 //var_dump($getVote);
    
                 $wd = $getVote->web_dizajn;
                 $wp = $getVote->web_programiranje;
                 $php = $getVote->php;
    
                 $zbir = $wd + $wp + $php;
    
                 $per_wd = $wd*100/$zbir;
                 $per_wp = $wp*100/$zbir;
                 $per_php = $php*100/$zbir;
                 // $wd = $rowVote->wd;
                 // $wp = $rowVote->wp;
                 // $php = $rowVote->php;
    
                 // $zbir = $wd + $wp + $php;
    
                 // $per_wd = $wd*100/$zbir;
                 // $per_wp = $wp*100/$zbir;
                 // $per_php = $php*100/$zbir;
    
                 echo "<div id='prikazujem'>
                         <p>
                             <b>HTML/CSS : </b> $wd - ($per_wd%)
                         <p>
                         <p>
                             <b>Javascript : </b> $wp - ($per_wp%)
                         <p>
                         <p>
                             <b>PHP 1 : </b> $php - ($per_php%)
                         <p>
                     </div>
                 "; 
                }
            ?>
            <?php if(!isset($_SESSION['user'])) : ?>
                <h3>If you wanna see resault go and  <a href="index.php?page=register" class="btn btn-danger">register now!</a></h3>
            <?php endif; ?>

        </div>
    </div>
</div>
    

              
         
