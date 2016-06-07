<?php

echo '<pre>';
print_r($_POST);
echo '</pre>';

$userId = $_GET['userid'];

$users = new Users();
$results = $users->getUser($userId);

$result = array_shift($results);

?>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form action="" method="post">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="panel-title">Edit User <?=  $result['user_id'] ?></h1>
                    </div>
                    <div class="panel-body">
                       <div class="row">
                           <div class="col-md-8">
                                Username: 
                                <input class="form-control" type="text" name="username" value="<?=  $result['username'] ?>">
                           </div>
                       </div>
                       <br>
                       <div class="row">
                           <div class="col-md-8">
                                Password: 
                                <input class="form-control" type="text" name="password" value="<?=  $result['password'] ?>">
                           </div>
                       </div>
                       <br>
                       <div class="row">
                           <div class="col-md-8">
                                Email: 
                                <input class="form-control" type="email" name="email" value="<?=  $result['email'] ?>">
                           </div>
                       </div>
                       <br>
                       <div class="row">
                           <div class="col-md-8">
                                Admin: 
                                <?php
                                if ($result['admin'] == 1) {
                                    echo '<input type="checkbox" name="admin" value="1" checked />';
                                }
                                else {
                                    echo '<input type="checkbox" name="admin" value="0" />';
                                }
                                ?>
                           </div>
                       </div>
                       <br>
                       <div class="row">
                           <div class="col-md-8">
                                Active:
                                <?php
                                if ($result['active'] == 1) {
                                  echo '<input type="checkbox" name="active" value="1" checked />';
                                }
                                else {
                                    echo '<input type="checkbox" name="active" value="0" />';
                                }
                                ?>
                           </div>
                       </div>
                       <br>
                       <div class="row">
                           <div class="col-md-12 text-center">
                                <input class="btn btn-info" type="submit" name="editUser" value="Edit User">
                           </div>
                       </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
