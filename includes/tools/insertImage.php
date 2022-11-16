<?php 
 function insertImage($file){
    $name_image=$file['name'];
    $targit_image='../assets/images/products/';
    $target_file = $targit_image . basename($file["name"]);
  
    // Select file type , ina no3e deyal hade le file li dekhele hewa 
       $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  
    // Valid file extensions
       $extensions_arr = array("jpg","jpeg","png","gif");
    // Check errors , wach dekhele le image welala , ghi bereke 3ela le btn
       $image_errors=$file['error'];
          if ($image_errors==4) {  echo "dekhele chi file be3eda o 3ade dike sa3a chofe 7aja khera"; }
    // Check size deyale le image 
       $image_size=$file['size'];
          if ($image_size>4000000 ) { echo "size kebiiire chewiya ";  }
    // Check tmp_name , ye3eni le 2asele deyal le image , dosi li jat meno
          $image_tmp_name=$file['tmp_name'];
    // Check extension
    if(!in_array($imageFileType,$extensions_arr) ){ echo "hadi machi image";$ror='not_good' ;}
    // name bach ghadi ne dire issert le image
    $name_image_insert = date("Ymd-G-i-s").'-'.$name_image;
    if (!isset($ror)) {
          move_uploaded_file($image_tmp_name, $targit_image.$name_image_insert);
        }
        return $name_image_insert;
}
?>