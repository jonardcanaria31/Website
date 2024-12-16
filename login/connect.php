<?php

$host="localhost";
$user="u143688490_jonard";
$pass="January31,2004";
$db="u143688490_Goffee	";
$conn=new mysqli($host,$user,$pass,$db);
if($conn->connect_error){
    echo "Failed to connect DB".$conn->connect_error;
}
?>