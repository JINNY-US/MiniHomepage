<?php
  session_start(); //세션 지우기
  unset($_SESSION["userid"]);
  unset($_SESSION["username"]);

  if(empty($urlencode)) $urlencode = "/index.php";
  echo("
       <script>
          location.href = 'index.php';
         </script>
       ");
?>
