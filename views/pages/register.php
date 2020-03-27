<div class="container signup">
    <div class="row">
        <div class="col-md-4 offset-md-4">
        </div>

        <div class="col-md-4 offset-md-4 form-div">
            <form action="models/registracija.php" method="POST">
                <h3 class="text-center">Registar</h3>

                <div class="alert alert-danger">
                    <?php
                        if(isset($_SESSION['greske'])){

                            foreach($_SESSION['greske'] as $errors){

                            echo $errors ."<br/>";
                            }

                            // cim se ispise = brisemo
                            unset($_SESSION['greske']);
                        }
                    ?>
                </div>

                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" class="form-control form-control-lg"/> 
                    <p><i>First letter must be uppercase</i></p> 
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" name="email" id="email" class="form-control form-control-lg"/>
                    <p><i>email@example.com</i></p> 
                </div>

                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username" class="form-control form-control-lg"/>
                    <p><i>First letter must be uppercase and you must have min one number</i></p> 
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control form-control-lg"/>  
                    <p><i>Minimum 7 characters</i></p> 
                </div>

                <div class="form-group">
                    <label for="confirmpassword">Confirm Password</label>
                    <input type="password" name="confpassword" id="confpassword" class="form-control form-control-lg"/>  
                </div>

                <div class="form-group">
                    <button type="submit" name="taster" id="taster" class="btn btn-primary btn-block btn-lg"> Sign Up</button>
                </div>

                <p class="text-center">Already a member? <a class="prebaci" href="index.php?page=login">Sign In</a></p>

            </form>
        </div>
    </div>
</div>