<?php
	include 'config.php';

	$id= mysqli_real_escape_string($conn, $_POST['join_id']);
	$pw= mysqli_real_escape_string($conn, $_POST['join_pw']);
	$name= mysqli_real_escape_string($conn, $_POST['join_name']);
	$phn= mysqli_real_escape_string($conn, $_POST['join_phn']);

	$sql = "SELECT * FROM data_board WHERE user_id='$id'";
	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result)){
		echo '<script>alert("이미 존재하는 아이디 입니다!"); history.back();</script>';
	} else{
 		 $sql= "INSERT INTO data_board (user_id, user_pw, user_name, user_phn) VALUES ('$id', '$pw', '$name', '$phn')";

		 if($result = mysqli_query($conn, $sql)){
		 	mysqli_close($conn);
		 	echo '<script>alert("가입 완료!"); location.href="./list.php"; </script>';
		 } else{
			 	mysqli_close();
				echo '<script>alert(가입 오류); location.href="./list.php"; </script>';
		}
	}
 ?>
