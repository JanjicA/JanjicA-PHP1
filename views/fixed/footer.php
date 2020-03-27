        <?php
            $svifooteri = $conn->query("SELECT * FROM footer")->fetchAll();
        ?>

        <footer>
            <div class="container dnosvega">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-xs-12 footer1">
                        <ul class="listakraj">
                            <?php foreach($svifooteri as $f):?>
                            <li><a href="<?=$f->link ?>"><?=$f->name ?>&nbsp&nbsp&nbsp</a></li>
                            <!--<li><a href="">Products</a></li>
                            <li><a href="">About</a></li>
                            <li><a href="">Pages</a></li>
                            <li><a href="">Blog</a></li>
                            <li><a href="">Contact</a></li>-->
                            <?php endforeach ?>
                        </ul>
                    </div>

                    <div class="col-lg-6 col-md-6 col-xs-12 dnomedia">
                        <a class="mr-2" href="" target="_blank"><i class="fa fa-facebook-f"></i></a>

                        <a class="mr-2" href="" target="_blank"><i class="fa fa-linkedin"></i></a>

                        <a href="" target="_blank"><i class="fa fa-github"></i></a>  
                    </div>
                </div>
            </div>
        </footer>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/index.js"></script>
    <script type="text/javascript" src="assets/js/register.js"></script>
    <script type="text/javascript" src="assets/js/korpa.js"></script>
    <script type="text/javascript" src="assets/js/crud.js"></script>
    <script type="text/javascript" src="assets/js/filtriranje.js"></script>
    <script type="text/javascript" src="assets/js/jquery.scrollUp.min.js"></script>

</html>