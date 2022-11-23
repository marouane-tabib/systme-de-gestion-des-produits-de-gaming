<?php 
    function calc($conn , $action = "SUM" , $target = "price"){
        $sql = "SELECT $action($target) as calc FROM products";

        $result = $conn->query($sql);
        $result = $result->fetch_assoc();
        return $result;
        $conn->close();
    }
?>