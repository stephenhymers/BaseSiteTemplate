<?php

if (!empty($_POST['addUser'])) {
    
    $insert = array(
        "username" => $_POST['username'],
        "password" => $_POST['password'],
        "email" => $_POST['email'],
        "date_added" => time(),
        "admin" => $_POST['admin'],
    );
    
    $users = new Users();
    $users->addUser($insert);
    
}

?>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form action="" method="post">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="panel-title">Add User</h1>
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
                           <div class="col-md-8">
                                Email: 
                                <input class="form-control" type="email" name="email" value="">
                           </div>
                       </div>
                       <?php
                        if (!empty($admin)) {
                            echo '
                           <br>
                           <div class="row">
                               <div class="col-md-8">
                                    Admin: 
                                    <input type="checkbox" name="admin" value="1">
                                    <input type="hidden" name="admin" value="0" />
                               </div>
                           </div>';
                        }
                        ?>
                       <br>
                       <div class="row">
                           <div class="col-md-12 text-center">
                                <input class="btn btn-success" type="submit" name="addUser" value="Add User">
                           </div>
                       </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
