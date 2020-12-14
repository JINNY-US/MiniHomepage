<!DOCTYPE html>
<html>
    <div id="main_img_bar">
            <img src="./img/my_home.png">
    </div>
    <div id="main_content">
        <div id="latest">
            <h4>최근 게시글</h4>
            <ul>
<!-- 최근 게시 글 DB에서 불러오기 -->
<?php
                $con = mysqli_connect("localhost", "root", "", "sample");
                $sql = "select * from board order by num desc limit 5";
                $result = mysqli_query($con, $sql);

                if (!$result)
                    echo "게시판 DB 테이블(board)이 생성 전이거나 아직 게시글이 없습니다!";
                else {
                    while( $row = mysqli_fetch_array($result) ) {
                        $regist_day = substr($row["regist_day"], 0, 10);
?>
                        <li>
                            <span><?=$row["subject"]?></span>
                            <span><?=$row["name"]?></span>
                            <span><?=$regist_day?></span>
                        </li>
<?php
                    }
                }
?>
            </ul>
        </div>
        <div id="message_prv"> 
            <h4>받은 쪽지함</h4>
            <ul>
<!-- 포인트 랭킹 표시하기 -->
<?php
    if($userid) {
        $sql = "select * from message where rv_id='$userid' order by num desc limit 5";
        $result = mysqli_query($con, $sql);

        if (!$result) {
            echo "받은 쪽지가 없습니다.";
        }
        else {
            while( $row = mysqli_fetch_array($result) ) {
                $send_id  = $row["send_id"];        
                $regist_day = substr($row["regist_day"], 0, 10);
?>
                <li>
                   <span><?=$row["subject"]?></span>
                    <span><?=$send_id?></span>
                    <span><?=$regist_day?></span>
                </li>
<?php
            }
        }
    } else {
        echo "로그인 후 이용 가능합니다.";
    }
    mysqli_close($con);
?>
                </ul>
            </div>
        </div>
</html>