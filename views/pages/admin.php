<?php 

if(isset($_SESSION['user'])){
    if($_SESSION['user']->ulogaId != 1){
        header("Location: index.php");
    }
}else{
    header("Location: index.php");
}

require_once (__DIR__ . "/../../config/connection.php");
?>

<div class="container-fluid fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12 admin text-center">
            <img src="assets/images/admin.png" alt="admin" />
            <h3>Welcome to Admin page</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 crudmargin">
            <h2>CRUD for Products</h2>
        </div>
        
        <div class="col-md-4 mrdaj">
        <div>
            <?php
                  // Ispis uspeha!
                  if(isset($_SESSION['popuni'])){
                    echo "Niste popunili sve!";
                  }
                  unset($_SESSION['popuni']);
            ?>
        </div>
            <form action="models/proizvodi/dodaj-proizvod.php" method="POST" enctype='multipart/form-data' class="crud">
                <div class="form-group">
                    <label for="first-name">Name of product</label>
                    <input type="text" name="name" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="first-name">Descripsion of product</label>
                    <input type="text" name="opis" class="form-control" >
                </div>
                <div>
                    <label for="first-name">Image of product</label>
                    <input type="file" name="slika">
                </div>
                <div class="form-group">
                    <label for="first-name">Price of product</label>
                    <input type="text" name="cena" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="first-name">Category</label>
                    <select name="vrsta" class="form-control">
                        <option value="0">Choose category</option>
                        <?php  
                            $vrsta = $conn->query("SELECT * FROM vrsta")->fetchAll();
                            foreach($vrsta as $v):
                        ?>
                        <option value="<?= $v->id_vrsta ?>"><?= $v->naziv ?></option>
                            <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="first-name">Gender</label>
                    <select name="pol" class="form-control">
                        <option value="0">Choose gender</option>
                        <?php  
                            $pol = $conn->query("SELECT * FROM pol")->fetchAll();
                            foreach($pol as $p):
                        ?>
                        <option value="<?= $p->id_pol ?>"><?= $p->naziv ?></option>
                            <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" name="save" class="btn">Dodaj proizvod</button>
            </form>
        </div>

        <div class="col-md-8 admintabela mrdaj1">
                <table class="tabelaadmin">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Opis</th>
                            <th>Slika</th>
                            <th>Cena</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="ispis">
                    <?php
                    $sviproizvpodi12 = $conn->query("SELECT *  FROM proizvodi")->fetchAll();
                    foreach($sviproizvpodi12 as $n):?>
                        <tr>
                            <td><?=$n->name?></td>
                            <td><?=$n->opis?></td> 
                            <td><img src="assets/images/<?= $n->slika ?>" width="80" height="60"/></td> 
                            <td><?=$n->cena?>din</td>
                            <td>
                                <a href="#" class="btn btn-info promeni-proizvod" data-id="<?= $n->id ?>" data-toggle="modal" data-target="#myModal">&nbspEdit&nbsp</a>
                                <a href="#" class="btn btn-danger izbrisi-proizvod" data-id="<?= $n->id ?>">Delete</a>
                            </td>
                        </tr>
                    <?php
                        endforeach
                    ?>
                    </tbody>
                </table>
            </div>
    </div>




    <!-- USER -->

    <div class="row">
        <div class="col-md-12 crudmargin">
            <h2>CRUD for Users</h2>
        </div>

        <div class="col-md-8 mrdaj">
            <table class="tabelaadmin">
                    <thead>
                        <tr>
                            <th>Usernameame</th>
                            <th>Email</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="ispisKorisnika">
                    <?php
                    $svikorisnici = $conn->query("SELECT * FROM korisnici")->fetchAll();
                    foreach($svikorisnici as $s):?>
                        <tr>
                            <td><?=$s->username?></td>
                            <td><?=$s->email?></td> 
                            <td><?=$s->name?></td> 
                            <td>
                                <a href="#" class="btn btn-info promeni-korisnika" data-id="<?= $s->id_korisnik ?>" >Edit</a>
                                <a href="#" class="btn btn-danger izbrisi-korisnika" data-id="<?= $s->id_korisnik ?>">Delete</a>
                            </td>
                        </tr>
                    <?php
                        endforeach
                    ?>
                    </tbody>
            </table>
        </div>

        <div class="col-md-4 admintabela mrdaj1">
            <div class="card-header card-header-warning">
                <h4 class="card-title" id="form-heading">Add user</h4>
            </div>
            <form class="crud">
                <input type="hidden" id="hdnId" name="id"/>
                <div class="form-group">
                    <label for="first-name">Username of user</label>
                    <input type="text" name="username" id="username" class="form-control">
                </div>
                <div class="form-group">
                    <label for="first-name">Email of user</label>
                    <input type="text" name="email" id="email" class="form-control">
                </div>
                <div>
                    <label for="first-name">Name of user</label>
                    <input type="text" name="ime" id="name" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="first-name">Password of user</label>
                    <input type="text" name="password" id="password" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="first-name">Role of user</label>
                    <select name="uloge" id="uloge" class="form-control">
                        <option value="0">Choose role</option>
                        <?php  
                            $uloge = $conn->query("SELECT * FROM uloge")->fetchAll();
                            foreach($uloge as $u):
                        ?>
                        <option value="<?= $u->id ?>"><?= $u->name ?></option>
                            <?php endforeach; ?>
                    </select>
                </div>
                <button type="button" id="sacuvaj" name="sacuvaj" class="btn">Save</button>
            </form>
        </div>
    </div>
</div>











                    <!-- Modal products -->
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Izmeni proizvod</h4>
                                </div>
                                <div class="modal-body">

                                <form action="models/proizvodi/izmeni-proizvod.php" method="POST" enctype='multipart/form-data' class="crud">
                                <input type="hidden" name="hdnChange" id="hdnIdProdChange"/>    
                                    <div class="form-group">
                                        <label for="first-name">Name of product</label>
                                        <input type="text" id="nameProdChange" name="name1" class="form-control" placeholder="Ime cipele">
                                    </div>
                                    <div class="form-group">
                                        <label for="first-name">Descripsion of product</label>
                                        <input type="text" id="opis" name="opis1" class="form-control" placeholder="Opis cipele">
                                    </div>
                                    <div>
                                        <label for="first-name">Image of product</label>
                                        <input type="file"  name="slika1">
                                    </div>
                                    <div class="form-group">
                                        <label for="first-name">Price of product</label>
                                        <input type="text" id="cena" name="cena1" class="form-control" placeholder="Cena cipele">
                                    </div>
                                    <div class="form-group">
                                        <label for="first-name">Vrsta</label>
                                        <select name="vrsta1" id="vrsta">
                                            <option value="0">Izaberite vrstu</option>
                                            <?php  
                                                $vrsta = $conn->query("SELECT * FROM vrsta")->fetchAll();
                                                foreach($vrsta as $v):
                                            ?>
                                            <option value="<?= $v->id_vrsta ?>"><?= $v->naziv ?></option>
                                                <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="first-name">Pol</label>
                                        <select name="pol1" id="pol">
                                            <option value="0">Izaberite pol</option>
                                            <?php  
                                                $pol = $conn->query("SELECT * FROM pol")->fetchAll();
                                                foreach($pol as $p):
                                            ?>
                                            <option value="<?= $p->id_pol ?>"><?= $p->naziv ?></option>
                                                <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <button type="submit" name="change" class="btn">Izmeni proizvod</button>
                                </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    


                   