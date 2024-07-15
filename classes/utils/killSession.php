<?php
session_destroy();
unset($_SESSION['user']);
$_SESSION['user'] = null;
session_commit();
header("Location: ../../login");