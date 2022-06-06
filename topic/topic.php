<?php
$conn = mysqli_connect(
  'localhost',
  'hankjjin',
  '1234',
  'sungkyul');

  $filtered = array(
    'stNUM'=>mysqli_real_escape_string($conn, $_POST['stNUM']),
    'name'=>mysqli_real_escape_string($conn, $_POST['name']),
    'temperature'=>mysqli_real_escape_string($conn, $_POST['temperature'])
  );

$sql = "
  INSERT INTO topic
    (stNUM, name, temperature, created)
    VALUES(
      '{$filtered['stNUM']}',
      '{$filtered['name']}',
      '{$filtered['temperature']}',
        NOW()
    )
";
$result = mysqli_query($conn, $sql);
if($result === false){
  echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요';
  error_log(mysqli_error($conn));
} else {
  echo '성공했습니다. <a href="topic.php">돌아가기</a>';
}
?>