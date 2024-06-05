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
            <a class="navbar-brand ps-3" href="index.html">SALCOM</a>
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
                                                <a class="nav-link" href="ceo.html">내 정보 보기</a>
                                            </nav>

                                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                                회원 정보 수정
                                             <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                         </a>
                                         <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                             <nav class="sb-sidenav-menu-nested nav">
                                                 <a class="nav-link" href="change_id.php">아이디 변경</a>
                                                 <a class="nav-link" href="change_pw.php">비밀번호 변경</a>
                                                 <a class="nav-link" href="change_privacy.php">개인 정보 변경</a>
                                             </nav>
                                         </div>
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
                            <div class="sb-sidenav-menu-heading">매출</div>
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
                        
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>
                        <div class="container" style="width:50%">
                        <div class="input-form-backgroud row">
      <div class="input-form col-md-12 mx-auto">
        <h1 class="mb-3">아이디 변경</h1>
        <hr>
        <form class="validation-form" action="register_user.php" method="post" novalidate
        oninput='pwd2.setCustomValidity(pwd2.value != pwd.value ? "비밀번호가 일치하지 않습니다!" : "")'>    
          

          <div class="mb-3">
            <input type="text" class="form-control" id="id" name="id" placeholder="아이디를 입력해주세요" required>
            <input type="hidden" name="decide_id" id="decide_id">
            <p><span id="decide" style='color:red;'>ID 중복 여부를 확인해주세요.</span>
            <input type="button" id="check_button" value="ID 중복 검사" onclick="checkid();"></p>
            <div class="invalid-feedback">
              아이디를 입력해주세요.
            </div>
          </div>

          <div class="row">



            
            
          </div>
          <div class="custom-control custom-checkbox">
            <!-- <input type="checkbox" class="custom-control-input" id="aggrement" required> -->
            <!-- <label class="custom-control-label" for="aggrement">개인정보 수집 및 이용에 동의합니다.</label> -->
          </div>
          <div class="mb-4"></div>
          
          <div class="mb-3">
            <button class="w-100 btn btn-lg btn-primary" id="join_button type="submit" disabled >수정</button>
        </div>

        <div class="mb-3">
            <a type="button" style="color:white" class="w-100 btn btn-lg btn-secondary" onclick="window.history.back();">취소</a>
        </div>
        </form>
      </div>
    </div>
    <footer class="my-3 text-center text-small">
      <p class="mb-1">&copy; 2021 YD</p>
    </footer>
  </div>
                        <footer th:replace="fragments/common :: footer"></footer>
                         
                      
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

        <script>

        function checkid(){
          var userid = document.getElementById("id").value;
          if(userid)  //userid로 받음
          {
            url = "check.php?userid="+userid;
            window.open(url,"chkid","width=400,height=200");
          } else {
            alert("아이디를 입력하세요.");
            event.preventDefault();
          }
        }
      function decide(){
        document.getElementById("decide").innerHTML = "<span style='color:blue;'>ID 중복 체크 완료!</span>"
        document.getElementById("decide_id").value = document.getElementById("id").value
        document.getElementById("id").disabled = true
        document.getElementById("join_button").disabled = false
        document.getElementById("check_button").value = "다른 ID로 변경"
        document.getElementById("check_button").setAttribute("onclick", "change()")
      }
      function change(){
        document.getElementById("decide").innerHTML = "<span style='color:red;'>ID 중복 여부를 확인해주세요.</span>"
        document.getElementById("id").disabled = false
        document.getElementById("id").value = ""
        document.getElementById("join_button").disabled = true
        document.getElementById("check_button").value = "ID 중복 검사"
        document.getElementById("check_button").setAttribute("onclick", "checkid()")
      }




        </script>
    </body>
</html>