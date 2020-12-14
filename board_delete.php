<?php
    session_start();

    $num   = $_GET["num"];
    $page   = $_GET["page"];

    $con = mysqli_connect("localhost", "root", "", "sample");
    $sql = "select * from board where num = $num";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);

    $copied_name = $row["file_copied"];
	$name       = $row["name"];

    if ($name == $_SESSION["userid"]) { 
        if ($copied_name)
	{
		$file_path = "./data/".$copied_name;
		unlink($file_path);
    }

    $sql = "delete from board where num = $num";
    mysqli_query($con, $sql);
    mysqli_close($con);

    echo "
	     <script>
	         location.href = 'board_list.php?page=$page';
	     </script>
	   ";
    } else {
        echo("
                    <script>
                    alert('글쓴이만 삭제가 가능합니다!');
                    history.go(-1)
                    </script>
        ");
    }

    $result = mysqli_query($con, $sql);
	
?>

