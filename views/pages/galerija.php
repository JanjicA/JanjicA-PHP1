<?php

?>

<div class="slajd jos">
    <div class="container">
        <div class="row showdole">
            <div class="col-lg-6 col-md-6 novo">
                <h2>New arrivals on FooseShoes</h2>
            </div>
            <div class="col-lg-6 col-md-6 showall text-right" >
                <div class="okvirshow">
                   <a href="index.php?page=gallery"><input type="button" value="Show all"/></a>
                </div>
                
            </div>
        </div>

		<?php
			$sviproizvpodi2 = $conn->query("SELECT *  FROM proizvodi limit 3")->fetchAll();
		?>
		
        <div class="row">

				<?php foreach($sviproizvpodi2 as $p):?>
                    <div class="col-lg-4 col-md-4 col-xs-12  galerija">
                        <a href="index.php?page=proizvodi&id=<?=$p->id?>"><img src="assets/images/<?=$p->slika ?>" alt="slika"/></a>
                        <h4 class="name"><?=$p->name ?></h4>
                        <h3 class="cena"><?=$p->cena ?>din</h3>
                    </div>
				<?php
				endforeach
				?>
			<hr class="new4">
		</div>
			
        <div class="row">
            <div class="col-lg-3 col-md-3 col-xs-12 prvidiv">
                <h4><b>FREE SHIPING</b></h4>
                <p>Historical lowest price for only $29.99 Buy two 5% off and free shipping!
Buy more and save more! Limited stocks !
Hurry before it returns to its original price！</p>
            </div>

            <div class="col-lg-3 col-md-3 col-xs-12 prvidiv">
                <h4><b>FREE SHIPING</b></h4>
                <p>Historical lowest price for only $29.99 Buy two 5% off and free shipping!
Buy more and save more! Limited stocks !
Hurry before it returns to its original price！</p>
            </div>

            <div class="col-lg-5 col-md-5 col-xs-12 prvidiv blog">
                <h4><b>LOWESR PRICE</b></h4>
                <div class="row blogovi">
                    <div class="col-lg-2 apr">
                        <img src="assets/images/april.png"/>
                    </div>
                    <div class="col-lg-10 nice">
                        <h4><b>Nice and clean</b></h4>
                        <p>nuce dadasda dadsad dada</p>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-lg-2 apr">
                        <img src="assets/images/april.png"/>
                    </div>
                    <div class="col-lg-10 nice">
                        <h4><b>Nice and clean</b></h4>
                        <p>nuce dadasda dadsad dada</p>
                    </div>
                </div>
                
                
            </div>
                
        </div>
    </div>
</div>