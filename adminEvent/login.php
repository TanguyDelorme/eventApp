<?php
include '../include/controller.php';
if(isset($_SESSION['user_name'])){
    header("location:adminEvent.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>CRUD Login</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/login.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="pr-wrap">
                        <div class="pass-reset">
                            <label>
                                Enter the email you signed up with</label>
                            <input type="email" placeholder="Email" />
                            <input type="submit" value="Submit" class="pass-reset-submit btn btn-success btn-sm" />
                        </div>
                    </div>
                    <div class="wrap">
                        <p class="form-title">Sign In</p>
                        <form action="" class="login" method="post">
                            <input type="text" placeholder="Username" value="<?php echo $username; ?>" autofocus autocomplete="off" required name="username"/><?php echo $usernameErr; ?>
                            <input type="password" placeholder="Password" required name="txtpassword" /><?php echo $passwordErr; ?>
                            <input type="submit" name="login" value="Sign In" class="btn btn-success btn-sm" />                            
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <script type="text/javascript">
            $(document).ready(function () {
                $('.forgot-pass').click(function(event) {
                    $(".pr-wrap").toggleClass("show-pass-reset");
                });

                $('.pass-reset-submit').click(function(event) {
                    $(".pr-wrap").removeClass("show-pass-reset");
                });
            });
        </script>
    </body>
</html>
