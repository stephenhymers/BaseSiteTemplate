<?php

$ticketId = $_GET['ticketid'];

$tickets = new Tickets();
$results = $tickets->getTicket($ticketId);

$result = array_shift($results);

?>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form action="" method="post">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="panel-title">Edit User <?=  $result['ticket_id'] ?></h1>
                    </div>
                    <div class="panel-body">
                       <div class="row">
                           <div class="col-md-8">
                                Title: 
                                <input class="form-control" type="text" name="title" value="<?=  $result['title'] ?>">
                           </div>
                       </div>
                       <br>
                       <div class="row">
                           <div class="col-md-8">
                                Due Date: 
                                <input class="form-control" type="text" name="due_date" value="<?=  date('d/m/Y', $result['due_date']) ?>">
                           </div>
                       </div>
                       <br>
                       <div class="row">
                           <div class="col-md-8">
                                Status: 
                                <select class="form-control" name="status">
                                    <option value="0">-- Select Option --</option>
                                    <?php
                                    $statuses = array('New', 'Accepted', 'Assigned', 'Author Review', 'QA Review', 'Closed');
                                    foreach ($statuses as $status) {
                                        if ($status == ucwords($result['status'])) {
                                            echo '
                                            <option selected value="'. $status .'">'. $status .'</option>';
                                        }
                                        else {  
                                            echo '
                                            <option value="'. $status .'">'. $status .'</option>';
                                        }
                                    }
                                    ?>
                                </select>
                           </div>
                       </div>
                       <br>
                       <div class="row">
                           <div class="col-md-8">
                                Type:
                                <select class="form-control" name="type">
                                    <option value="0">-- Select Option --</option>
                                    <?php
                                    $types = array('Bug', 'Change', 'Request');
                                    foreach ($types as $type) {
                                        if ($type == ucwords($result['type'])) {
                                            echo '
                                            <option selected value="'. $type .'">'. $type .'</option>';
                                        }
                                        else {  
                                            echo '
                                            <option value="'. $type .'">'. $type .'</option>';
                                        }
                                    }
                                    ?>
                                </select>
                           </div>
                       </div>
                       <br>
                       <div class="row">
                           <div class="col-md-8">
                                Assigned To: 
                                <select class="form-control" name="assigned_to">
                                    <option value="0">-- Select Option --</option>
                                    <?php
                                    $users = new Users();
                                    $allUsers = $users->getAllAssignUsers();
                                    foreach ($allUsers as $assignUser) {
                                        $username = $assignUser['username'];
                                        if ($username == $result['assigned_to']) {
                                            echo '
                                            <option selected value="'. $username .'">'. $username .'</option>';
                                        }
                                        else {  
                                            echo '
                                            <option value="'. $username .'">'. $username .'</option>';
                                        }
                                    }
                                    ?>
                                </select>
                           </div>
                       </div>
                       <br>
                       <div class="row">
                           <div class="col-md-12 text-center">
                                <input class="btn btn-info" type="submit" name="editTicket" value="Edit Ticket">
                           </div>
                       </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
