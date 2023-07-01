<?php 
highlight_file(__FILE__);
class Whu{
	public $flag;
	function __destruct(){
		if(preg_match('/\s|cat/is',$this->flag)){
			die('no hack');
		}
		system('ping -c 3 '.$this->flag);
	}
	function __wakeup(){
		if($this->flag!='127.0.0.1'){
			$this->flag='127.0.0.1';
		}
	}
}
unserialize($_GET['poc']);
?>