<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SAL.COM-사원등록</title>


  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
  <link href="css/styles.css" rel="stylesheet" />
  <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
  <!-- 부트스트랩 css 추가 -->
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
    <main class="flex-shrink-0">
        <!-- Navigation-->
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
        <h4 class="mb-3">사원등록</h4>
        <form class="validation-form" action="register_user.php" method="post" novalidate
        oninput='pwd2.setCustomValidity(pwd2.value != pwd.value ? "비밀번호가 일치하지 않습니다!" : "")'>    
          

          <div class="mb-3">
            <label for="user_id">아이디</label>
            <input type="text" class="form-control" id="id" name="id" placeholder="아이디를 입력해주세요" required>
            <input type="hidden" name="decide_id" id="decide_id">
            <p><span id="decide" style='color:red;'>ID 중복 여부를 확인해주세요.</span>
            <input type="button" id="check_button" value="ID 중복 검사" onclick="checkid();"></p>
            <div class="invalid-feedback">
              아이디를 입력해주세요.
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="user_password">비밀번호</label>
              <input type="password" class="form-control" id="pw" name="pwd" placeholder="비밀번호 입력" value="" required>
              <div class="invalid-feedback">
                비밀번호 입력해주세요.
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="confrim_password">비밀번호 확인</label>
              <input type="password" class="form-control" id="pwd2" name="pwd2"  placeholder="비밀번호 확인" value="" required>
              <div class="invalid-feedback">
                비밀번호가 일치하지 않습니다
              </div>
            </div>
          </div>


      




          <div class="mb-3">
            <label for="user_email">이메일</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="email@example.com" required>
            <div class="invalid-feedback">
              이메일을 입력해주세요.
            </div>
          </div>
        

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="name">이름</label>
              <input type="text" class="form-control" id="name" name="name" maxlength="3" placeholder="이름을 입력해주세요." value="" required>
              <div class="invalid-feedback">
                이름을 입력해주세요.
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="hiredate">입사일</label>
              <input type="date" class="form-control" id="hiredate" name="hiredate" placeholder="" value="" required>
              <div class="invalid-feedback">
                입사일을 선택해주세요
              </div>
            </div>

          

            <?php
              $conn = mysqli_connect('localhost', 'root', '', 'capstone');

              // 회사 코드를 가져오는 쿼리
              $sql = "SELECT compcode FROM company";
              $result = mysqli_query($conn, $sql);

              $options = ""; // 옵션 태그를 저장할 변수 초기화

              // 결과를 반복하여 옵션 태그 생성
              while ($row = mysqli_fetch_assoc($result)) {
                  $compcode = $row['compcode'];
                  $options .= "<option value='$compcode'>$compcode</option>";
              }

              mysqli_close($conn);
            ?>

              <!-- HTML 코드 -->
              <div class="col-md-6 mb-3">
                  <label for="name">회사코드</label>
                  <select class="form-control" id="compcode" name="compcode" required>
                    <option value="" disabled selected>회사코드 선택(여기를 눌러주세요)</option>
                      <?php echo $options; ?>
                  </select>
                  <div class="invalid-feedback">
                      회사코드를 선택하세요.
                  </div>
              </div>



            
            
          </div>
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="aggrement" required>
            <label class="custom-control-label" for="aggrement">개인정보 수집 및 이용에 동의합니다.</label>
          </div>
          <div class="mb-4"></div>
          <button class="btn btn-primary btn-lg btn-block" id="join_button" type="submit" disabled>가입 완료</button>
        </form>
      </div>
    </div>
    <footer class="my-3 text-center text-small">
      <p class="mb-1">&copy; 2021 YD</p>
    </footer>
  </div>
  
  
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
    function checkPw() {                                            //비밀번호와 비밀번호 확인이 일치한지 체크
      var p1 = document.getElementById('pwd').value;
      var p2 = document.getElementById('pwd2').value;
      if( p1 != p2 ) {
        alert("비밀번호가 일치 하지 않습니다");
        return false;
      } else{
        alert("비밀번호가 일치합니다");
        return true;
      }

    }


    window.addEventListener('load', () => {                                       //유효성검사 (부트스트랩)
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