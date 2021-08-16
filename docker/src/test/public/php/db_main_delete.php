<?php

//$id = Auth::id();  別のところで定義されているので必要ない

if(isset($_GET['checkbox']) ){

    $checkbox = $_GET['checkbox'];

    // DB接続情報
    $dsn = "pgsql:host=postgres; port=5432; dbname=postgres;";
    $username = "default";
    $pass = "secret";


    // DB接続情報(学校)
/*  $dsn = "pgsql:host=133.71.3.90; dbname=practice;";
    $username = "dbuser";
*/
    // try-catch
    try{
        // データベースへの接続を表すPDOインスタンスを生成
        $dbh = new PDO($dsn, $username, $pass);
       
        $is_allDelete = true;
        foreach($checkbox as $delete_paperid){
            $sql = "DELETE FROM paperdetails WHERE paperid='$delete_paperid'";  //paperdetailから削除
            $data = $dbh->query($sql);
            $sql = "DELETE FROM paperbasic WHERE paperid='$delete_paperid'";   //paperbasicから削除
            $data = $dbh->query($sql);
            if( empty($data)) {
                $is_allDelete = false;
            }
        }
        
        if($is_allDelete){
            //echo "無事に削除できました。";
        }else{
            //echo "選択された一部もしくは全ての削除に失敗しました。";
        }

        
    } catch(PDOException $e) {
        echo $e->getMessage();
        die();
    }

    // 接続を閉じる
    $dbh = null;
    
}else{
    //echo "チェックを入れてください";
}

?>