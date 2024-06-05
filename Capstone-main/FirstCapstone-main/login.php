
<?php
session_start();
if(isset($_SESSION['username'])) {  
  
          echo "<script>alert('로그인 되어있습니다');</script>";  
          
          echo "<script>location.replace('index.php');</script>";
}
?>

<!DOCTYPE html>
<html lang="kr">
  <head>
   <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>로그인</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


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
  </style>

    
  </head>
  <body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
                <a class="navbar-brand" href="index.php">SAL.com</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="index.php">홈</a></li>
                        <li class="nav-item"><a class="nav-link" href="login.php">로그인</a></li>
                        
                    </ul>
                </div>
            </div>
        </nav>
    <div class="container">
    <div class="input-form-backgroud row">
      <div class="input-form col-md-12 mx-auto">
        <h4 class="mb-3">로그인</h4>
        <form class="validation-form" method="post" action="login_check.php" novalidate >
          <div class="mb-3">
            <label for="ID">아이디</label>
            <input type="ID" class="form-control" name="uid"  placeholder="아이디를 입력해주세요" required>
            <div class="invalid-feedback">
              아이디를 입력해주세요.
            </div>
          </div>

          <div class="mb-3">
            <label for="Password">비밀번호</label>
            <input type="password" class="form-control" name="pwd" placeholder="비밀번호를 입력해주세요" required>
            <div class="invalid-feedback">
              비밀번호를 입력해주세요.
            </div>
          </div>  
          <div class="mb-4"></div>
          <button class="btn btn-primary btn-lg btn-block" type="submit" >로그인</button>
        </form>
      </div>
    </div>
    <footer class="my-3 text-center text-small">
      <p class="mb-1">&copy; 2021 YD</p>
    </footer>
  </div>

  <script>
    window.addEventListener('load', () => {
      const forms = document.getElementsByClassName('validation-form');

      Array.prototype.filter.call(forms, (form) => {
        form.addEventListener('submit', function (event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }

          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>



  </body>
</html>