<?php
if(isset($id)){

    // DB接続情報
    $dsn = "pgsql:host=133.71.3.90; dbname=practice;";
    $username = "dbuser";

    // try-catch
    try{
        // データベースへの接続を表すPDOインスタンスを生成
        $dbh = new PDO($dsn, $username);

        $sql = "SELECT * FROM paperbasic WHERE id='$id'";
        $data = $dbh->query($sql);

        if( !empty($data) ) {
            foreach( $data as $value ) {
                $papername = $value['papername'];
                $updatetime = $value['updatetime'];
                $regitime = $value['regitime'];
                $paperid = $value['paperid'];
                echo "<tr>";
                echo "<td>";
                echo "<input type='checkbox' name='checkbox[]' value='$paperid' form='delete'>";
                echo "</td>";
                echo "<td> <a href=\"./../html/paper_detail.php?paperid=$paperid\" target=\"_blank\">$papername </a> </td>";  
            //    echo "<td>$papername</td>";
                echo "<td>$updatetime</td>";
                echo "<td>$regitime</td>";
                echo "</tr>";
            }
        }

    } catch(PDOException $e) {
        echo $e->getMessage();
        die();
    }

    // 接続を閉じる
    $dbh = null;
    
}else{
    echo "idを入力してください";
}

?>