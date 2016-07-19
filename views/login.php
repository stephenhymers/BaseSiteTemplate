<?php

if (!empty($_POST['loginUser'])) {
    
    $users = new Users();
    $result = $users->loginUser($_POST['username'], $_POST['password']);
    
}

if (!empty($_SESSION['user_error'])) {
    
    $error = $_SESSION['user_error'];
    
}

?>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form action="" method="post">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="panel-title">Login</h1>
                    </div>
                    <div class="panel-body">
                        <?php 
                            if (!empty($error)) {
                                echo '
                                <div class="alert alert-danger">
                                    '. $error .'
                                </div>';
                            }
                        ?>
                        <div class="row">
                            <div class="col-md-8">
                                Username: 
                                <input class="form-control" type="text" name="username" value="">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-8">
                                Password: 
                                <input class="form-control" type="text" name="password" value="">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <input class="btn btn-success" type="submit" name="loginUser" value="Login">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>