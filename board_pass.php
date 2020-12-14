<!DOCTYPE html>
<html>
    <head> 
        <meta charset="utf-8">
        <title>우리의 작은 누리집</title>
        <link rel="stylesheet" type="text/css" href="./css/common.css">
        <link rel="stylesheet" type="text/css" href="./css/board.css">
    </head>
    <body> 
        <header>
            <?php include "header.php";?>
        </header> 
        
<?php           
	            $num  = $_GET["num"];
                $page  = $_GET["page"];
?>
           
        <section>
	        <div id="main_img_bar">
                <img src="./img/my_write.png">
            </div>
            <div id="board_box">
	            <h3 class="title">
			        게시판 > 내용보기
		        </h3>     
               <form name="board_pass" method="post" action="pass_check.php?num=<?=$num?>&page=<?=$page?>">
                   <ul id="board_form"><br><br>
                       <span>  비밀번호가 설정된 글입니다. 비밀번호를 입력해주세요!</span><br><br>
                       <li>
                           <span class="col1">비밀번호 : </span>
                           <span class="col2"><input maxlength="20" type="password" name="pass_check" placeholder="20글자 이내로 입력해주세요!"></span><br><br>
                       </li><br>
                       <span>* 비밀번호를 입력한 후에 엔터키를 눌러주세요! </span><br><br><br>
                   </ul>
               </form>
	        </div> <!-- board_box -->
        </section> 
        <footer>
            <?php include "footer.php";?>
        </footer>
    </body>
</html>