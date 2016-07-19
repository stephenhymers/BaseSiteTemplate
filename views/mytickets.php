<?php

if (empty($_SESSION['user_session'])) {
   header('Location: ./?page=login'); 
}

$tickets = new Tickets();

$userTickets = $tickets->getTicketsByUser($_SESSION['user_session']['username']);

?>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <form action="" method="post">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="panel-title">My Tickets</h1>
                    </div>
                    <table class="table table-bordered table-condensed table-hover">
                        <thead>
                            <tr>
                                <th>Ticket Id</th>
                                <th>Title</th>
                                <th>Date Added</th>
                                <th>Last Updated</th>
                                <th>Due Date</th>
                                <th>Author</th>
                                <th>Status</th>
                                <th>Type</th>
                                <th>Assigned To</th>
                                <td></td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                           <?php
                            foreach ($userTickets as $ticket) {
                                echo '
                                <tr>
                                    <td>'. $ticket['ticket_id'] .'</td>
                                    <td>'. $ticket['title'] .'</td>
                                    <td>'. date('d-m-Y | H:i', $ticket['date_added']) .'</td>
                                    <td>'. date('d-m-Y | H:i', $ticket['date_updated']) .'</td>
                                    <td>'. date('d-m-Y | H:i', $ticket['due_date']) .'</td>
                                    <td>'. $ticket['author'] .'</td>
                                    <td>'. $ticket['status'] .'</td>
                                    <td>'. $ticket['type'] .'</td>
                                    <td>'. $ticket['assigned_to'] .'</td>
                                    <td><a class="btn btn-info form-control" href="./?page=editticket&ticketid='. $ticket['ticket_id'] .'">Edit</a></td>
                                    <td><a class="btn btn-danger form-control" onclick="return confirm(\'Are you Sure?\');" href="./?page=tickets&deleteticket=1&ticketid='. $ticket['ticket_id'] .'">Delete</a></td>
                                </tr>'; 
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>