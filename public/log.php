<!DOCTYPE html>
<html>
<head>
<meta charset="EUC-KR">
<title>Insert title here</title>
</head>
<body>
<?php
// nohup.out 파일 경로
$logFile = '/home/ubuntu/nohup.out';

// 파일이 존재하는지 확인
if (file_exists($logFile)) {
    // 파일 내용을 읽어와서 출력
    $logContent = file_get_contents($logFile);
    echo nl2br($logContent); // 줄 바꿈을 HTML에 맞게 변환하여 출력
} else {
    echo "nohup.out 파일을 찾을 수 없습니다.";
}
?>

</body>
</html>