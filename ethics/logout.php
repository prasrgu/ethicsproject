<?php
/**
 * Created by PhpStorm.
 * User: AP1
 */
session_start();
unset($_SESSION);
session_destroy();

header('location: index.php');