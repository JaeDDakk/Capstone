<?php
session_start();
if(!isset($_SESSION['username'])) {
    echo "<script>alert('로그인이 필요합니다');</script>";  
    echo "<script>location.replace('index.php');</script>";            
}

else {
    $conn=mysqli_connect('localhost','root','','capstone'); 
    $username = $_SESSION['username'];
    
    $month = $_POST['month'];
    $sales = $_POST['sales'];

    $filtered = array(
        'month' => mysqli_real_escape_string($conn, $_POST['month']),
        'sales' => mysqli_real_escape_string($conn, $_POST['sales'])
    );
    $conn=mysqli_connect('localhost','root','','capstone');       

                                        if ($conn->connect_error) {
                                            die("Connection failed: " . $conn->connect_error);
                                        }
                                        $compcode = "SELECT compcode FROM employee WHERE id='$username'";
                                        $result = $conn->query($compcode);
                                                
                                        if ($result->num_rows > 0) {
                                            $row = $result->fetch_assoc();
                                            $c_compcode = $row['compcode'];

                                            $sql = "INSERT INTO sales (compcode, month, 매출) 
                                                    VALUES ($c_compcode, '{$filtered['month']}', '{$filtered['sales']}')"; // compcode에 작은 따옴표 추가

                                            if (mysqli_query($conn, $sql)) { // multi_query()에서 query()로 변경
                                                echo "<script>alert('매출 입력성공');</script>";
                                                echo "<script>location.replace('ceo.php')</script>";
                                            } else {
                                                echo "오류 발생: " . mysqli_error($conn);
                                            }

                                            
                                        }




                                        $result = $conn->query($sql);





    }
?>


