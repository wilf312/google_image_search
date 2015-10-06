<?php


$API_KEY        = 'YOUR_KEY';       // APIキー
$SEARCH_ID      = 'YOUR_SEARCH_ID'; // 検索エンジンID
$searchWord     = '猫';             // 検索ワード

//インスタンス生成、検索
require 'GoogleImageSearch.class.php';
use Google\Lib as Google;
$Image = new Google\GoogleImageSearch($API_KEY, $SEARCH_ID);
$json = $Image->search($searchWord);



//APIから戻ってきたデータを出力
//画像と画像が載っているページヘのリンクをHTML出力
$html = '';
foreach($json->items as $key => $val){

    $html .= <<<EOT
<a href="{$val->image->contextLink}" target="_blank">
<img src="{$val->link}" width="{$val->image->width}" height="{$val->image->height}" >
</a>
EOT;

}

?>


<!DOCTYPE html>
<html>
<head>
    <style>
        img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
<?php echo $html; ?>
</body>
</html>