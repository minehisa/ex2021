<?php

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

        $sql = "SELECT * FROM usertb WHERE address='$address'";

        $data = $dbh->query($sql);

        if( !empty($data) ) {
            foreach( $data as $value ) {
                echo "id=", $value['id'], "のユーザー", $address, "で、";
                if($hash == $value['password']){
                    echo "ログイン成功しました。";
                }else{
                    echo "ログイン失敗しました。";
                }
            }
        }

    } catch(PDOException $e) {
        echo $e->getMessage();
        die();
    }

    // 接続を閉じる
    $dbh = null;
}
?>