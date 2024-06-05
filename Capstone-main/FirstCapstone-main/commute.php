<?php
session_start();
if(!isset($_SESSION['username'])) {
    echo "<script>alert('로그인이 필요합니다');</script>";  
    echo "<script>location.replace('index.php');</script>";            
}

else {
    $conn=mysqli_connect('localhost','root','','capstone'); 
    $username = $_SESSION['username'];
    
    $outtime = $_POST['intime'];
    $intime = $_POST['outtime'];

    $filtered = array(
        'intime' => mysqli_real_escape_string($conn, $_POST['intime']),
        'outtime' => mysqli_real_escape_string($conn, $_POST['outtime'])
    );
    $conn=mysqli_connect('localhost','root','','capstone');       

                                        if ($conn->connect_error) {
                                            die("Connection failed: " . $conn->connect_error);
                                        }
                                        $enum = "SELECT enum FROM employee WHERE id='$username'";
                                        $result = $conn->query($enum);
                                                
                                        if ($result->num_rows > 0) {
                                            $row = $result->fetch_assoc();
                                            $e_num = $row['enum'];

                                            $sql = "INSERT INTO commute (Enum, inTime, outTime) 
                                                    VALUES ($e_num, '{$filtered['intime']}', '{$filtered['outtime']}')"; // compcode에 작은 따옴표 추가

                                            if (mysqli_query($conn, $sql)) { // multi_query()에서 query()로 변경
                                                echo "<script>alert('근태 기록 성공');</script>";
                                                echo "<script>location.replace('emp.php')</script>";
                                            } else {
                                                echo "오류 발생: " . mysqli_error($conn);
                                            }

                                            
                                        }







    }
?>


