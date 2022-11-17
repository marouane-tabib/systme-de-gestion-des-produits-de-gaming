<?php
    //INCLUDE DATABASE FILE
    include('database.php');
    //SESSSION IS A WAY TO STORE DATA TO BE USED ACROSS MULTIPLE PAGES
    session_start();

    //ROUTING
    if(isset($_POST['login']))          login($conn);
    if(isset($_POST['add']))            addProduct($conn);
    if(isset($_POST['update']))         updateProduct($conn);
    if(isset($_POST['delete']))         deleteProduct($conn);

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
                $_SESSION['action'] = [
                    'status' => "Success !",
                    'message' => "WELCOME BACK ! Login Success ... ",
                    'class' => "alert alert-success alert-dismissible fade show",
                    'btnFade' => 1,
                ];
                $_SESSION['user'] = true;
                header("location:../index.php");
            } else {
                $_SESSION['action'] = [
                    'status' => "Problem !",
                    'message' => "No recorde register , check your password or username",
                    'class' => "alert alert-danger alert-dismissible fade show",
                    'btnFade' => 0,
                ];
                header("location:../login.php");
            } 
            $conn->close();
        }else{
            $_SESSION['action'] = [
                'status' => "Problem !",
                'message' => "Please check your information",
                'class' => "alert alert-danger alert-dismissible fade show",
                'btnFade' => 0,
            ];
            header("location:../login.php");
        }
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
            $_SESSION['action'] = [
                'status' => "Problem !",
                'message' => "Please Chek Your products details ... ",
                'class' => "alert alert-danger alert-dismissible fade show",
                'btnFade' => 1,
            ];
                
            header('location: ../index.php');
         }
        else{
        //SQL INSERT
            $sql = "INSERT INTO products(`user_id` , `image`, `name`, `quantity`, `platform_id`, `price`, `description`) 
            VALUES (1 , '$image', '$name' , '$quantity' , '$platform_id' , '$price' , '$description')";

            if ($conn->query($sql) === TRUE) {
                $_SESSION['action'] = [
                    'status' => "Success !",
                    'message' => "Product has been added successfully !",
                    'class' => "alert alert-success alert-dismissible fade show",
                    'btnFade' => 1,
                ];
            } else {
                $_SESSION['action'] = [
                    'status' => "Problem !",
                    'message' => "Error: " . $sql . "<br>" . $conn->error,
                    'class' => "alert alert-danger alert-dismissible fade show",
                    'btnFade' => 1,
                ];
            }
        }

                $conn->close();
        
		header('location: ../index.php');
    }

    function getproducts($conn){
            $sql = "SELECT products.* , platforms.name AS platform
                    FROM products 
                    INNER JOIN platforms ON products.platform_id = platforms.id";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                return $result;
            }
            $conn->close();
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
        $conn->close();
        return $result;
    }

    function updateProduct($conn){
        include"tools/insertImage.php";
        //CODE HERE
            $id = $_SESSION['id'];
            $name = $_POST['name'];
            $quantity = $_POST['quantity'];
            $platform_id = $_POST['platform'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            $oldImage = $_POST['oldImage'];
            
            if(!empty($_FILES['image']['name'])){ $image = insertImage($_FILES['image']); }
            else{ $image = $oldImage; }
            
            
        if(!$image or !$name or !$quantity or !$platform_id or !$price or !$description){ 
            $_SESSION['action'] = [
                'status' => "Problem !",
                'message' => "No updated recorde , Please try again ...",
                'class' => "alert alert-danger alert-dismissible fade show",
                'btnFade' => 1,
            ]; 
            header('location: ../update.php?id='.$id);
         }else{
            //SQL UPDATE
            $sql = "UPDATE `products` SET 
            `user_id`='1',`image`='$image',`name`='$name',`quantity`='$quantity',`platform_id`='$platform_id',`price`='$price',`description`='$description' 
            WHERE id = '$id'";
            
            if ($conn->query($sql) === TRUE) {  
                $_SESSION['action'] = [
                    'status' => "Success !",
                    'message' => "Product has been updated successfully !",
                    'class' => "alert alert-success alert-dismissible fade show",
                    'btnFade' => 1,
                ];
                header('location: ../index.php');
            } else {
                $_SESSION['action'] = [
                    'status' => "Problem !",
                    'message' => "Error: " . $sql . "<br>" . $conn->error,
                    'class' => "alert alert-danger alert-dismissible fade show",
                    'btnFade' => 1,
                ];
                header('location: ../index.php');
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
                $_SESSION['message'] = "Task has been deleted successfully !";
                $status = unlink('../assets/images/products/'.$selectResult['image']); 
                echo $status;
                // header('location: ../index.php');
        } else {
            echo "Error deleting record: " . $conn->error;
        }
        $conn->close();
    }

?>