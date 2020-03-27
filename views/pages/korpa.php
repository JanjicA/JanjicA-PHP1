<section id="cart_items">
    <div class="container">
        <?php
            require_once (__DIR__ . "/../../config/connection.php");
            $id = $_SESSION['user']->id_korisnik;

            $upit1 = $conn->prepare("SELECT * FROM korisnici k INNER JOIN korpa ko ON k.id_korisnik = ko.idKorisnik INNER JOIN proizvodi p ON ko.idProizvod = p.id WHERE idKorisnik = ?");
            $upit1->execute([$id]);
            $rezultat = $upit1->fetchAll();

        ?>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Image</td>
                        <td class="description">Name</td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td>Remove</td>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach($rezultat as $r):
                ?>
                    <tr>
                        <td class="cart_product">
                            <img src="assets/images/<?= $r->slika ?>" width="160" height="110"/>
                        </td>
                        <td class="cart_description">
                            <h4><?= $r->name ?></h4>
                        </td>
                        <td class="cart_price">
                            <p><?= $r->cena ?>din</p>
                        </td>
                        <td class="cart_quantity">
                            <?= $r->kolicina ?>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">
                                <?=
                                    $r->kolicina * $r->cena
                                ?>din
                            </p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="index.php?page=brisanjeizkorpe&id=<?= $r->idKorpa ?>"><i class="fa fa-times text-center"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="row">
            <div class="col-lg-12 text-center nazad">
      
                <a href="index.php?page=gallery" class="btn btn-nazad text-center">Look for more products</a>
            </div>
        </div>

    </div>
</section> <!--/#cart_items-->

