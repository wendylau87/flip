<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/helper/Connect.php');

$sql = file_get_contents('initial.sql');

$conn = new Connect();

if($conn->multiQuery($sql)){
    echo "Migration successfully !!\n";
}
else{
    echo "Migration failed. Please check error log on php.\n";
}
?>