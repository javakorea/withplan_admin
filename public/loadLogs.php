<?php
// 로그 파일 경로
$logFile = '/home/ubuntu/nohup.out';

// 요청으로 받은 시작 줄 번호와 한 번에 불러올 줄 수 (1만 줄로 설정)
$linesToLoad = isset($_GET['lines']) ? intval($_GET['lines']) : 10000;
$offset = isset($_GET['offset']) ? intval($_GET['offset']) : 0;

// JSON 응답 헤더 설정
header('Content-Type: application/json');

// 파일이 존재하는지 확인
if (file_exists($logFile)) {
    $fileSize = filesize($logFile); // 파일 크기를 바이트 단위로 가져옴
    $fileSizeMB = $fileSize / (1024 * 1024); // MB 단위로 변환
    
    $file = new SplFileObject($logFile, 'r');
    $file->seek(PHP_INT_MAX); // 파일의 끝으로 이동
    $totalLines = $file->key(); // 전체 줄 수 가져오기

    // 더 이상 읽을 데이터가 없으면 빈 응답을 전송하고 종료
    if ($offset >= $totalLines) {
        echo json_encode([
            'data' => '',
            'endOfFile' => true,
            'fileSize' => $fileSizeMB
        ]);
        exit;
    }

    // 새로 읽을 시작점 계산
    $startLine = max(0, $totalLines - $offset - $linesToLoad);
    $endLine = max(0, $totalLines - $offset);

    $logLines = [];
    $file->seek($startLine); // 시작 줄로 이동
    while ($file->key() < $endLine && !$file->eof()) {
        $logLines[] = $file->fgets(); // 로그 라인을 배열에 저장
    }
    $logLines = array_reverse($logLines); // 배열을 역순으로 변환 (최신 로그가 위로 가도록)

    // JSON 응답 전송 (로그 데이터와 endOfFile 플래그, 파일 크기 전송)
    echo json_encode([
        'data' => nl2br(implode("", $logLines)),
        'endOfFile' => false,
        'fileSize' => $fileSizeMB
    ]);
} else {
    // 파일이 없을 경우 JSON으로 오류 메시지 전송
    echo json_encode([
        'data' => 'nohup.out 파일을 찾을 수 없습니다.',
        'endOfFile' => true,
        'fileSize' => 0
    ]);
}
?>
