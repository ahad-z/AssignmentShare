<<<<<<< HEAD
<?php
require '../admin/dbcon.php';
$id = base64_decode($_GET['id']);
$downlod = mysqli_query($link, "SELECT * FROM `file` WHERE `id` = '$id'");
$row = mysqli_fetch_assoc($downlod);


$file = '../file/'.$row['file'];

if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    exit;
}
=======
<?php
require '../admin/dbcon.php';
$id = base64_decode($_GET['id']);
$downlod = mysqli_query($link, "SELECT * FROM `file` WHERE `id` = '$id'");
$row = mysqli_fetch_assoc($downlod);


$file = '../file/'.$row['file'];

if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    exit;
}
>>>>>>> 1f4d3da489573e5a286349867f04cd46260671da
?>