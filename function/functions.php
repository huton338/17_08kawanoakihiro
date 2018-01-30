<?php
//共通で使うものを別ファイルにしておきましょう。

function confirm_session(){
    session_start();
    // ログイン状態チェック
    if (!isset($_SESSION["NAME"])) {
        header("Location: /kadai08/auth/Logout.php");
        exit;
    }
};

//DB接続関数（PDO）
function db_con(){
    try {
    $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','root');
    return $pdo;
    } catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
    }
};

//SQL処理エラー
function error_db_info($stmt){
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
};


//XSS:htmlspecialchars
function h($str){
    return htmlspecialchars($str, ENT_QUOTES);
};



?>
