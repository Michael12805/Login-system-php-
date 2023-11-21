<?php

session_start();
session_unset();
session_destroy();

header("loaction: ../index.php");
exit();