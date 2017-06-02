<?php
    App::uses('AppHelper', 'View/Helper');  
       
    class CommonHelper extends AppHelper {  
       
        //private $whatDay;  
      
        public function getScheduleDay( $schedule = null ){  
			 $s=explode(',',$schedule);
			 
 			if(isset($schedule)){
				for ($i = 0 ; $i < count($s); $i++) {
					if ($s[$i] == '0') {
						echo '日,';
					}
					if ($s[$i] == '1') {
						echo '月,';
					}
					if ($s[$i] == '2') {
						echo '火,';
					}
					if ($s[$i] == '3') {
						echo '水,';
					}
					if ($s[$i] == '4') {
						echo '木,';
					}
					if ($s[$i] == '5') {
						echo '金,';
					}
					if ($s[$i] == '6') {
						echo '土,';
					}
				}
			}
        }  
    }  
?>