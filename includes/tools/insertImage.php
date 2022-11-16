<?php 
 function insertImage($file){
    $imgContent = null;
    if(!empty($file["image"]["name"])) { 
        // Get file info 
        $fileName = basename($file["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $file['image']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
        } 
    }else{ 
        $statusMsg = 'Please select an image file to upload.'; 
    }
    $result = $imgContent ?: $statusMsg;
            return $result;
}
?>