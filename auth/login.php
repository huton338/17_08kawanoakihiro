<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
    <link rel="stylesheet" href="css/sanitize.css"> 
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <h1>ログイン</h1>
    <form action="login_func.php" method="post">
        <ul>
            <li class="form-item">
                <label for="lid">ID</label>
                <input type="text" name="lid" id="lid" class="uk-input">
            </li>
            <li class="form-item">
                <label for="lpw">パスワード</label>
                <input type="text" name="lpw" id="lpw" class="uk-input">
        </ul>
        <input type="submit" value="ログイン">
    </form>
    <h1>新規登録</h1>
    <form action="add_user.php" method="post">
        <ul>
            <li class="form-item">
                <label for="lid">ID</label>
                <input type="text" name="lid" id="lid" class="uk-input"> 
            </li>
            <li class="form-item">
                <label for="name">ユーザー名</label>
                <input type="text" name="name" id="name" class="uk-input">
            <li class="form-item">
                <label for="lpw">パスワード</label>
                <input type="text" name="lpw" id="lpw" class="uk-input">
        </ul>
        <input type="submit" value="新規登録">
    </form>     
</div>
</body>
</html>