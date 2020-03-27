<div class="slajd jos">
    <div class="container">
        <div class="row showdole">
            <div class="col-lg-12 col-md-12 novo">
                <h2 class="text-center"><b>BEST OFFER</b></h2>
            </div>
        </div>

		<?php
			$sviproizvpodi = $conn->query("SELECT * FROM proizvodi p INNER JOIN vrsta v ON p.idVrsta=v.id_vrsta WHERE v.id_vrsta=2")->fetchAll();
		?>
		
        <div class="row">
            <div class="col-lg-2">
            </div>
            <div class="col-lg-8">
                <?php foreach($sviproizvpodi as $p):?>
                    <div class="col-lg-4 col-md-4 col-xs-12 gallery">
                        <a href="index.php?page=proizvodi&id=<?=$p->id?>"><img src="assets/images/<?=$p->slika ?>" alt="slika"/></a>
                        <h4 class="name"><?=$p->name ?></h4>
                        <h3 class="cena"><?=$p->cena ?>din</h3>
                    </div>
                    
                <?php
                endforeach
                ?>
            </div>
			
        </div>
    </div>
</div>