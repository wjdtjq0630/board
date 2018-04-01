<?php
  include 'config.php';
  session_start();

  $id = $_GET['id'];
  $sql = "SELECT * FROM comment_board WHERE id='$id'";
  $row = mysqli_fetch_array(mysqli_query($conn, $sql));
  $writer = $row['name'];

  if(empty($_SESSION['user_id']) || empty($_SESSION['user_name'])){
    echo '<script>alert("로그인 후 이용해주세요."); window.history.back();</script>';
    exit;
  } else if($_SESSION['user_id'] != $writer){
      echo '<script>alert("자신의 댓글만 삭제할 수 있습니다."); history.back();</script>';
      exit;
    }
  $sql = "SELECT * FROM comment_board WHERE id='$id'";
  $row = mysqli_fetch_array(mysqli_query($conn, $sql));
  $comment = $row['comment'];
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="edit.css">
    <title>댓글 수정</title>
  </head>
  <body>
    <form action="edit_commentdb.php" method="post">
      <h2>댓글 수정</h2>
      <input type="hidden" name="id" value="<?php echo $id; ?>">
      <textarea name="comment" rows="3" cols="80" minlength="5" id="comment"><?php echo $comment; ?></textarea><input type="submit" value="등록" class="submit_comment">
    </form>
  </body>
</html>
