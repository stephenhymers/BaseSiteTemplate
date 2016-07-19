<?php

if (!empty($_SESSION['user_session'])) {
   
    $users = new Users();
    $users->logoutUser();
    
}

?>