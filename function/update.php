<?php
include('functions.php');
//1.POSTでParamを取得
confirm_session();

//入力チェック(受信確認処理追加)
if(
    !isset($_POST["name"]) || $_POST["name"]=="" ||
    !isset($_POST["email"]) || $_POST["email"]=="" ||
    !isset($_POST["naiyou"]) || $_POST["naiyou"]==""||
    !isset($_POST["id"]) || $_POST["id"]==""
  ){
    exit('ParamError');
  }

  $name   = $_POST["name"];
  $email  = $_POST["email"];
  $naiyou = $_POST["naiyou"];
  $id = $_POST["id"];

//2.DB接続など
$pdo=db_con();

//3.UPDATE gs_an_table SET ....; で更新(bindValue)
//　基本的にinsert.phpの処理の流れです。
$update = $pdo->prepare("UPDATE gs_an_table SET name=:name,email=:email,naiyou=:naiyou WHERE id=:id");
$update->bindValue(':name',$name,PDO::PARAM_STR);
$update->bindValue(':email',$email,PDO::PARAM_STR);
$update->bindValue(':naiyou',$naiyou,PDO::PARAM_STR);
$update->bindValue(':id',$id,PDO::PARAM_INT);
$status = $update->execute();

//４．データ登録処理後
if($status==false){
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    error_db_info($stmt);
  }else{
    //５．index.phpへリダイレクト
    header("Location: select.php");
    exit;
  }

?>
