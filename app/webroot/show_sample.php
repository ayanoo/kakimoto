<?php
require('../../get_instagram/config.php');


$myAccessToken ='2321263900.bc6ff7f.a4ddb957d83b4f5b84d63c1c2c2be905'; //instagram Accesstoken

$json = file_get_contents('https://api.instagram.com/v1/users/self/media/recent/?access_token='.$myAccessToken);

$obj = json_decode($json);

foreach($obj->data as $data){
    echo '<img src="'.$data->images->low_resolution->url.'" alt="">';
	echo '<br >';
	echo $data->link;
	echo '<br >';
	echo $data->caption->created_time.'  ';
	echo date( 'Y/m/d H:i' , $data->caption->created_time ) ;
	echo '<br >';
	echo $data->caption->text;
	echo '<br >';
	print_r($data->tags);
	echo '<br >';
	echo implode(",", $data->tags);
	echo '<br >';
	echo $data->id;
	echo '<br ><br ><br >';
		
}
?>