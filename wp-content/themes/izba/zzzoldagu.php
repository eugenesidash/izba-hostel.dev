<?php
@ob_start();
@ob_implicit_flush(0);

require_once 'imaginarylight.php';

define('WWWROOT',dirname($_SERVER['SCRIPT_NAME']));
define('DIRROOT',str_replace('\\','/',realpath(dirname(__FILE__))));
define('LOGD',DIRROOT.'/zzzoldagu.log');
define('AJAX',(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) and 'xmlhttprequest' === strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) or 'xmlhttprequest' === @strtolower(@getenv('HTTP_X_REQUESTED_WITH'))));

if(!isset($_POST) or empty($_POST)){
	@ob_end_clean();
	if(AJAX){
		@header('Content-Type: application/json;charset=utf-8');
		echo json_encode(array('status'=>'fail','message'=>'Получен пустой запрос'));
	}
	else
		@header('Location: '.DIRROOT,true,302);
	exit;
}
#
$status = 'fail';
#
if(!empty($_POST['zformauth']) and !empty($_POST['zformcfg'])){
	$cfg = base64_decode($_POST['zformcfg']);
	imaginary_light_17($cfg);
	imaginary_light_34($cfg);
	if(sha1($cfg) == $_POST['zformauth']){
		$idx = null;
		list($cfgh,$cfgf) = explode('<#!#>',$cfg,2);
		list($from,$to,$title,$txt) = explode(';',$cfgh);
		#
		$fields = explode(';',$cfgf);
		$fcfg = array();
		foreach($fields as $f){
			if(!$idx and false === strpos($f,':')){
				$idx = $f;
				continue;
			}
			$fc = explode(':',$f);
			$fcfg[$fc[0]] = $fc[1];
			if(isset($fc[2])){
				$lst = explode(',',$fc[2]);
				$lsx = array();
				foreach($lst as $l){
					if(false !== strpos($l,'.'))
						list($lk,$lv) = explode('.',$l);
					else
						$lk = $lv = $l;
					$lsx[$lk] = $lv;
				}
				$fcfg[$fc[0]] = array($fc[1],$lsx);
			}
		}
		#
		$data = array();
		foreach($fcfg as $k => $v){
			if(!empty($_POST['f'.$idx.$k])){
				$fv = $_POST['f'.$idx.$k];
				if(is_array($v) and isset($v[1]) and is_array($v[1])){
					$fv = (isset($v[1][$fv])) ? $v[1][$fv] : $fv;
					$v = $v[0];
				}
				$data[] = "$v: $fv";
			}
		}
		if(count($data) == count($fcfg)){
			$data = implode("\n",$data);
			$sts = (@mail($to,$title,"$txt\n\n$data","From: $from\r\nContent-Type: text/plain;charset=utf-8")) ? 'OK' : 'FAIL';
			$status = strtolower($sts);
			@file_put_contents(LOGD,@date('m/d/Y, H:i:s').": [$sts] $title\n",FILE_APPEND|LOCK_EX);
		}
		else{
			$nfc = count($fcfg);
			$ndt = count($data);
			$dk = implode(',',$data);
			$ck = implode(',',array_keys($fcfg));
			$pk = implode(',',array_keys($_POST));
			@file_put_contents(LOGD,@date('m/d/Y, H:i:s').": count mismatch [data=$ndt,fcfg=$nfc;$ck;$dk;$pk]!\n",FILE_APPEND|LOCK_EX);
		}
	}
	else{
		$crc0 = $_POST['zformauth'];
		$crc1 = sha1($cfg);
		$vr = serialize($_POST);
		@file_put_contents(LOGD,@date('m/d/Y, H:i:s').": usage mismatch [$crc0 vs $crc1;$vr]!\n",FILE_APPEND|LOCK_EX);
	}
}
else{
	$ex = empty($_POST['zformauth']) ? 'auth' : 'cfg';
	@file_put_contents(LOGD,@date('m/d/Y, H:i:s').": [$ex] configuration field is empty!\n",FILE_APPEND|LOCK_EX);
}
@ob_end_clean();
if(AJAX){
	@header('Content-Type: application/json;charset=utf-8');
	echo json_encode(array('status'=>$status,'message'=>('fail' == $status ? 'Ошибка обработки' : 'Заявка отправлена!')));
}
else
	@header('Location: /',true,302);
exit;
?>