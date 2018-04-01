<?php
  include 'config.php';
  session_start();

  $id = $_POST['id'];
  $sql = "SELECT * FROM comment_board WHERE id='$id'";
  $row = mysqli_fetch_array(mysqli_query($conn, $sql));
  $writer = $row['name'];
  $bbs_id = $row['bbs_id'];
  $comment = $_POST['comment'];
  if(empty($_SESSION['user_id']) || empty($_SESSION['user_name'])){
    echo '<script>alert("로그인 후 이용해주세요."); window.history.back();</script>';
    exit;
  } else if($_SESSION['user_id'] != $writer){
      echo '<script>alert("자신의 댓글만 삭제할 수 있습니다."); history.back();</script>';
      exit;
    }

  if(strlen($comment)<5){
    echo "<script>alert('댓글을 5글자 이상 입력하세요!'); history.back();</script>";
    exit;
  }
  $sql = "UPDATE comment_board SET comment='$comment' WHERE id='$id'";
  if(!$result = mysqli_query($conn, $sql)){
    echo "<script>alert('댓글 수정 오류!'); history.back();</script>";
  } else{
      echo '<script>alert("댓글 수정 완료!"); location.href="./content.php?id='.$bbs_id.'";</script>';
  }
 ?>
