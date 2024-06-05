<?php
   $conn=mysqli_connect('localhost','root','','capstone');


   //////
   $decide_id=$_POST['decide_id'];
   $pwd=$_POST['pwd'];
   $email=$_POST['email'];
   $name=$_POST['name'];
   $compname=$_POST['compname'];
   $decide_com=$_POST['decide_com'];


   $filtered=array(
      'decide_id' => mysqli_real_escape_string($conn, $_POST['decide_id']),
      'pwd' => mysqli_real_escape_string($conn, $_POST['pwd']),
      'email' => mysqli_real_escape_string($conn, $_POST['email']),
      'name' => mysqli_real_escape_string($conn, $_POST['name']),
      'compname' => mysqli_real_escape_string($conn, $_POST['compname']),
      'decide_com' => mysqli_real_escape_string($conn, $_POST['decide_com'])           //decide_com
   );
   
   $sql="INSERT INTO company (
      compcode, compname) 
      VALUES ('{$filtered['decide_com']}','{$filtered['compname']}'
   );";


   $sql .="INSERT INTO employee (id, pw, name, email, position,compcode) 
      VALUES ('{$filtered['decide_id']}','{$filtered['pwd']}','{$filtered['name']}','{$filtered['email']}',
      '사장', $decide_com);";

   if ($conn->multi_query($sql) === TRUE) {
      echo "<script>alert('회원가입 성공!!');</script>";
      echo "<script>location.replace('index.php')</script>";
 

   } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
   } 
    
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title>AWSCOP</title>
</head>
<body>
   <div>
      <h1><a href="index.php">AWSCOP</a></h1>
   </div>
   <div>
      
   </div>
</body>
</html>