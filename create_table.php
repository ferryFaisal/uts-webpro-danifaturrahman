<?php
require "database.php";

try {
    $conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS products (
              id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
              name varchar(128) NOT NULL,
              description text NOT NULL,
              price double NOT NULL,
              photo varchar(30) NOT NULL,
              created datetime NOT NULL,
              modified timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9";
    
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Table products created successfully";
  } catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  }
  
$conn = null;
?>
