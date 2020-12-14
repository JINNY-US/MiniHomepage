<!DOCTYPE html>
<html>
    <head> 
        <meta charset="utf-8">
        <title>우리의 작은 누리집</title>
        <link rel="stylesheet" type="text/css" href="./css/common.css">
        <link rel="stylesheet" type="text/css" href="./css/hit.css">
    </head>
    <body> 
        <header>
            <?php include "header.php";?>
        </header>  
        <section>
	        <div id="main_img_bar">
                <img src="./img/my_best.png">
            </div><br><br>
    <div id="hit_content">
        <div id="popular">
            <h4>인기 게시글</h4>
            <ul>
<?php
                $con = mysqli_connect("localhost", "root", "", "sample");
                $sql = "select * from board order by hit desc limit 5";
                $result = mysqli_query($con, $sql);

                if (!$result)
                    echo "아직 게시글이 없습니다!";
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
        
        <div id="point_rank">
                <h4>활발 누리꾼</h4>
                <ul>
<!-- 포인트 랭킹 표시하기 -->
<?php
    $sql = "select * from members order by point desc limit 5";
    $result = mysqli_query($con, $sql);

    if (!$result)
        echo "아직 가입된 회원이 없거나 글을 쓴 누리꾼이 존재하지 않습니다!";
    else
    {
        while( $row = mysqli_fetch_array($result) )
        {
            $name  = $row["name"];        
            $id    = $row["id"];
            $name = mb_substr($name, 0, 1)." * ".mb_substr($name, 2, 1).mb_substr($name, 3, 1);
?>
                <li>
                    <span><?=$name?></span>
                    <span><?=$id?></span>
                </li>
<?php
        }
    }

    mysqli_close($con);
?>
                </ul>
            </div>
        
        </div>
        
        </section><br>
        <footer>
            <?php include "footer.php";?>
        </footer>
        </body>
</html>