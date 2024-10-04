<!DOCTYPE html>
<html>
<head>
    <meta charset="EUC-KR">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>withplan admin</title>
    <style>
    	.admin > button{width: calc(25% - 5px); box-sizing: border-box; height: 45px; font-size:15px;}
    	.admin > button:nth-child(2){background:red; color:#fff}
    </style>
</head>
<body>
    withplan admin<br/>
    
    <!-- withplan 버튼 생성 -->
    <div class="admin">
	    <button onclick="callStart()">Start</button>
	    <button onclick="callStop()">Stop</button>
	    <button onclick="callLog()">Log</button>
	    <button onclick="callConfirm()">확인</button>
	</div>
    <!-- iframe 추가 -->
    <iframe id="iframeTarget" name="iframeTarget" style="width: 100%; height: calc(100% - 55px); border: 1px solid black; display: block; position: absolute; box-sizing: border-box; right: 0;"></iframe>

    <!-- 자바스크립트로 버튼 클릭 시 iframe 타겟으로 페이지 로드 -->
    <script>
    function callStart() {
    	if(confirm("Start하시겠습니까?")){
    		document.getElementById('iframeTarget').src = 'start.php';  // iframe에서 start.php 실행
    	};
    }
    function callStop() {
    	if(confirm("Stop하시겠습니까?")){
    		document.getElementById('iframeTarget').src = 'stop.php';   // iframe에서 stop.php 실행
    	}
    }
    function callLog() {
        document.getElementById('iframeTarget').src = 'log.html';    // iframe에서 log.php 실행
    }

    // 확인 버튼 클릭 시 https://withplankorea.com/ 로드 시도
    function callConfirm() {
        var iframe = document.getElementById('iframeTarget');
        var url = 'https://withplankorea.com/';
        
        // try to load the URL in iframe
        try {
            iframe.src = url;
        } catch (e) {
            // if it fails, open in a new window (popup)
            window.open(url, '_blank');
        }

        // Check if iframe is blocked due to HTTPS restriction
        setTimeout(function() {
            if (iframe.contentWindow.location.href === 'about:blank') {
                // if iframe fails to load, open in a new window
                window.open(url, '_blank');
            }
        }, 1000); // delay to check if iframe loaded successfully
    }
    callConfirm();
    </script>
</body>
</html>
