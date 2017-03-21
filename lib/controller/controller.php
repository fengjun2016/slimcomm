<?php 

class controller{

	public function __call($name, $args)
	{
		E('the function does not exists');
	}
}

?>