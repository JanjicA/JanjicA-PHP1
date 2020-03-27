<div class="container signup">
    <div class="row">
        <div class="col-md-4 offset-md-4">
        </div>

        <div class="col-md-4 offset-md-4 form-div">
            <div class="porukanetacno text-center">
          
            </div>
            <div class="porukatacno text-center">
           
            </div>
            <form action="models/ulogujse.php" method="post">
                <h3 class="text-center">Login</h3>

                <!-- <div class="alert alert-danger"> 
                    <li>Bad Username</li>
                </div>        OVAJ DEO SE RADI U PHPU!!!!!  -->

                <div class="form-group">
                    <label for="username">Username: </label>
                    <input type="text" name="username" class="form-control form-control-lg"/>  
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" class="form-control form-control-lg"/>  
                </div>

                <div class="form-group">
                    <button type="submit" name="login-taster" class="btn btn-primary btn-block btn-lg"> Login</button>
                </div>

                <p class="text-center">Not yet a member? <a class="prebaci" href="index.php?page=register">Sign Up</a></p>

            </form>
        </div>
    </div>
</div>