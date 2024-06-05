<?php
session_start();
if(!isset($_SESSION['username'])) {
    echo "<script>alert('로그인이 필요합니다');</script>";  
    echo "<script>location.replace('index.php');</script>";            
}

else {
    $username = $_SESSION['username'];
} 
?>







<!DOCTYPE html>
<html lang="kr">
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
   
        


        <style>
          body {
            min-height: 100vh;
      
            background-color: rgba(33, 37, 41);
          }
      
          .input-form {
            max-width: 680px;
      
            margin-top: 80px;
            padding: 32px;
      
            background: #fff;
            -webkit-border-radius: 10px;
            -moz-border-radius: 10px;
            border-radius: 10px;
            -webkit-box-shadow: 0 8px 20px 0 rgba(0, 0, 0, 0.15);
            -moz-box-shadow: 0 8px 20px 0 rgba(0, 0, 0, 0.15);
            box-shadow: 0 8px 20px 0 rgba(0, 0, 0, 0.15)
          }
      
          .py-4{
            background-color: #343a40;
          }

        </style>        
      


    </head>
    <body class="sb-nav-fixed">
          style="background-color: black;
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="">SAL.COM</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">==
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">회원</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                내 정보
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="my_info.html">내 정보 보기</a>
                                    <a class="nav-link" href="in_outTime.html">내 정보 수정</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.php">Login</a>
                                            <a class="nav-link" href="register.php">Register</a>
                                            <a class="nav-link" href="test.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
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
                        
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>
                        <div class="container" style="width:50%">
                          
                         <div class="input-form col-md-12 mx-auto">  

                        <form class="form-signin" th:action="@{/account/myinfo}" method="post" th:object="${member}">

                            <br>
                            <?php
                                        $conn=mysqli_connect('localhost','root','','capstone');       

                                        if ($conn->connect_error) {
                                            die("Connection failed: " . $conn->connect_error);
                                        }
                                        $usercom = "SELECT compcode FROM employee WHERE id='$username'";
                                        $result = $conn->query($usercom);

                                        if ($result->num_rows > 0) {
                                            $row = $result->fetch_assoc();
                                            $compcode = $row['compcode'];
                                        
                                            // 회사 코드로부터 이메일과 직급 가져오기
                                            $info_query = "SELECT name,email, position FROM employee WHERE compcode='$compcode'";
                                            $info_result = $conn->query($info_query);
                                            if ($info_result->num_rows > 0) {
                                                $info_row = $info_result->fetch_assoc();
                                                $email = $info_row['email'];
                                                $position = $info_row['position'];
                                                $name = $info_row['name'];
                                            }
                                        
                                            $sql = "SELECT * FROM employee WHERE compcode='$compcode'";
                                        
                                            // 이하 코드는 동일
                                        }
                                        

                                        ?>

                            <h1>내 정보</h1>
                            <hr>
                            <br>

                            <div class="mb-3">
                                
                                <h4>회사코드</h4>
                                <input type="text" class="form-control" th:field="*{username}" value="<?php echo $compcode; ?>" th:readonly="readonly" disabled >
                            </div>
                    
                            <div class="mb-3">
                                
                                <h4>아이디</h4>
                                <input type="text" class="form-control" th:field="*{username}" value="<?php echo "$username";?>" th:readonly="readonly" disabled >
                            </div>
                            <div class="mb-3">
                                <h4>이름</h4>
                                <input type="text" class="form-control" id="age" value="<?php echo $name; ?>" th:readonly="readonly" disabled >
                            </div>
                        
                            <div class="mb-3">
                                <h4>이메일</h4>
                                <input type="text" class="form-control" id="age" value="<?php echo $email; ?>" th:readonly="readonly" disabled>
                            </div>
                            <div class="mb-3">
                                <h4>직급</h4>
                                <input type="text" class="form-control" id="age" value="<?php echo $position; ?>" th:readonly="readonly" disabled>
                            </div>
                                
                            <div class="form-group" style="text-align: center;">
                        </div>
                           
                        </form>                       
                    </div>
                      
                        <script src="script.js"></script>
                    </div>
                </main>
                <footer class="py-4">
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
    </body>
</html>