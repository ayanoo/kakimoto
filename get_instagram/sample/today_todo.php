<?php
/*
Name: today-todo
曜日別にメールを送信する */
if (!isset($argv)){
    $argv = '';
}
$todayTodo = new today_todo($argv);
$todayTodo->sendMail();

Class today_todo {
    public $filename;
    public $appid = 'C8qci363a5z53NNA';
    public $secret = 'YyoeibYedKMNQfxn30MTMxIeq9Hdopd';
    
    public $subject = '【自動送信】今日の予定';
    public $week;
    public $weekDayString = array('日曜日', '月曜日', '火曜日', '水曜日', '木曜日', '金曜日', '土曜日');
    
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
            $this->filename = 'week7369408.xxx';
        } else {
            exit('error');
        }
        $this->week = date('w');
    }

    public function checkFileExist(){
        // その日のファイルがあるかどうかをチェックする
         if (file_exists($this->filename)) {
            // ファイルあり
            return true;
        } else {
            // ファイルなし
            return false;
        }
    }
    protected function _getInInformation(){
        $lines = file_get_contents($this->filename);
        if($lines){
            return explode("\n", $lines);
        }
        return '';
    }
    
    public function sendMail(){
         if (file_exists($this->filename)) {
            // ファイルあり
            $lines = $this->_getInInformation();
        } else {
            // ファイルなし
            exit('error file not exist');
        }

        if (isset($lines[$this->week])) {
            // 今日のメッセージ
            $todayMessage = $lines[$this->week];
        } else {
            exit('week file error');
        }
        // 送り先
        $sendTo = 'ayanoo9@gmail.com';
        // 送信元
        $sendFromMail = 'test_week@example.com';
        // header
        $sendHeaders = "From: est_week@example.com\r\n";
        // subject
        $sendSubject = $this->subject;
        // bodyy
        $sendMessage = "■本日(". $this->weekDayString[$this->week]. ")の予定■\n\n". $todayMessage;
        //送信処理
        mb_language('ja');
        mb_internal_encoding('UTF-8');
        if (mb_send_mail($sendTo, $sendSubject, $sendMessage, $sendHeaders)) {
            echo 'send mail success';
        }else{
            echo 'send mail failed';
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