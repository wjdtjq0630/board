<?php
  //호스팅 전용 config파일
  $db_host = "localhost";
  $db_user = "damn";
  $db_password = "wjdtjq0630!";
  $db_name = "damn";

  $conn = mysqli_connect($db_host,$db_user,$db_password,$db_name);

  if(mysqli_connect_errno($conn)){
    echo "데이터베이스 연결 실패:".mysqli_connect_error();
  }

  mysqli_query($conn, "set session character_set_connection=utf8;");
  mysqli_query($conn, "set session character_set_results=utf8;");
  mysqli_query($conn, "set session character_set_client=utf8;");
  header("Content-Type: text/html; charset=UTF-8");

  ?>
