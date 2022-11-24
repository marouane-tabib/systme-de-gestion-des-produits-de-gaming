<?php 
    function calc($conn , $action , $target){
        $target == "platform_id" ? $target = "DISTINCT ".$target : $target;
        $sql = "SELECT $action($target) as calc FROM products 
        INNER JOIN platforms ON products.platform_id = platforms.id";
// had clac hiya li ghadi ne7esseb biha les platforms o le wallet  , "yes" , belasset ma ne3awed kola 7aja deret had le function
//  khedemet biha fe had le page =>
// hadi kete3eti semiya jedida le result li jayan , oui
        $result = $conn->query($sql);
        $result = $result->fetch_assoc();
        // object , kayen chi 7 , num rows o me3e9elch 3la le ba9IYA , ok chokeran

        // makhedemetc js ... 
        // we7ed ghadi tejib awale element , o tenya ghadi tejib kolchi .
        // machi compelté , le intreprete ( ma3reftch wach haka ka teketeb)
        // we7ed khase yekon le kode kamele se7i7e bach tekon result => compele
        // keykon le error fe line li gheleti fihe , mi script ghadi tekhedem 
        // chokeran ... 
        return $result;
        $conn->close();
    }
?>