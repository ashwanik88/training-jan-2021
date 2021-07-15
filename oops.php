<?php 
class myClass{
	public function __construct(){
		echo 'constructor1';
		echo '<br>';
	}
	public function abc(){
		echo 'abc';
		echo '<br>';
		
		// $this->xyz();
	}
	
	protected function def(){
		echo 'def';
		echo '<br>';
	}

	private function xyz(){
		echo 'xyz';
		echo '<br>';
	}
}

class myClass2 extends myClass{
	public function __construct(){
		echo 'constructor2';
		echo '<br>';
	}
	public function lmn(){
		echo 'lmn';
		echo '<br>';
		$this->def();
	}
}

$obj1 = new myClass();
$obj = new myClass2();
$obj->abc();
$obj->lmn();


//$obj->def();
// $obj->xyz();