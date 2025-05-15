<?php

$servername="tahira-server";
$dbusername="tahira";
$password="@bajwa123456789";
$dBName="tahira-database";

$conn=mysqli_connect($servername,$dbusername,$password,$dBName);

if(!$conn){
	die("Connection failed: ".mysqli_connect_error());
}
