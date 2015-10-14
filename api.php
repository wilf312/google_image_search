<?php

$search = isset($_GET['w']) ? $_GET['w'] : "";


if ( $search === "" ) {
    exit("キーワードを入力してください");
}

$API_KEY        = 'YOUR_KEY';       // APIキー
$SEARCH_ID      = 'YOUR_SEARCH_ID'; // 検索エンジンID
$searchWord     = $search;          // 検索ワード

//インスタンス生成、検索
require 'GoogleImageSearch.class.php';
use Google\Lib as Google;
$Image = new Google\GoogleImageSearch($API_KEY, $SEARCH_ID);
$data = $Image->search($searchWord);


echo json_encode($data->items );



