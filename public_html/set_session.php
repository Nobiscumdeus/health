<?php
ini_set('session.cookie_lifetime',1800); //1800 seconds is also 30 minutes 
ini_set('session.gc_maxlifetime',1800);

ini_set('session.gc_probability',1); //allows for garbage cleaning 
ini_set('session.gc_divisor',1);
session_start();

$_SESSION['quiz_completed']=true;

http_response_code(200);

?>