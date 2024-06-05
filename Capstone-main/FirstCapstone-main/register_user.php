<?php
$conn = mysqli_connect('localhost', 'root', '', 'capstone');

//////
$decide_id = $_POST['decide_id'];
$pwd = $_POST['pwd'];
$email = $_POST['email'];
$name = $_POST['name'];
$compcode = $_POST['compcode'];
$hiredate = $_POST['hiredate'];

$filtered = array(
    'decide_id' => mysqli_real_escape_string($conn, $_POST['decide_id']),
    'pwd' => mysqli_real_escape_string($conn, $_POST['pwd']),
    'email' => mysqli_real_escape_string($conn, $_POST['email']),
    'name' => mysqli_real_escape_string($conn, $_POST['name']), //compcode
    'compcode' => mysqli_real_escape_string($conn, $_POST['compcode']), // compcode 추가
    'hiredate' => mysqli_real_escape_string($conn, $_POST['hiredate'])
);

$sql = "INSERT INTO employee (id, pw, name, email, hiredate, position, compcode) 
        VALUES ('{$filtered['decide_id']}', '{$filtered['pwd']}', '{$filtered['name']}', '{$filtered['email']}','{$filtered['hiredate']}',
                '직원', '{$filtered['compcode']}')"; // compcode에 작은 따옴표 추가

if (mysqli_query($conn, $sql)) { // multi_query()에서 query()로 변경
    echo "<script>alert('회원가입 성공!!');</script>";
    echo "<script>location.replace('index.php')</script>";
} else {
    echo "오류 발생: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title>SAL.COM-직원 등록</title>
</head>
<body>
   <div>
      <h1><a href="index.php">AWSCOP</a></h1>
   </div>
   <div>
      
   </div>
</body>
</html>
