<?php

$admin = 1;


if (!empty($_GET['userid']) && !empty($_GET['deleteuser']) && $_GET['deleteuser'] == 1) {
    
    $userId = $_GET['userid'];
    
    $users = new Users();
    $users->deleteUser($userId);
}

if (!empty($_GET['userid']) && !empty($_GET['deactivateuser']) && $_GET['deactivateuser'] == 1) {
    
    $userId = $_GET['userid'];
    
    $users = new Users();
    $users->deactivateUser($userId);
}

if (!empty($_GET['userid']) && !empty($_GET['activateuser']) && $_GET['activateuser'] == 1) {
    
    $userId = $_GET['userid'];
    
    $users = new Users();
    $users->activateUser($userId);
}

?>
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1>Users</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h1 class="panel-title">Users</h1>
                </div>
                <table class="table table-bordered table-hover table-striped text-center table-condensed">
                    <thead>
                        <tr>
                            <th>User Id</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Date Added</th>
                            <th>Date Updated</th>
                            <th>Admin?</th>
                            <th>Active?</th>
                            <?php
                            if ($admin == 1) {
                                echo '
                                <td></td>
                                <td></td>
                                <td></td>';
                            }
                            ?>
                        </tr>
                    </thead>
                    <?php
                    $users = new Users();
                    $results = $users->getAllUsers();
                    foreach ($results as $r) {
                        echo '
                        <tr>
                            <td width="10%">'. $r['user_id'] .'</td>
                            <td width="10%">'. $r['username'] .'</td>
                            <td width="20%">'. $r['email'] .'</td>
                            <td width="10%">'. date('d/m/Y', $r['date_added']) .'</td>
                            <td width="10%">'. (empty($r['date_updated']) ? 'N/A' : date('d/m/Y', $r['date_updated'])) .'</td>
                            <td width="5%">'. $r['admin'] .'</td>
                            <td width="5%">'. $r['active'] .'</td>';
                            if ($admin) {
                                echo '
                                <td width="10%"><a class="btn btn-info form-control" href="./?page=edituser&userid='. $r['user_id'] .'">Edit</a></td>
                                <td width="10%"><a class="btn btn-danger form-control" href="./?page=users&deleteuser=1&userid='. $r['user_id'] .'">Delete</a></td>';
                                if ($r['active'] == 1) {
                                    echo '
                                    <td width="10%"><a class="btn btn-warning form-control" href="./?page=users&deactivateuser=1&userid='. $r['user_id'] .'">Deactivate</a></td>';
                                }
                                else {
                                    echo '
                                    <td width="10%"><a class="btn btn-success form-control" href="./?page=users&activateuser=1&userid='. $r['user_id'] .'">Activate</a></td>';
                                }
                            }
                            echo '
                        </tr>';
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h1 class="panel-title">Admin Users</h1>
                </div>
                <table class="table table-bordered table-hover table-striped text-center table-condensed">
                    <thead>
                        <tr>
                            <th>User Id</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Date Added</th>
                            <th>Date Updated</th>
                            <th>Admin?</th>
                            <th>Active?</th>
                            <?php
                            if ($admin == 1) {
                                echo '
                                <td></td>
                                <td></td>
                                <td></td>';
                            }
                            ?>
                        </tr>
                    </thead>
                    <?php
                    $users = new Users();
                    $results = $users->getAllAdminUsers();
                    foreach ($results as $r) {
                        echo '
                        <tr>
                            <td width="10%">'. $r['user_id'] .'</td>
                            <td width="10%">'. $r['username'] .'</td>
                            <td width="20%">'. $r['email'] .'</td>
                            <td width="10%">'. date('d/m/Y', $r['date_added']) .'</td>
                            <td width="10%">'. (empty($r['date_updated']) ? 'N/A' : date('d/m/Y', $r['date_updated'])) .'</td>
                            <td width="5%">'. $r['admin'] .'</td>
                            <td width="5%">'. $r['active'] .'</td>';
                            if ($admin) {
                                echo '
                                <td width="10%"><a class="btn btn-info form-control" href="./?page=edituser&userid='. $r['user_id'] .'">Edit</a></td>
                                <td width="10%"><a class="btn btn-danger form-control" href="./?page=users&deleteuser=1&userid='. $r['user_id'] .'">Delete</a></td>';
                                if ($r['active'] == 1) {
                                    echo '
                                    <td width="10%"><a class="btn btn-warning form-control" href="./?page=users&deactivateuser=1&userid='. $r['user_id'] .'">Deactivate</a></td>';
                                }
                                else {
                                    echo '
                                    <td width="10%"><a class="btn btn-success form-control" href="./?page=users&activateuser=1&userid='. $r['user_id'] .'">Activate</a></td>';
                                }
                            }
                            echo '
                        </tr>';
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>
