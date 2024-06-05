<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SAL.COM -회사등록</title>


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
                <button class="navbar-toggler"  data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
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
        <h4 class="mb-3">회사등록</h4>
        <form class="validation-form" action="register_company.php" method="post" novalidate
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
                <label for="name">회사이름</label>
                <input type="text" class="form-control" id="compname" name="compname" maxlength="45" placeholder="회사이름을 입력해주세요.(45자리)" value="" required>
                <div class="invalid-feedback">
                    회사이름을 입력하세요
                  </div>
                </div>


                
            <div class="col-md-6 mb-3">                 
                <label for="name">회사코드</label>
                <input type="text" class="form-control" id="compcode" name="compcode" max="5" placeholder="회사코드를 입력해주세요.(5자리)" value="" required>
                <input type="hidden" name="decide_com" id="decide_com">
                <p><span id="com_decide" style='color:red;'>회사코드를 등록해주세요! </span>
                <input type="button" id="com_check_button" value="회사 코드 등록" maxlength="5" onclick="checkcom();"></p>
                <div class="invalid-feedback">
                    회사코드를 입력하세요
                  </div>

                <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="aggrement" required>
            <label class="custom-control-label" for="aggrement">개인정보 수집 및 이용에 동의합니다.</label>
          </div>

           


            
            
          </div>
         
          <button class="btn btn-primary btn-lg btn-block" id="join_button" type="submit" disabled>가입 완료</button>
        </form>
      </div>
    </div>
    <footer class="my-3 text-center text-small">
      <p class="mb-1">&copy; 2023 YD</p>
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
        function checkcom(){
          var compcode = document.getElementById("compcode").value;
          if(compcode)  //compcode로 받음
          {
            url = "check_com.php?compcode="+compcode;
            window.open(url,"chkcom","width=400,height=200");
          } else {
            alert("회사코드를 입력하세요.");
            event.preventDefault();
          }
        }
      function decide(){                                                                  //아이디 중복체크 
        document.getElementById("decide").innerHTML = "<span style='color:blue;'>ID 중복 체크 완료!</span>"
        document.getElementById("decide_id").value = document.getElementById("id").value
        document.getElementById("id").disabled = true
        document.getElementById("join_button").disabled = false
        document.getElementById("check_button").value = "다른 ID로 변경"
        document.getElementById("check_button").setAttribute("onclick", "change()")
      }
      function change(){                                                                            //변경 필요할 시 실행되는 함수
        document.getElementById("decide").innerHTML = "<span style='color:red;'>ID 중복 여부를 확인해주세요.</span>"
        document.getElementById("id").disabled = false
        document.getElementById("id").value = ""
        document.getElementById("join_button").disabled = true
        document.getElementById("check_button").value = "ID 중복 검사"
        document.getElementById("check_button").setAttribute("onclick", "checkid()")
      }

      function com_decide(){                                                                  //회사코드 중복체크
        document.getElementById("com_decide").innerHTML = "<span style='color:blue;'>회사 코드 등록 완료! </span>"
        document.getElementById("decide_com").value = document.getElementById("compcode").value
        document.getElementById("compcode").disabled = true
        document.getElementById("join_button").disabled = false
        document.getElementById("com_check_button").value = "다른 회사코드 입력"
        document.getElementById("com_check_button").setAttribute("onclick", "com_change()")
      }

      function com_change(){                                                                            //회사코드 변경 필요할 시 실행되는 함수
        document.getElementById("com_decide").innerHTML = "<span style='color:red;'>다른 회사 코드를 입력해주세요!</span>"
        document.getElementById("compcode").disabled = false
        document.getElementById("compcode").value = ""
        document.getElementById("join_button").disabled = true
        document.getElementById("com_check_button").value = "다른 회사코드 입력"
        document.getElementById("com_check_button").setAttribute("onclick", "checkcom()")
      }

    window.addEventListener('load', () => {                                       //유효성검사 (부트스트랩) input에 입력이 안될 시 call message 출력
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