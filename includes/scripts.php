<?php
    //INCLUDE DATABASE FILE
    include('database.php');
    //SESSSION IS A WAY TO STORE DATA TO BE USED ACROSS MULTIPLE PAGES
    session_start();

    //ROUTING
    if(isset($_POST['login']))        login($conn);
    if(isset($_POST['add']))        addProduct($conn);
    if(isset($_POST['update']))      updateTask($conn);
    if(isset($_POST['delete']))      deleteTask($conn);

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
        //SQL INSERT
            // Action
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

                $conn->close();
        
		header('location: ../index.php');
    }
    function getproducts($conn)
    {
            $sql = "SELECT products.* , platforms.name AS platform
                    FROM products 
                    INNER JOIN platforms";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                return $result;
            } else {
                 echo "0 results";
            } 
            $conn->close();
    }

    function sumTasks($conn , $status){
        $sql = "SELECT COUNT(*) as sum FROM tasks WHERE status = '$status'";

        $result = $conn->query($sql);
        $result = $result->fetch_assoc();
        return $result;
        $conn->close();
    }

    function getTask($conn){
        $id = $_GET['id'];
        $sql = "SELECT * FROM tasks WHERE id = $id";

        $result = $conn->query($sql);
        $result = $result->fetch_assoc();
        
        $_SESSION['id'] = $id;
        $conn->close();
        return $result;
    }
    function updateTask($conn)
    {
        //CODE HERE
            $title = $_POST['title'];
            $type = $_POST['type'];
            $priority = $_POST['priority'];
            $status = $_POST['status'];
            $date = $_POST['date'];
            $description = $_POST['description'];
            $id = $_SESSION['id'];
        //SQL UPDATE
            $sql = "UPDATE `tasks` SET
            `title`='$title',`type`='$type',`priority`='$priority',`status`='$status',
            `task_datetime`='$date',`description`='$description' WHERE id = $id";

            if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
            } else {
            echo "Error updating record: " . $conn->error;
            }
        $conn->close();

        $_SESSION['message'] = "Task has been updated successfully !";
		header('location: ../index.php');
    }

    function deleteTask($conn)
    {
        //CODE HERE
            $id = $_POST['delete'];
        //SQL DELETE
            $sql = "DELETE FROM `tasks` WHERE id=$id";
        
        if ($conn->query($sql) === TRUE) {
                $_SESSION['message'] = "Task has been deleted successfully !";
                header('location: ../index.php');
        } else {
            echo "Error deleting record: " . $conn->error;
        }
        $conn->close();
    }

?>