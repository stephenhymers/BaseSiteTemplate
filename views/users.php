<?php

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
    <br>
    <div class="row">
        <div class="col-lg-6 text-right">
            <button class="btn btn-info" onclick="var text = $(this).text(); $(this).text(text == 'Show Admin Users' ? 'Hide Admin Users' : 'Show Admin Users'); $('#adminUsers').toggleClass('hide');">Show Admin Users</button>
        </div>
        <div class="col-lg-6 text-left">
            <button class="btn btn-info" onclick="var text = $(this).text(); $(this).text(text == 'Show Users' ? 'Hide Users' : 'Show Users'); $('#users').toggleClass('hide');">Show Users</button>
        </div>
    </div>
    <br>
    <div class="row hide" id="users">
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
                            <td>'. $r['user_id'] .'</td>
                            <td>'. $r['username'] .'</td>
                            <td>'. $r['email'] .'</td>
                            <td>'. date('d/m/Y | H:i', $r['date_added']) .'</td>
                            <td>'. (empty($r['date_updated']) ? 'N/A' : date('d/m/Y | H:i', $r['date_updated'])) .'</td>
                            <td>'. $r['admin'] .'</td>
                            <td>'. $r['active'] .'</td>';
                            if ($admin) {
                                echo '
                                <td width="10%"><a class="btn btn-info form-control" href="./?page=edituser&userid='. $r['user_id'] .'">Edit</a></td>
                                <td width="10%"><a class="btn btn-danger form-control" onclick="return confirm(\'Are you Sure?\');" href="./?page=users&deleteuser=1&userid='. $r['user_id'] .'">Delete</a></td>';
                                if ($r['active'] == 1) {
                                    echo '
                                    <td><a class="btn btn-warning form-control" href="./?page=users&deactivateuser=1&userid='. $r['user_id'] .'">Deactivate</a></td>';
                                }
                                else {
                                    echo '
                                    <td><a class="btn btn-success form-control" href="./?page=users&activateuser=1&userid='. $r['user_id'] .'">Activate</a></td>';
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
    <div class="row hide" id="adminUsers">
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
                            <td>'. $r['user_id'] .'</td>
                            <td>'. $r['username'] .'</td>
                            <td>'. $r['email'] .'</td>
                            <td>'. date('d/m/Y | H:i', $r['date_added']) .'</td>
                            <td>'. (empty($r['date_updated']) ? 'N/A' : date('d/m/Y | H:i', $r['date_updated'])) .'</td>
                            <td>'. $r['admin'] .'</td>
                            <td>'. $r['active'] .'</td>';
                            if ($admin) {
                                echo '
                                <td><a class="btn btn-info form-control" href="./?page=edituser&userid='. $r['user_id'] .'">Edit</a></td>
                                <td><a class="btn btn-danger form-control" onclick="return confirm(\'Are you Sure?\');" href="./?page=users&deleteuser=1&userid='. $r['user_id'] .'">Delete</a></td>';
                                if ($r['active'] == 1) {
                                    echo '
                                    <td><a class="btn btn-warning form-control" href="./?page=users&deactivateuser=1&userid='. $r['user_id'] .'">Deactivate</a></td>';
                                }
                                else {
                                    echo '
                                    <td><a class="btn btn-success form-control" href="./?page=users&activateuser=1&userid='. $r['user_id'] .'">Activate</a></td>';
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
