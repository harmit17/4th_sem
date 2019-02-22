 <?php  
 $conn = mysqli_connect("localhost", "root", "", "signup");  
 $output = array();  
 $query = "SELECT Email,Password,Time FROM users";  
 $result = mysqli_query($conn, $query);  
 if(mysqli_num_rows($result) > 0) {  
      while($row = mysqli_fetch_array($result)) {  
           $output[] = $row;  
      }  
      echo json_encode($output);  
 }  
 ?>  