<?php
///////////////////Connecting to a postgres db using PDO connection //////////////////////

// Connecting to PostgreSQL using PDO (PHP Data Objects)
// The PostgreSQL functions in the previous procedure can only be used with PostgreSQL databases. PDO abstracts database access, and enables you to use code that can handle different types of databases.
// To connect to PostgreSQL using PDO, follow these steps:
//     Use the following PHP code to connect to PostgreSQL and select a database. Replace username with your username, password with your password, and dbname with the database name: 
$host="localhost";
$port="5432";
$dbname="courses";
$user="postgres";
$password="root";
$dsn='pgsql:host=localhost;port=5432;dbname=courses;';


try{
    // echo "im in by using a PDO connection","<br>";
    // $myPDO = new PDO('pgsql:host=localhost;dbname=courses', 'postgres', 'Buster');
    $myPDO = new PDO($dsn,$user,$password);
    
} catch (PDOException $e){
    $error ="Database Error: ";
    $error .= $e->getMessage();
    include('view/error.php');
    exit();
}
// $sql="SELECT * FROM assignments";
// $result = $myPDO->query($sql);
// // $row = $result->fetch(PDO::FETCH_ASSOC);
// // echo "<pre>" ;print_r($row);echo "</pre>"
// while($row = $result->fetch(PDO::FETCH_ASSOC)){
//     echo "from pglogin , {$row['description']},<br>";
// }


?>
