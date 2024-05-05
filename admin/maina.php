<?php include("header.php");


if (isset($_GET['source'])) {
    $source = $_GET['source'];
    switch ($source) {
        case 'accounts.php':
            include("accounts.php");
            break;
        case 'members.php':
            include("members.php");
            break;
        case 'dashboard':
            include("dashboard.php");
            break;
        case 'index.php';
            include("index.php");
            break;
        default:
            include("index.php");
            break;
    }
}
