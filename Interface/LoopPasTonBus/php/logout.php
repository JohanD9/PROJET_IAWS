<?php

    /*
     * Page for properly destroy session variables 
     * and session
     * 
     */

    session_start();

    // Destroy session's variables and session
    $_SESSION = array();
    session_destroy();
    
    header('Location: /LoopPasTonBus/');
    
?>
