

<?php
      session_start();
      //<!--php부분 form에 입력한 내용을 데이터베이스와 비교해서 로그인 여부를 알려준다.-->
      if(isset($_POST['uid'])&&isset($_POST['pwd'])){//post방식으로 데이터가 보내졌는지?
        $username=$_POST['uid'];//post방식으로 보낸 데이터를 username이라는 변수에 넣는다.
        $userpw=$_POST['pwd'];//post방식으로 보낸 데이터를 userpw라는 변수에 넣는다.
        //mysql root계정으로 접속.
        //비밀번호는 123456이다.
        //study라는 데이터베이스에 접근.
        $conn= mysqli_connect('localhost', 'root', '', 'capstone');
        //sql문을 sql변수에 저장해놓는다.
        $sql="SELECT * FROM employee where id='$username'&&pw='$userpw'";

        if($result=mysqli_fetch_array(mysqli_query($conn,$sql))){//쿼리문을 실행해서 결과가 있으면 로그인 성공
          //echo "사용자 이름= $username";
          echo "<script>alert('로그인 성공!');</script>";
          $_SESSION['username']=$username;
          $enum_query = "SELECT Enum FROM employee WHERE id='$username'";
          $enum_result = mysqli_query($conn, $enum_query);
    
          if ($enum_row = mysqli_fetch_assoc($enum_result)) {
              $_SESSION['Enum'] = $enum_row['Enum'];
          }
          
          $posi_query = "SELECT position FROM employee WHERE id='$username'";

          $posi_result = $conn->query($posi_query);
            if ($posi_result->num_rows > 0) {
              $posi_row = $posi_result->fetch_assoc();
              $lo_position = $posi_row['position'];
          }

          if($lo_position=='사장'){
              
          echo "<script>location.replace('ceo.php');</script>";
          }
          else{
            
          echo "<script>location.replace('emp.php');</script>";
          }



        }
        else{//쿼리문의 결과가 없으면 로그인 fail을 출력한다.
          echo "<script>alert('로그인 실패! 아이디 또는 비밀번호를 확인해주세요');</script>";
          echo "<script>location.replace('login.php');</script>";
        }
      }
    ?>