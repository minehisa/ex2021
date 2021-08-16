<?php

if(isset($_POST['title']) && isset($_POST['author']) && isset($_POST['journal']) && isset($_POST['year'])){

    $userid = Auth::id();                //現在ログインしているユーザのidを代入
    $title = $_POST['title'];
    $author = $_POST['author'];
    $journal = $_POST['journal'];
    $year = $_POST['year'];
    $paperid;
    //現在時間取得
    $updatetime = date('Y-m-d H:i:s');
    $regitime = date('Y-m-d H:i:s');
    //pdfファイルの情報取得
/*    $filename = $_FILES['file']['name'];
    $filesize = $_FILES['file']['size'];
*/
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
        //$dbh = new PDO($dsn, $username);

        // paperbasicにデータ追加
/*        $sql_insert = "INSERT INTO public.paperbasic(id, papername, updatetime, regitime) 
                VALUES ($userid, '$title', '$updatetime', '$regitime');";
  */
        $sql_insert = "INSERT INTO public.paperbasic(id, updatetime, regittime) 
        VALUES ($userid, '$updatetime', '$regitime') RETURNING paperid;";

        $data = $dbh->query($sql_insert); 

        if( !empty($data) ) {
            echo $title, "を登録しました。";
            $paper_add = true;
            foreach( $data as $value ) {
                $paperid = $value[0];
            }
        }else{
            echo $title, "は登録できませんでした。";
            $paper_add = false;
        }


        // paperdetailにデータ追加


        $stmt = $dbh->prepare("INSERT INTO public.paperdetails(paperid, papername, author, journal, yearofpublic, paperpdf) 
                                 values (?, ?, ?, ?, ?, ?)");
        /*
        $fp = fopen($_FILES['file']['tmp_name'], 'rb');
        if($fp === false){
            echo "pdfをオープンできませんでした。";
        }
        */

        $stmt->bindParam(1, $paperid);
        $stmt->bindParam(2, $title);
        $stmt->bindParam(3, $author);
        $stmt->bindParam(4, $journal);
        $stmt->bindParam(5, $year);
        $stmt->bindParam(6, $year);  //とりあえずpdfのところに年月日を入れておく
        //$stmt->bindParam(6, $fp, PDO::PARAM_LOB);
        
        $dbh->beginTransaction();
        $stmt->execute();
        $dbh->commit();

    } catch(PDOException $e) {
        
        echo $e->getMessage();
        die();
    }
    // 接続を閉じる
    $dbh = null;
}else{
    //echo "必要事項を入力してください。";
}

?>
