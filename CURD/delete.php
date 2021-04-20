<?php
// Including database connections
// require_once dirname(__DIR__).'/Dbase/DBConnection.php';
require_once dirname(__DIR__).'/private/initialize.php';

$deletecontact = json_decode(file_get_contents("php://input"));

$id = $deletecontact->id;

$query = "DELETE FROM tbl_contactList WHERE id=$id";

mysqli_query($db, $query);
$sql = "SET @num := 0;";
$sql .= "UPDATE tbl_contactList SET id = @num := (@num+1);";
$sql .= "ALTER TABLE tbl_contactList AUTO_INCREMENT =1";
mysqli_multi_query($db,$sql);
echo true;
?>
