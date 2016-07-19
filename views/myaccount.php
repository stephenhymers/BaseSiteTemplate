<?php

if (empty($_SESSION['user_session'])) {
   header('Location: ./?page=login'); 
}

?>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <form action="" method="post">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="panel-title">My Account - <?= ucwords($_SESSION['user_session']['username']) ?></h1>
                    </div>
                    <table class="table table-bordered table-condensed table-hover">
                       <tr>
                           <td>Username</td>
                           <td><?= $_SESSION['user_session']['username'] ?></td>
                       </tr>
                       <tr>
                           <td>Email</td>
                           <td><?= $_SESSION['user_session']['email'] ?></td>
                       </tr>
                        <?php
                        ?>
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>