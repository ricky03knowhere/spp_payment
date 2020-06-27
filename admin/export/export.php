<?php

$type = $_GET["type"];
$data = $_GET["data"];
$nama = $_GET["name"];

include($type);
include("header.php");
include("../".$data);

?>