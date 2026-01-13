<?php  
  $data=[
        'host' => '192.168.2.21',
        'username' => 'chang',
        'password' => 'chang11143',
        'dbname' => 'RCMDB'
  ];
    try {
        $conn = new PDO("mysql:host=".$data['host'].";dbname=".$data['dbname'], $data['username'], $data['password']);
        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>