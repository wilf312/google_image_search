<?php
namespace Google\Lib;

/**
 * Class GoogleImageSearch
 * @package Google\Lib
 */
class GoogleImageSearch
{
    private $API_KEY = ''; // APIキー
    private $SEARCH_ID = ''; // 検索エンジンID
    public $result = null;

    /**
     * @param string $API_KEY -  GoogleAPIキー
     * @param string $SEARCH_ID - Googleカスタム検索ID
     */
    public function __construct($API_KEY, $SEARCH_ID)
    {
        $this->setID($API_KEY, $SEARCH_ID);
    }


    /**
     * @param string $API_KEY -  GoogleAPIキー
     * @param string $SEARCH_ID - Googleカスタム検索ID
     */
    public function setID($API_KEY = '', $SEARCH_ID = '')
    {
        $this->API_KEY = $API_KEY;
        $this->SEARCH_ID = $SEARCH_ID;
    }

    /**
     * @param string $searchWord 検索ワード（実行時URLエンコードかけられる）
     * @return mixed|null
     */
    public function search($searchWord = '')
    {

        // $searchWordをURLエンコードして、URLの生成
        $encodedText = urlencode($searchWord);
        $API_url = "https://www.googleapis.com/customsearch/v1?key={$this->API_KEY}&cx={$this->SEARCH_ID}&searchType=image&q={$encodedText}";

        // APIを叩いてJSONをオブジェクトに変換、resultに格納、返す
        $data = file_get_contents($API_url);
        $this->result = json_decode($data);

        return $this->result;
    }
}
