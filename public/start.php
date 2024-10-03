<!DOCTYPE html>
<html>
<head>
<meta charset="EUC-KR">
<title>Insert title here</title>
</head>
<body>
	start php<br/><br/>
<?php
// 셸 스크립트 실행
$command = 'sh /home/ubuntu/start-java.sh';

// 명령어 실행
$output = shell_exec($command);
echo $output;
?>


</body>
</html>