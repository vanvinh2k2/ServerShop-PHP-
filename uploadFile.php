<?php  
   require "connect.php";
   $target_dir = "images/";      
   // Check if image file is an actual image or fake image  
   $query = "SELECT MAX(id) AS id FROM sanphammoi";
   $data = mysqli_query($connect,$query);
   $result = array();
   while($row = mysqli_fetch_assoc($data)){
      $result[] = $row; 
   }
   if($result[0]['id'] == null){
      $name = 1;
   }else{
      $name = ++$result[0]['id'];
   }
   $target_file_name = $target_dir .$name. ".jpg";
   
   if (isset($_FILES["file"])) {  
      if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file_name)) {  
         $arr = array(
            'success' => true,
            'message' => "Thành công",
            'name' => $name
         ); 
      }  
      else {  
            $arr = array(
               'success' => false,
               'message' => "Thất bại" 
            );  
         }  
      }  
   else {  
           $arr = array(
               'success' => false,
               'message' => "Thất bại" 
            );
   }  
   echo json_encode($arr);  
?>  