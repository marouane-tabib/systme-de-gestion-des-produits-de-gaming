<?php 
 function insertImage($file){
    $name_image=$file['name'];
    $targit_image='../assets/images/products/';
    $target_file = $targit_image . basename($file["name"]);
  
    // Select file type 
       $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Valid file extensions
       $extensions_arr = array("jpg","jpeg","png","gif");
    // Check errors
       $image_errors=$file['error'];
        if ($image_errors==4) {  return false; }
    // Check size deyale le image 
       $image_size=$file['size'];
        if ($image_size>4000000 ) { return false;  }
    // Check tmp_name
        $image_tmp_name=$file['tmp_name'];
    // Check extension
        if(!in_array($imageFileType,$extensions_arr) ){ return false; }
        else{
            $name_image_insert = date("Ymd-G-i-s").'-'.$name_image;
            move_uploaded_file($image_tmp_name, $targit_image.$name_image_insert);
            return $name_image_insert;
        }
}
?>