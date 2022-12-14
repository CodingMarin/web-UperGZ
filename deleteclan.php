<?php 
//Written by Wizkid Edited by darwin
//Copyright 2008 - 2009 

//Let us connect the databases. 
//Yeah yeah, ODBC this time. 
$host = "WIN-NL6K31Q73M3\SQLEXPRESS"; //The host. 
$user = "sa"; //The username. 
$pass = "anderson%%123"; //The password. I hope it's unique for you. 
$dbname = "GunzDB"; //The dbname. Most likely GunzDB. 

$connect = odbc_connect("Driver={SQL Server};Server={$host}; Database={$dbname}", $user, $pass) or die("Can't connect the MSSQL server."); 

//The num_rows() function for ODBC since the default one always returns -1. 
function num_rows(&$rid) { 

//We can try it at least, right? 
$num= odbc_num_rows($rid); 
if ($num >= 0) { 
return $num; 
} 

if (!odbc_fetch_row($rid, 1)) { 
odbc_fetch_row($rid, 0); 
return 0; 
} 

if (!odbc_fetch_row($rid, 2)) { 
odbc_fetch_row($rid, 0); 
return 1; 
} 

$lo= 2; 
$hi= 8192000; 

while ($lo < ($hi - 1)) { 
$mid= (int)(($hi + $lo) / 2); 
if (odbc_fetch_row($rid, $mid)) { 
$lo= $mid; 
} else { 
$hi= $mid; 
} 
} 
$num= $lo; 
odbc_fetch_row($rid, 0); 
return $num; 
} 

//Query time. 
$query = odbc_exec($connect,"SELECT CID FROM Character WHERE Name = ''"); 
$count = num_rows($query); 

while(odbc_fetch_row($query)) 
{ 
$cid = odbc_result($query, 1); 

odbc_exec($connect,"DELETE FROM CharacterItem WHERE CID = '" . $cid . "'"); 
odbc_exec($connect,"DELETE FROM Character WHERE CID = '" . $cid . "'"); 

echo "Removed the character with CID " . $cid . ". <br />"; 
} 

echo $count . " characters have been totally removed out of the database."; 
?>