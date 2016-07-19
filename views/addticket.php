<?php

if (empty($_SESSION['user_session'])) {
    header('Location: ./?page=login'); 
}

if (!empty($_POST['addticket'])) {
    
    $insert = array(
        "title" => $_POST['title'],
        "date_added" => time(),
        "due_date" => strtotime($_POST['due_date']),
        "author" => $_SESSION['user_session']['username'],
        "status" => "new",
        "type" => $_POST['type'],
    );
    
    echo '<pre>';
    print_r($insert);
    echo '</pre>';
    
    $tickets = new Tickets();
    $tickets->addTicket($insert);
    
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
                                Title: 
                                <input class="form-control" type="text" name="title" value="">
                           </div>
                       </div>
                       <br>
                       <div class="row">
                           <div class="col-md-8">
                                Due Date: 
                                <input class="form-control" type="date" name="due_date" value="">
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
                                        echo '
                                        <option value="'. $type .'">'. $type .'</option>';
                                    }
                                    ?>
                                </select>
                           </div>
                       </div>
                       <br>
                       <div class="row">
                           <div class="col-md-12 text-center">
                                <input class="btn btn-success" type="submit" name="addticket" value="Add Ticket">
                           </div>
                       </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
