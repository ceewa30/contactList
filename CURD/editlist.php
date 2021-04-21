<?php
// Including database connections
// require_once dirname(__DIR__).'/Dbase/DBConnection.php';
require_once dirname(__DIR__).'/private/initialize.php';

$editcontact = json_decode(file_get_contents("php://input"));

$contact = [];
$contact['$id'] = $editcontact->id;
$contact['$firstName'] = $editcontact->firstName;
$contact['$lastName'] = $editcontact->lastName;
$contact['$phone'] = $editcontact->phone;
$contact['$updated_at'] = $editcontact->updated_at;

// mysqli insert query
$query = edit_contact($contact);
?>
