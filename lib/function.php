<?php 

function E($msg) {
	header('content-type:text/html;charset=utf-8');
	die('<pre>.htmlspecialchars($msg)</pre>');
}
function show($status, $message, $data1=array())
{
	$result = array('status'=>$status, 'message'=>$message, 'data'=>$data1);
	exit(json_encode($result));
}

?>