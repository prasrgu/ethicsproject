<?php
/**
 * Created by PhpStorm.
 * User: AP1
 * Date: 20/04/2017
 * Time: 16:27
 */
session_start();
unset($_SESSION);
session_destroy();
header('location: index.php');