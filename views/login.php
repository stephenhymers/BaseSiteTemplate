<?php

if (!empty($_POST['loginUser'])) {
    
    $users = new Users();
    $result = $users->loginUser($_POST['username'], $_POST['password']);
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
                </form>
            </div>
        </div>
    </div>