<?php
session_start();
if(!isset($_SESSION['username'])) {
    echo "<script>alert('로그인이 필요합니다');</script>";  
    echo "<script>location.replace('index.php');</script>";            
}

else {
    $username = $_SESSION['username'];
    $conn=mysqli_connect('localhost','root','','capstone');       

                                             if ($conn->connect_error) {
                                            die("Connection failed: " . $conn->connect_error);
                                        }
                                        $usercom = "SELECT compcode FROM employee WHERE id='$username'";
                                        $result = $conn->query($usercom);
                                                
                                        if ($result->num_rows > 0) {
                                            $row = $result->fetch_assoc();
                                            $compcode = $row['compcode'];

                                            $compname_query = "SELECT c.compname
                                            FROM employee e, company c
                                            WHERE e.compcode=c.compcode
                                            AND e.compcode='$compcode'";
                                            $compname_result = $conn->query($compname_query);
                                            if ($compname_result->num_rows > 0) {
                                                $compname_row = $compname_result->fetch_assoc();
                                                $compname = $compname_row['compname'];
                                            }

                                            $sql = "SELECT * FROM employee WHERE compcode='$compcode'";

                                            // 이하 코드는 동일
                                        }




                                        $result = $conn->query($sql);
} 
?>


    

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">SAL.COM</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="logout.php">로그아웃</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading"></div>
                            <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                홈
                            </a>
                            <div class="sb-sidenav-menu-heading">회원</div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                    내 정보
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                            <nav class="sb-sidenav-menu-nested nav">
                                                <a class="nav-link" href="my_info.php">내 정보 보기</a>
                                                <a class="nav-link" href="edit_member_info.html">회원 정보 수정</a>
                                            </nav>
                                        </div>
                            
                                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayout" aria-expanded="false" aria-controls="collapseLayouts">
                                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                            직원 정보
                                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                        </a>
                                                <div class="collapse" id="collapseLayout" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                                    <nav class="sb-sidenav-menu-nested nav">
                                                        <a class="nav-link" href="ceo.html">회사 직원 보기</a>
                                                        <a class="nav-link" href="edit_member_info.html">직원 월급 보기</a>
                                                    </nav>
                                                </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                회사 월 매출
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                회사 연 매출
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4"><?php echo "회사이름 : $compname";?></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                    <i class="fas fa-chart-area me-1"></i>
                                        매출차트
                                        <canvas id="lineChart" width="800" height="400"></canvas>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                    <i class="fas fa-chart-area me-1"></i>
                                        매출라인차트
                                        <canvas id="barchart" width="800" height="400"></canvas>
                                    </div>
                                    
                                </div>
                            </div>

                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                사원 정보
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>사원명</th>
                                            <th>이메일</th>
                                            <th>직급</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                         <th>사원명</th>
                                            <th>이메일</th>
                                            <th>직급</th>
                                        </tr>
                                    </tfoot>
                                    

                                    <tbody>
                                        <?php
                                            

                                        
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>" . $row['name'] . "</td>";
                                                echo "<td>" . $row['email'] . "</td>";
                                                echo "<td>" . $row['position'] . "</td>";
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='6'>No data found</td></tr>";
                                        }

                                        $conn->close();
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
 

    <script>
        // 데이터베이스 연결 설정
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "capstone";

        // 데이터베이스 연결
        $conn = new mysqli($servername, $username, $password, $dbname);

        // 연결 확인
        if ($conn->connect_error) {
            die("데이터베이스 연결 실패: " . $conn->connect_error);
        }

        // 매출 데이터 가져오기
        $sql = "select month, 매출 FROM sales WHERE compcode = 69746 ORDER BY month";
        $result = $conn->query($sql);

        // 데이터 배열 초기화
        $months = [];
        $sales = [];

        // 데이터 추출
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $months[] = $row["month"];
                $sales[] = $row["매출"];
            }
        }

        // 데이터베이스 연결 닫기
        $conn->close();
        ?>

        // 매출 데이터
        var months = <?php echo json_encode($months); ?>;
        var sales = <?php echo json_encode($sales); ?>;

        // 라인 차트 생성
        var ctx = document.getElementById("lineChart").getContext("2d");
        var lineChart = new Chart(ctx, {
            type: "line",
            data: {
                labels: months,
                datasets: [{
                    label: "매출",
                    data: sales,
                    fill: false,
                    borderColor: "rgb(75, 192, 192)",
                    tension: 0.1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        display: true,
                        title: {
                            display: true,
                            text: "날짜"
                        }
                    },
                    y: {
                        display: true,
                        title: {
                            display: true,
                            text: "매출"
                        }
                    }
                }
            }
        });

                        var months = <?php echo json_encode($months); ?>;
                        var sales = <?php echo json_encode($sales); ?>;

                        var ctx = document.getElementById("barchart").getContext("2d");
                var barChart = new Chart(ctx, {
                    type: "bar",
                    data: {
                        labels: <?php echo json_encode($months); ?>,
                        datasets: [{
                            label: "매출",
                            data: <?php echo json_encode($sales); ?>,
                            backgroundColor: "rgba(75, 192, 192, 0.2)",
                            borderColor: "rgba(75, 192, 192, 1)",
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            x: {
                                display: true,
                                title: {
                                    display: true,
                                    text: "날짜"
                                }
                            },
                            y: {
                                display: true,
                                title: {
                                    display: true,
                                    text: "매출"
                                }
                            }
                        }
                    }
                });
        

        
    </script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    
    </body>
</html>
