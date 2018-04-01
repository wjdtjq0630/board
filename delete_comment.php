<?php
  include 'config.php';
  session_start();

  $id = mysqli_real_escape_string($conn, $_GET['id']);
  $sql = "SELECT * FROM comment_board WHERE id='$id'";
  $row = mysqli_fetch_array(mysqli_query($conn, $sql));
  $user_id = $_SESSION['user_id'];
  $bbs_id = $row['bbs_id'];
  if($row['name'] != $user_id){
    echo "<script>alert('자신이 작성한 댓글만 삭제할 수 있습니다!'); history.back();</script>";
    exit;
  }

  $sql = "DELETE FROM comment_board WHERE id='$id'";
  if(!$result = mysqli_query($conn, $sql)){
    echo "<script>alert('삭제 오류!'); history.back();</script>";
    exit;
  } else{
    echo "<script>alert('삭제 완료'); location.href='./content.php?id=$bbs_id';</script>";
    exit;
  }


 ?>
