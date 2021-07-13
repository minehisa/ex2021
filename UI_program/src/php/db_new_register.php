<?php

$register;

if(isset($_POST['address']) && isset($_POST['pass'])){

    $address = $_POST['address'];
    $pass = $_POST['pass'];

    // DB接続情報
    $dsn = "pgsql:host=133.71.3.90; dbname=practice;";
    $username = "dbuser";

    // try-catch
    try{
        // データベースへの接続を表すPDOインスタンスを生成
        $dbh = new PDO($dsn, $username);

        $salt = 'abcde12345abcde12345zz';
        $cost = 12;
        //SHA-512ハッシュ
        $hash = crypt( $pass, '$6$' . $cost . '$' . $salt . '$');
        
        // usertbにデータ追加
        $sql = "INSERT INTO usertb(address, password) VALUES ('$address', '$hash')";

        $data = $dbh->query($sql); 

        if( !empty($data) ) {
            echo $address, "を登録しました。";
            $register = true;
        }else{
            echo $address, "は登録できませんでした。";
            $register = false;
        }
    } catch(PDOException $e) {
        
        echo $e->getMessage();
        die();
    }
    // 接続を閉じる
    $dbh = null;
}else{
    echo "アドレスとパスワードを両方入力してください。";
}

if($register){
    echo "TOP画面に戻ります。";
    echo '<meta http-equiv="Refresh" content="1; url=./../Top.html">';
}else{
    echo "新規登録画面に戻ります。";
    echo '<meta http-equiv="Refresh" content="1; url=./../html/new_register.html">';
}

?>
