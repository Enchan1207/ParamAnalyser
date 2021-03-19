<?php
#
# リクエスト情報解析
#
require_once 'vendor/autoload.php';

# HTTPリクエストを復元

# リクエスト行 {method} {uri} {http_version}
$requestRow = $_SERVER['REQUEST_METHOD'] . " " . $_SERVER['REQUEST_URI'] . " " . $_SERVER['SERVER_PROTOCOL'];

# リクエストヘッダ
$requestHeadersArray = [];
foreach (apache_request_headers() as $key => $value) {
    array_push($requestHeadersArray, $key . ": " . $value);
}
$requestHeaders = implode("\n", $requestHeadersArray);

# リクエストボディ
$requestBody = file_get_contents("php://input");

# まとめてリクエスト文字列を生成
$request = implode("\n", [$requestRow, $requestHeaders, "", $requestBody]);

# ファイルに保存
date_default_timezone_set('Asia/Tokyo');
$savedPath = "log/".date("Ymd_His", time()).".http";
file_put_contents($savedPath, $request);

# 過去ログのパスを取得
$logFiles = [];
foreach(glob('log/*') as $file){
    if(is_file($file)){
        array_push($logFiles, $file);
    }
}

# twigに投げてテンプレからダミーページを生成
$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader);

# 表示!
echo $twig->render('index.html.twig', [
    'savedPath' => $savedPath,
    'logs' => $logFiles
]);
