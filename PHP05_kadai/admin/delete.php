<?php
require_once('../funcs.php');
session_start();
loginCheck();

$pdo = db_conn();
$id = $_GET['id'];

// まず保存された画像があれば削除する。
// まず画像があるか確認
$stmt = $pdo->prepare("SELECT img FROM gs_content_table WHERE id=" . $id . ';');
$status = $stmt->execute();

// もし画像がある場合
if ($status) {
    $row = $stmt->fetch();
    $imgName = $row['img'];
    // unlink()で削除
    unlink('../images/' . $imgName);
}
// データの削除
$stmt = $pdo->prepare('DELETE FROM gs_content_table WHERE id = :id');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if (!$status) {
    sql_error($stmt);
} else {
    redirect('index.php');
}
