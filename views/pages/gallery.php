<div class="container">
    <div class="row">

        <div class="col-lg-12 ">
            <h2 class="text-center category">Category</h2>
            <div class="col-md-12 text-center">
                <div class="left-sidebar">
                    <div class="row">

                        <div class="col-md-4">
                            <div class="filter-panel">
                                <button type="button" class="btn btn-success" id="dropdownMenu" data-toggle="dropdown"><h5>Sort by Price</br></h5> (high to low)</button>
                                <button type="button" class="btn btn-success" id="dropdownMenu1" data-toggle="dropdown"><h5>Sort by Price</br></h5> (low to high)</button>
                            </div>
                        </div>

                        <div class="col-md-4 pretraga">
                            <div id="izborSredina">					
                                <ul id="categories">
                                </ul>
					        </div>
                        </div>

                        <div class="col-md-4 pretraga">
                            <input type="text" placeholder="Search Products.." class="form-control" id="search1"/> 
                                
                            <h5 class="searchNaziv btn">Search</h5>
                        </div>
                    </div>
                   

                   
                    
                </div>
            </div>
            
        </div>

    </div>
</div>

<div class="slajd jos">
    <div class="container">
        <div class="row showdole">
            <div class=" col-md-12 novo">
                <h2 class="text-center category">All products</h2>
            </div>

         
        </div>

        <div class="row">
         

            <div class="col-md-12 text-center">
                <div class="row" id="products">
                    <?php

                        $products = executeQuery("SELECT * FROM proizvodi");

                        foreach($products as $p) :
                    ?>
                        <div class="col-lg-3 col-md-3 col-xs-12  gallery">
                            <a href="index.php?page=proizvodi&id=<?=$p->id?>"><img src="assets/images/<?=$p->slika ?>" alt="slika"/></a>
                            <h4 class="name"><?=$p->name ?></h4>
                            <h3 class="cena"><?=$p->cena ?>din</h3>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        
    </div>
</div>

<div class="col-lg-9 col-md-9 novo">
                <h2 class="text-center"><b>All Our Shoes</b></h2>
            </div>