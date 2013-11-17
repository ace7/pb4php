<?php
require_once('../../../parser/pb_parser.php');

var_dump('Start generating the UserData classes!');

$test = new PBParser();
$test->parse('userdata.proto');

var_dump('File parsing done!');



// first include pb_message
require_once('../../../message/pb_message.php');

// include the generated file
require_once('pb_proto_userdata.php');

$configuration = new Configuration();
$q = "title:\"Merkel\" OR description:\"Merkel\"";
$configuration->set_query($q);


$userData = new UserData();
$userData->set_clientname('abc');
$userData->set_id('22');
$userData->set_configuration($configuration);




// serialize
$string = $userData->SerializeToString();
print $string;
// write it to disk
file_put_contents('./userdata.pb', $string);

echo "<br>output<br>";
$string = file_get_contents('./userdata.pb');

// Just read it
$userdata = new UserData();
$userdata->parseFromString($string);

var_dump($userdata->configuration()->query());
//var_dump($userdata->configuration()->query());
?>

