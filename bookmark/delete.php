<?php
// 関数ファイルの読み込み
include('functions.php'); //関数を記述したファイルの読み込み
$pdo = db_conn(); //関数実行

//1. GETデータ取得
$id   = $_GET['id'];

//2. DB接続します(エラー処理追加)
//3．データ登録SQL作成
$stmt = $pdo->prepare('DELETE FROM gs_bm_table WHERE id=:id');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//4．データ登録処理後
if ($status==false) {
    errorMsg($stmt);
} else {
    //select.phpへリダイレクト
    header('Location: select.php');
    exit;
}
