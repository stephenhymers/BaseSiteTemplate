<?php

if (!empty($_GET['ticketid']) && !empty($_GET['closeticket']) && $_GET['closeticket'] == 1) {
    
    $ticketId = $_GET['ticketid'];
    
    $tickets = new Tickets();
    $tickets->closeTicket($ticketId);
}

?>
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1>Tickets</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h1 class="panel-title">All Tickets</h1>
                </div>
                <table class="table table-bordered table-hover table-striped text-center table-condensed">
                    <thead>
                        <tr>
                            <th>Ticket Id</th>
                            <th>Title</th>
                            <th>Date Added</th>
                            <th>Date Updated</th>
                            <th>Due Date</th>
                            <th>Author</th>
                            <th>Status</th>
                            <th>Type</th>
                            <th>Assigned To</th>
                            <?php
                            if ($admin == 1) {
                                echo '
                                <td></td>
                                <td></td>';
                            }
                            ?>
                        </tr>
                    </thead>
                    <?php
                    $tickets = new Tickets();
                    $results = $tickets->getAllTickets();
                    foreach ($results as $r) {
                        echo '
                         <tr>
                            <td>'. $r['ticket_id'] .'</td>
                            <td>'. $r['title'] .'</td>
                            <td>'. date('d-m-Y | H:i', $r['date_added']) .'</td>
                            <td>'. date('d-m-Y | H:i', $r['date_updated']) .'</td>
                            <td>'. date('d-m-Y | H:i', $r['due_date']) .'</td>
                            <td>'. $r['author'] .'</td>
                            <td>'. $r['status'] .'</td>
                            <td>'. $r['type'] .'</td>
                            <td>'. $r['assigned_to'] .'</td>'; 
                            if ($admin) {
                                echo '
                                <td><a class="btn btn-info form-control" href="./?page=editticket&ticketid='. $r['ticket_id'] .'">Edit</a></td>
                                <td><a class="btn btn-danger form-control" onclick="return confirm(\'Are you Sure?\');" href="./?page=tickets&closeticket=1&ticketid='. $r['ticket_id'] .'">Close</a></td>';
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
