<?php
    $num  = $_GET["num"];
    $page  = $_GET["page"];

    $pass_check = $_POST["pass_check"];

    $con = mysqli_connect("localhost", "root", "", "sample");
    $sql = "select * from board where num=$num";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);

    $board_pass = $row["board_pass"];


    if($pass_check == $board_pass){ //비번 일치
?>
        <meta http-equiv='refresh' content='0;url="board_view.php?num=<?=$num?>&page=<?=$page?>"'>
<?php
    } else { //비번 불일치
        echo("
        <script>
        alert('비밀번호가 일치하지 않습니다!');
        location.href='board_list.php';
        </script>
        ");
        exit;
    }
?>
