<?php
    //INCLUDE DATABASE FILE
    include('database.php');
    // INCLUDE TOOLS FILES
    include('tools/sessionGenerator.php');
    //SESSSION IS A WAY TO STORE DATA TO BE USED ACROSS MULTIPLE PAGES
    session_start();

// Products Section...
    //ROUTING
    if(isset($_POST['login']))          login($conn);
    if(isset($_POST['add']))            addProduct($conn);
    if(isset($_POST['update']))         updateProduct($conn);
    if(isset($_POST['delete']))         deleteProduct($conn);
    if(isset($_POST['logout']))         logout();

    function login($conn){
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Patterns ...
        $passPattern = '/^[a-zA-Z][0-9a-zA-Z_]{2,23}[0-9a-zA-Z]$/';
        $usernamePattern = '/^[a-z\d_]{5,20}$/i';
        
        
        if(preg_match($usernamePattern, $username) && preg_match($passPattern, $password)){
            $password = md5($password);
            $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    
            $result = $conn->query($sql);
    
            if ($result->num_rows > 0) {
                sessionGenerator();
                $_SESSION['user'] = $username;
                header("location:../index.php");
            } else {
                sessionGenerator("issue" , "No recorde register , check your password or username");
                header("location:../login.php");die();
            } 
            $conn->close();
        }else{
            sessionGenerator("issue" , "Please check your information");
            header("location:../login.php");die();
        }
    }
    function logout(){
        session_destroy();
        header('location:../index.php');die();
    }
    function addProduct($conn){
        include"tools/insertImage.php";

        $name = $_POST['name'];
        $quantity = $_POST['quantity'];
        $platform_id = $_POST['platform'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $image = insertImage($_FILES['image']);
        if(!$image or !$name or !$quantity or !$platform_id or !$price or !$description){ 
            sessionGenerator("issue" , "Please Chek Your products details ...");
            header('location: ../index.php');
         }
        else{
        //SQL INSERT
            $sql = "INSERT INTO products(`user_id` , `image`, `name`, `quantity`, `platform_id`, `price`, `description`) 
            VALUES (1 , '$image', '$name' , '$quantity' , '$platform_id' , '$price' , '$description')";

            if ($conn->query($sql) === TRUE) {
                sessionGenerator("success" , "Product has been added successfully !");
            } else {
                sessionGenerator("issue" , "Error: " . $sql . "<br>" . $conn->error);
            }
        }

                $conn->close();
        
		header('location: ../index.php');die();
    }
    function getproducts($conn){
            $sql = "SELECT products.* , platforms.name AS platform
                    FROM products 
                    INNER JOIN platforms ON products.platform_id = platforms.id";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                return $result;
            }
            // $conn->close();
    }
    function getProduct($conn){
        $id = $_GET['id'];
        $sql = "SELECT products.* , platforms.name AS platform
                FROM products
                INNER JOIN platforms ON products.platform_id = platforms.id
                WHERE products.id = '$id'";

        $result = $conn->query($sql);
        $result = $result->fetch_assoc();
        
        $_SESSION['id'] = $id;
        return $result;
        // $conn->close();
    }
    function updateProduct($conn){
        include"tools/insertImage.php";
        //CODE HERE
            $id = $_SESSION['id'];
            unset($_SESSION['id']);
            $name = $_POST['name'];
            $quantity = $_POST['quantity'];
            $platform_id = $_POST['platform'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            $oldImage = $_POST['oldImage'];
            
            if(!empty($_FILES['image']['name'])){ 
                unlink('../assets/images/products/'.$oldImage);
                $image = insertImage($_FILES['image']);
            }
            else{ $image = $oldImage; }
            
            
        if(!$image or !$name or !$quantity or !$platform_id or !$price or !$description){ 
            sessionGenerator("issue" , "No updated recorde , Please try again ...");
            header('location: ../update.php?id='.$id);die();
         }else{
            //SQL UPDATE
            $sql = "UPDATE `products` SET 
            `user_id`='1',`image`='$image',`name`='$name',`quantity`='$quantity',`platform_id`='$platform_id',`price`='$price',`description`='$description' 
            WHERE id = '$id'";
            
            if ($conn->query($sql) === TRUE) {  
                sessionGenerator("success" , "Product has been added successfully !");
                header('location: ../index.php');die();
            } else {
                sessionGenerator("issue" , "Error: " . $sql . "<br>" . $conn->error);
                header('location: ../index.php');die();
            }
         }
        $conn->close();
    }
    function deleteProduct($conn){
        //CODE HERE
            $id = $_POST['delete'];
        // SQL SELECT - TO DESTROY IMAGE
            $selectSql = "SELECT image FROM products WHERE id = '$id'";
            $selectResult = $conn->query($selectSql);
            $selectResult = $selectResult->fetch_assoc();
        //SQL DELETE
            $sql = "DELETE FROM `products` WHERE id=$id";
        
        if ($conn->query($sql) === TRUE) {
                sessionGenerator("success" , "Product has been deleted successfully !");
                unlink('../assets/images/products/'.$selectResult['image']); 
                header('location: ../index.php');die();
        } else {
            echo "Error deleting record: " . $conn->error;
        }
        $conn->close();
    }

// Platforms Section... 
    //ROUTING
    if(isset($_POST['saveplatform']))         addPlatform($conn);
    if(isset($_POST['update_platform']))      updatePlatform($conn);
    if(isset($_POST['delete_platform']))      delete_platform($conn);

    function getPlatforms($conn){
        $sql = "SELECT * FROM platforms";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            return $result;
        }
        $conn->close();
    }
    function addPlatform($conn){
        $name = $_POST['name'];
        if(!$name){ 
            sessionGenerator("issue" , "Please Chek Your Platform details ...");
            header('location: ../platforms.php');die();
         }
        else{
        //SQL INSERT
            $sql = "INSERT INTO platforms (`name`) VALUES ('$name')";

            if ($conn->query($sql) === TRUE) {
                sessionGenerator("success" , "Platform has been added successfully !");
            } else {
                sessionGenerator("issue" , "Error: " . $sql . "<br>" . $conn->error);
            }
        }
        $conn->close();
        header('location: ../platforms.php');die();
    }
    function getPlatform($conn){
        $id = $_GET['id'];
        $sql = "SELECT * FROM platforms WHERE id = '$id'";

        $result = $conn->query($sql);
        $result = $result->fetch_assoc();
        
        $_SESSION['id'] = $id;
        $conn->close();
        return $result;
    }
    function updatePlatform($conn){
        //CODE HERE
            $id = $_SESSION['id'];
            unset($_SESSION['id']);
            $name = $_POST['name'];
            
        if(!$name){ 
            sessionGenerator("issue" , "No updated recorde , Please try again ...");
            header('location: ../update_platform.php?id='.$id);die();
         }else{
            //SQL UPDATE
            $sql = "UPDATE `platforms` SET `name`='$name' WHERE id = '$id'";
            
            if ($conn->query($sql) === TRUE) {  
                sessionGenerator("success" , "Platform has been added successfully !");
                header('location: ../platforms.php');die();
            } else {
                sessionGenerator("issue" , "Error: " . $sql . "<br>" . $conn->error);
                header('location: ../platforms.php');die();
            }
         }
        $conn->close();
    }
    function delete_platform($conn){
        //CODE HERE
            $id = $_POST['delete_platform'];
        //SQL DELETE
            $sql = "DELETE FROM `platforms` WHERE id = '$id' ";

        if ($conn->query($sql) === TRUE) {
                sessionGenerator("success" , "Platform has been deleted successfully !");
                header('location: ../platforms.php');die();
        } else {
            echo "Error deleting record: " . $conn->error;
        }
        $conn->close();
    }
?>