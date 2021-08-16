<?php

$id = Auth::id();

if(isset($id)){

    // DB接続情報
    $dsn = "pgsql:host=postgres; port=5432; dbname=postgres;";
    $username = "default";
    $pass = "secret";


    // DB接続情報(学校)
/*  $dsn = "pgsql:host=133.71.3.90; dbname=practice;";
    $username = "dbuser";
*/

    $papername;
    $updatetime;
    $regitime;
    $paperid;

    // try-catch
    try{
        // データベースへの接続を表すPDOインスタンスを生成
        $dbh = new PDO($dsn, $username, $pass);

        $sql = "SELECT * FROM paperbasic WHERE id='$id';";
        $data = $dbh->query($sql);

        if( !empty($data) ) {
            foreach( $data as $value ) {
                $updatetime = $value['updatetime'];
                $regitime = $value['regittime'];
                $paperid = $value['paperid'];

                $sql_details = "SELECT * FROM paperdetails WHERE paperid='$paperid';";
                $data_details = $dbh->query($sql_details);
                if( !empty($data_details) ) {
                    $papername = "論文名を入力";
                    foreach( $data_details as $value_details ) {
                        $papername = $value_details['papername'];
                    }
                }else{
                    $papername = "論文名未登録";
                }
                echo "<tr>";
                echo "<td>";
                echo "<input type='checkbox' name='checkbox[]' value='$paperid' form='delete'>";
                echo "</td>";
                echo "<td>$papername</td>";
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