<?php
    $conn= mysqli_connect('localhost', 'root', '', 'capstone');
    $compcode= $_GET["compcode"];  //GET으로 넘긴 userid
    $sql= "SELECT * FROM company where compcode='$compcode'";
    $result = mysqli_fetch_array(mysqli_query($conn, $sql));

    if(!$result){
        echo "<span style='color:blue;'>$compcode</span> 는 사용 가능한 회사코드 입니다.";
       ?><p><input type=button value="이 회사코드 사용" onclick="opener.parent.com_decide(); window.close();">
       
    </p>
        
    <?php
    } else {
        echo "<span style='color:red;'>$compcode</span> 는 사용할 수 없는 회사코드입니다";
        ?><p><input type=button value="다른 회사코드 입력" onclick="opener.parent.com_change(); window.close()"></p>
    <?php
    }
?>