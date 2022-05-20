


<h1>登録データ一覧</h1>
<table>
    <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Description</th>
    <th>Image</th>
    <th>Date Created</th>
    </tr>
<?php
// ファイルを開く
$openfile = fopen('data/item_list.csv', 'r');

// ファイル内容を1行ずつ読み込んでテーブル出力
while($str = fgets($openfile)){
    $arr = explode(",",$str);
    echo "<tr>";
    echo "<td>".$arr[0]."</td>";
    echo "<td>".$arr[1]."</td>";
    echo "<td>".$arr[2]."</td>";
    echo '<td><img src="'.$arr[3].'" alt=""></td>';
    echo "<td>".$arr[4]."</tb>";

    echo "</tr>";
}

// ファイルを閉じる
fclose($openfile);
?>
<table>

<ul>
    <li><a href="item_read.php">確認する</a></li>
    <li><a href="item_add.php">戻る</a></li>
</ul>