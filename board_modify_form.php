<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>우리의 작은 누리집</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/board.css">
<script>
  function check_input() {
      if (!document.board_form.subject.value)
      {
          alert("제목을 입력하세요!");
          document.board_form.subject.focus();
          return;
      }
      if (!document.board_form.content.value)
      {
          alert("내용을 입력하세요!");    
          document.board_form.content.focus();
          return;
      }
      document.board_form.submit();
   }
</script>
</head>
<body> 
<header>
    <?php include "header.php";?>
</header>  
<section>
	<div id="main_img_bar">
        <img src="./img/my_write.png">
    </div>
   	<div id="board_box">
	    <h3 id="board_title">
	    		게시판 > 글 쓰기
		</h3>
<?php
	$num  = $_GET["num"];
	$page = $_GET["page"];
	
	$con = mysqli_connect("localhost", "root", "", "sample");
	$sql = "select * from board where num=$num";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);
	$name       = $row["name"];
	$subject    = $row["subject"];
	$content    = $row["content"];	
    $board_pass = $row["board_pass"];
	$file_name  = $row["file_name"];
    if ($name == $_SESSION["userid"]) {
?>
        <form  name="board_form" method="post" action="board_modify.php?num=<?=$num?>&page=<?=$page?>" enctype="multipart/form-data">
	    	 <ul id="board_form">
				<li>
					<span class="col1">이름 : </span>
					<span class="col2"><?=$name?></span>
				</li>		
	    		<li>
	    			<span class="col1">제목 : </span>
	    			<span class="col2"><input name="subject" type="text" value="<?=$subject?>"></span>
	    		</li>	    	
	    		<li id="text_area">	
	    			<span class="col1">내용 : </span>
	    			<span class="col2">
	    				<textarea name="content"><?=$content?></textarea>
	    			</span>
	    		</li>
	    		<li>
			        <span class="col1"> 첨부 파일 : </span>
			        <span class="col2"><input type="file" name="upfile"></span>
			        <span class="col1">현재 파일 : </span>
                    <span class="col2"><?=$file_name?></span>
			    </li>
                <li>
			        <span class="col1">비밀 번호 : </span>
			        <span class="col2"><input maxlength="20" type="password" name="board_pass" placeholder="새로운 비밀번호를 설정해주세요! (20글자 이내)"></span>
			    </li><br>
                <span>* 첨부 파일과 비밀번호 설정은 선택사항이며, 글을 수정할 때 파일을 변경하면 기존의 첨부파일은 삭제됩니다.</span>
                <span>* 글을 수정할 때 비밀번호를 변경하거나 공란으로 두면 기존의 비밀번호는 삭제됩니다.</span>
	    	    </ul>
	    	<ul class="buttons">
				<li><button type="button" onclick="check_input()">수정완료</button></li>
				<li><button type="button" onclick="location.href='board_list.php'">목록</button></li>
			</ul>
	    </form>
<?php       
    } else {
        echo("
                    <script>
                    alert('글쓴이만 수정이 가능합니다!');
                    history.go(-1)
                    </script>
        ");
    }
?>
	    
	</div> <!-- board_box -->
</section> 
<footer>
    <?php include "footer.php";?>
</footer>
</body>
</html>
