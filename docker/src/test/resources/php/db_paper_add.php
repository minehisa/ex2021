<?php

$paper_add;
$userid;

if(isset($_GET['id']) && isset($_POST['title']) && isset($_POST['author']) && isset($_POST['journal']) && isset($_POST['year'])){

    $userid = $_GET['id'];                //現在ログインしているユーザのidを代入
    $title = $_POST['title'];
    $author = $_POST['author'];
    $journal = $_POST['journal'];
    $year = $_POST['year'];
    $paperid;
    //現在時間取得
    date_default_timezone_set ('Asia/Tokyo');
    $updatetime = date('Y-m-d H:i:s');
    $regitime = date('Y-m-d H:i:s');
    //pdfファイルの情報取得
    $filename = $_FILES['file']['name'];
    $filesize = $_FILES['file']['size'];

    // DB接続情報
    $dsn = "pgsql:host=133.71.3.90; dbname=practice;";
    $username = "dbuser";

    // try-catch
    try{
        // データベースへの接続を表すPDOインスタンスを生成
        $dbh = new PDO($dsn, $username);
  
        // paperbasicにデータ追加
        $sql_insert = "INSERT INTO paperbasic(id, papername, updatetime, regitime) 
                VALUES ($userid, '$title', '$updatetime', '$regitime');";
        $data = $dbh->query($sql_insert); 
        if( !empty($data) ) {
            echo $title, "を登録しました。";
            $paper_add = true;
        }else{
            echo $title, "は登録できませんでした。";
            $paper_add = false;
        }

        // paperbasicのpaperidを探す（上で追加したやつのpaperid） 
        $sql_select = "SELECT * FROM paperbasic WHERE id='$userid' AND papername='$title'";
        $data = $dbh->query($sql_select); 
        
        if( !empty($data) ) {
            foreach( $data as $value ) {
                $paperid = $value['paperid'];
            }
        }else{
            echo "paperが見つかりませんでした。";
        }

        // paperdetailにデータ追加
        $stmt = $dbh->prepare("INSERT INTO paperdetail(paperid, papername, author, journal, yearofpublic, paperpdf) 
                                 values (?, ?, ?, ?, ?, ?)");
        
        $fp = fopen($_FILES['file']['tmp_name'], 'rb');
        if($fp === false){
            echo "pdfをオープンできませんでした。";
        }
        
        $stmt->bindParam(1, $paperid);
        $stmt->bindParam(2, $title);
        $stmt->bindParam(3, $author);
        $stmt->bindParam(4, $journal);
        $stmt->bindParam(5, $year);
        $stmt->bindParam(6, $fp, PDO::PARAM_LOB);
        
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
    echo "必要事項を入力してください。";
}

echo "論文追加画面に遷移します。";
if($paper_add){
    echo "<meta http-equiv='Refresh' content='3; url=./../html/paper_add.php?id=$userid'>";
}else{
    echo "<meta http-equiv='Refresh' content='3; url=./../html/paper_add.php?id=$userid'>";
}

?>
