<?php 
    function calc($conn , $action , $target){
        $target == "platform_id" ? $target = "DISTINCT ".$target : $target;
        $sql = "SELECT $action($target) as calc FROM products 
        INNER JOIN platforms ON products.platform_id = platforms.id";

        $result = $conn->query($sql);
        $result = $result->fetch_assoc();
        return $result;
        $conn->close();
    }
?>