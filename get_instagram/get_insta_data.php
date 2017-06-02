<?php
/*
Name: get_insta_data
Instagramの写真データを取り込む */

// 環境変数の参照
require('./config.php');

//エラーログをon
ini_set('log_errors', 'On');
 
//エラーログの記録先を指定
ini_set('error_log', './insta.log');


if (!isset($argv)){
    $argv = '';
}
$getInsta = new get_insta($argv);
$getInsta->sendMail();

Class get_insta {
    public $url;
    public $appid = 'C8qci363a5z53NNA';
    public $secret = 'YyoeibYedKMNQfxn30MTMxIeq9Hdopd';
    public $myAccessToken = ACCESS_TOKEN;
    public $db_host = DB_HOST;
    public $db_name = DB_NAME;
    public $db_username = DB_USERNAME;
    public $db_pass = DB_PASS;
    
    public $subject = '【自動送信】Instagram取込エラー Kakimoto';
    
    public function __construct($argv) {
        if($argv == ''){
            $requestAppid = $this->_request('appid');
            $requestSecret = $this->_request('secret');
        } else {
            if (count($argv) > 1){
                $requestAppid = $argv[1];
                $requestSecret = $argv[2];
            } else {
                exit('error argv count');
            }
        }
        if(($this->appid == $requestAppid) AND ($this->secret == $requestSecret)){
            $this->url = 'https://api.instagram.com/v1/users/self/media/recent/?access_token='.$this->myAccessToken;
        } else {
            exit('error');
        }
    }

    protected function _getInInformation(){
        $lines = file_get_contents($this->url);
        if($lines){
            return $lines;
        }
        return '';
    }
 
 
    protected function _getImagePath($insta_id, $img_url){
        //「$directory_path」が存在するか確認
        // なければディレクトリ作成
        $directory_path = "/pic/".$insta_id;
        if(!file_exists("../Insta_kakimoto/app/webroot".$directory_path)){
            if (!mkdir("../Insta_kakimoto/app/webroot".$directory_path, 0777)) {
                error_log("error!".date('YmdHis').":  ディレクトリが作成できません。".$directory_path."\n", 3, "./insta.log");
                return "";
            }
        }

        // 画像ファイル名
        $img_filename =  date('YmdHis').".jpg";
        $img_path = $directory_path."/".$img_filename;

        $data = file_get_contents($img_url);        
        if (!file_put_contents("../Insta_kakimoto/app/webroot".$img_path, $data)) {
            error_log("error!".date('YmdHis').": ファイルコピー失敗 \n", 3, "./insta.log");
            return "";         
        }

	    return $img_path;
    }

   
    protected function _insertDB(){
        $lines = $this->_getInInformation();
        $obj = json_decode($lines);
        $error_cnt = 0;
       $insert_cnt = 0;
        
        // DB接続
        $mysqli = new mysqli( $this->db_host, $this->db_username , $this->db_pass, $this->db_name );
        if( $mysqli->connect_errno ) {
    	    error_log(date("Y-m-d H:i:s")." データベース接続エラー \n", 3, "./insta.log");
            exit ();
        }
        
	    // 文字セットを utf8 に変更します
	    $mysqli->set_charset("utf8");
   
          foreach($obj->data as $data){
                if ($result = $mysqli->query("SELECT id FROM photos where insta_id = '".$data->id."'")) {
                    // 結果セットの行数取得
                    $row_cnt = $result->num_rows;
                }

                // データが存在しないときはinsert
                if ($row_cnt == 0) {
                    
                    // アップロード・ディレクトリ取得
                    $img_dir = $this->_getImagePath($data->id, $data->images->standard_resolution->url);
                    
                    if ($img_dir) {
                        $query = "INSERT INTO photos (   insta_id, img_url,  img_dir, insta_url, caption, tags, post_date, created ) VALUES ( '". $data->id."', '".$data->images->standard_resolution->url."', '".$img_dir."','".$data->link."','".$data->caption->text."', '".implode(",", $data->tags)."', '".date( 'Y/m/d H:i' , $data->caption->created_time )."', NOW() )";
                        $insert_cnt = $insert_cnt + 1;

                        if( $mysqli->query( $query ) ) {
                            $error_cnt = $error_cnt + 0;
                        } else {
                            $error_cnt = $error_cnt + 1;
                            $error_data .=  $data->id.', ';
                        }
                    }else{
                        $error_cnt = $error_cnt + 1;
                        $error_data .=  '写真取得エラー: '.$data->id.', ';
                    }
                }
            }
            
            if ($error_cnt == 0) {
                error_log(date("Y-m-d H:i:s")." INSERT Success " .$insert_cnt ."件 \n", 3, "./insta.log");

                return true;
            }else{
                    $message = 'Insert Count '. $insert_cnt.'/n INSERT失敗  :'.$error_data;
                    error_log(date("Y-m-d H:i:s")." INSERTError!! " .$insert_cnt ."件 \n", 3, "./insta.log");
                    error_log($query ." \n", 3, "./insta.log");
                    
                    return $message;
            }
        
        // DB接続解除 
        $mysqli->close();
    }
 
 
    public function sendMail(){
        $lines = $this->_insertDB();

        // insertエラーがある場合はメール送信
        if ($lines !== true) {
            
            // メッセージをセット
            $todayMessage = $lines;

            // 送り先
            $sendTo = 'ayanoo9@gmail.com';
            // 送信元
            $sendFromMail = 'test_week@example.com';
            // header
            $sendHeaders = "From: test_week@example.com\r\n";
            // subject
            $sendSubject = $this->subject;
            // bodyy
            $sendMessage = "■Insertエラーがありました。■\n\n". $todayMessage;
            //送信処理
            mb_language('ja');
            mb_internal_encoding('UTF-8');
            if (mb_send_mail($sendTo, $sendSubject, $sendMessage, $sendHeaders)) {
                echo 'send mail success';
            }else{
                echo 'send mail failed';
            }
        } else{
            echo 'done!';
        }
    }

    protected function _request($field){
        if (isset($_GET[$field])){
            return $this->_sanitize($_GET[$field]);
        }
        return '';
    }

    protected function _sanitize($arr){
        if(is_array($arr)){
            foreach($arr as $key => $var){
                if(is_array($var)){
                    $arr[$key] = $this->_sanitize($var);
                }else{
                    $arr[$key] = htmlspecialchars($var);
                }
            }
        } else {
            return htmlspecialchars($arr);
        }
        return $arr;
    }
}