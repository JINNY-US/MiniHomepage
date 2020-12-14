<!DOCTYPE html>
<?php
    session_start();
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
    if (isset($_SESSION["username"])) $username = $_SESSION["username"];
    else $username = "";
?>
<html>
    <script>
        function music_change() {
            var sel = document.getElementById("sel");
            var music_source = document.getElementById("music_source");
            var audio = document.getElementById("audio");
            var index = sel.selectedIndex;
            var mySpan = document.getElementById("mySpan");
            mySpan.innerHTML = sel.options[index].innerHTML;
            audio.pause();
            music_source.setAttribute('src', sel.options[index].value);
            audio.load();
        }
    </script>
    <body onload="music_change()">
        <br><br>
       <div id="music">
           <span id="mySpan">음악 수동재생</span><br><br>
            <audio loop controls id="audio">
	            <source id="music_source" name="music_source" src="./music_list/You%20Are%20My%20Everything.mp4" alt="다비치가 부릅니다. You Are My Everything." />
            </audio> <br><br> 
            
           <select id="sel" onchange="music_change()">
               <option value="./music_list/You%20Are%20My%20Everything.mp4">다비치 - You Are My Everything</option>
               <option value="./music_list/너 없는 시간들.mp4">다비치 - 너 없는 시간들</option>
               <option value="./music_list/Never%20Love.mp4">다비치 - Never Love</option>
               <option value="./music_list/Happy%20End.mp4">다비치 - Happy End</option>
               <option value="./music_list/나의 오랜 연인에게.mp4">다비치 - 나의 오랜 연인에게</option>
               <option value="./music_list/너에게 못했던 내 마지막 말은.mp4">다비치 - 너에게 못했던 내 마지막 말은</option>
               <option value="./music_list/마치 우린 없었던 사이.mp4">다비치 - 마치 우린 없었던 사이</option>
               <option value="./music_list/우리의 시간은 다르다.mp4">다비치 - 우리의 시간은 다르다</option>
           </select>
           
       </div>
        <div id="top_img">
            <img src=".\img\icon.jpg" onclick="location.href='index.php'" style="cursor:pointer;">
        </div>
        <div id="top">
            <h3>
                <a style="color:#5D2E00" href="index.php"><b>작은 누리집</b></a>
            </h3>
            <ul id="top_menu">
<?php
    if(!$userid) {
?>                
                <li><a href="member_form.php">회원 가입</a> </li>
                <li> | </li>
                <li><a href="login_form.php">로그인</a></li>
<?php
    } else {
                $logged = $username."(".$userid.")님";
?>
                <li><?=$logged?> </li>
                <li> | </li>
                <li><a href="logout.php">로그아웃</a> </li>
                <li> | </li>
                <li><a href="member_modify_form.php">정보 수정</a></li>
<?php
    }
?>

            </ul>
        </div>
        <div id="menu_bar">
            <ul>  
                <li><b><a href="index.php">HOME</a></b></li> 
                <li><b><a href="board_list.php">LIST</a></b></li>
                <li><b><a href="message_box.php?mode=rv">MESSAGE</a></b></li> 
                <li><b><a href="board_best.php">BEST</a></b></li>
                <li><b><a href="mypage.php">MYPAGE</a></b></li>
            </ul>
        </div>
    </body>
</html>
		

       
         
                
