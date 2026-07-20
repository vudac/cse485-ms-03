<?php
declare(strict_types=1);
session_start();

if (!empty($_SESSION['auth'])) {
    header('Location: dashboard.php');
} else {
    header('Location: login.php');
}
exit;