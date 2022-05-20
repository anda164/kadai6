<?php

//自動採番関数 (第一引数：プレフィックス、第二引数：文字列長（裁定８）)
function auto_num($prefix, $length=8){
    if($length<8){
        $length = 8;
    }
    $json=file_get_contents('./data/num.json');
    
    $jsondata = json_decode($json,true);

    $jsondata[$prefix] =(int)$jsondata[$prefix]+1;

    $jsonstr =  json_encode($jsondata, JSON_UNESCAPED_UNICODE);

    file_put_contents("./data/num.json", $jsonstr);
    return $prefix.str_pad($jsondata[$prefix], $length-strlen($prefix), '0', STR_PAD_LEFT);
}

//ID自動採番
$prefix = "AA";
$item_id = auto_num($prefix, $length=8);
//　記入時間
$time = date('Y/m/d H:i:s');

//画像を保存
if(!empty($_FILES)){
    $filename = $_FILES['upload_image']['name'];
    $uploaded_path = './images/'.$item_id."_".$filename;

    $result = move_uploaded_file($_FILES['upload_image']['tmp_name'],$uploaded_path);
 
    if($result){
      $MSG = '画像アップロード成功！ファイル名：'.$filename;
      $img_path = $uploaded_path;
    }else{
      $MSG = '画像アップロード失敗！エラーコード：'.$_FILES['upload_image']['error'];
    }

} else {
    $MSG = '画像を選択してください';
}

// ファイルに書き込み
$item_name = $_POST["item_name"];
$item_desc = $_POST["item_desc"];
$out_path = "./data/item_list.csv";

$file = fopen($out_path, "a"); //ファイルOPEN
$dline = "{$item_id},{$_POST['item_name']},{$_POST['item_desc']},{$img_path},{$time}".PHP_EOL;
$fw = fwrite($file, $dline);

fclose( $file ); //ファイル閉じる


?>


<html>

<head>
    <meta charset="utf-8">
    <title>File書き込み</title>
</head>

<body>
    <!-- データ更新メッセージ （更新成功/失敗） -->
    <?php if($fw){;?>
        <h1><?php echo $_POST["item_name"]; ?> を登録しました。</h1>
        <h2>Item ID: <?php echo $item_id; ?></h2>
        <h2>保存先: <?php echo $out_path; ?></h2>
    <?php } else { ?>
        <h1><?php echo $_POST["item_name"]; ?> の登録に失敗しました。</h1>
    <?php } ;?>


    <!--  画像登録結果メッセージ -->
    <p><?php if(!empty($MSG)) echo $MSG;?></p>
    
    <!-- 登録画像 -->
    <?php if(!empty($img_path)){;?>
        <img src="<?php echo $img_path;?>" alt="">
    <?php } ;?>

    <ul>
        <li><a href="item_read.php">確認する</a></li>
        <li><a href="item_add.php">戻る</a></li>
    </ul>
</body>

</html>
<?php


?>