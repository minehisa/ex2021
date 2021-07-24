<?php

if(isset($paperid)){

    // DB接続情報
    $dsn = "pgsql:host=133.71.3.90; dbname=practice;";
    $username = "dbuser";


    // try-catch
    try{
        // データベースへの接続を表すPDOインスタンスを生成
        $dbh = new PDO($dsn, $username);

        $sql = "SELECT * FROM paperdetail WHERE paperid='$paperid'";
        $data = $dbh->query($sql);

        if( !empty($data) ) {
            foreach( $data as $value ) {
                $papername = $value['papername'];
                $author = $value['author'];
                $journal = $value['journal'];
                $yearofpublic = $value['yearofpublic'];
            //    $paperpdf = $value['paperpdf'];
            }
        }

    } catch(PDOException $e) {
        echo $e->getMessage();
        die();
    }

    // 接続を閉じる
    $dbh = null;
    
}else{
    echo "paperidを入力してください";
}

?>