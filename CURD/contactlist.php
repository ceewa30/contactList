<?php
// Including database connections
// require_once dirname(__DIR__).'/Dbase/DBConnection.php';
require_once dirname(__DIR__).'/private/initialize.php';

$createcontact = json_decode(file_get_contents("php://input"));

$contact = [];
$contact['$firstName'] = $createcontact->firstName ?? '';
$contact['$lastName'] = $createcontact->lastName ?? '';
$contact['$phone'] = $createcontact->phone ?? '';
// mysqli insert query
$query = insert_contact($contact);
?>
