<?php 

include('../function/functions.php');

//フォームのデータ受け取り
$name = $_POST["name"];
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];
$lpw=password_hash($lpw, PASSWORD_BCRYPT);

$pdo=db_con();

// 実行したいSQL文
$sql="INSERT INTO gs_user_table(id,name,lid,lpw,kanri_flg,life_flg) VALUE(null,:name,:lid,:lpw,1,1);";

//MySQLで実行したいSQLセット。プリペアーステートメントで後から値は入れる
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name',$name,PDO::PARAM_STR);
$stmt->bindValue(':lid',$lid,PDO::PARAM_STR);
$stmt->bindValue(':lpw',$lpw,PDO::PARAM_STR);

//実際に実行
$flag=$stmt->execute();

//実行完了した場合はentry.phpにリダイレクト
//失敗した場合はエラーメッセージ表示
if($flag==false){
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);
}else{
    header('Location: login.php');
    exit();
}

?>