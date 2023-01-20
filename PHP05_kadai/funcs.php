<?php
//XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}

// ログインチェック処理
function loginCheck()
{
    if (!isset($_SESSION['chk_ssid']) || $_SESSION['chk_ssid'] != session_id()) {
        header('Location: login.php?login_error=1');
        exit();
    } else {
        session_regenerate_id(true);
        $_SESSION['chk_ssid'] = session_id();
    }
}


//DB接続
function db_conn()
{
    try {
        $db_name = 'gs_db5k';    //データベース名
        $db_id   = 'root';      //アカウント名
        $db_pw   = '';      //パスワード：XAMPPはパスワード無しに修正してください。
        $db_host = 'localhost'; //DBホスト
        $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
        return $pdo;
    } catch (PDOException $e) {
        exit('DB Connection Error:' . $e->getMessage());
    }
}

//SQLエラー
function sql_error($stmt)
{
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit('SQLError:' . $error[2]);
}

//リダイレクト
function redirect($file_name)
{
    header('Location: ' . $file_name);
    exit();
}

//SessionCheck
function sschk()
{
}
