<?php 
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
//use \interop\ContainerInterface;  //somethins wrong here
use \Slim\Container;

class HomeController
{
	protected $app;
	//构造函数
	public function __construct(Container $ci)
	{
		$this->app = $ci;
	}

	public function home(Request $request, Response $response, $args)
	{
		echo phpinfo();
	}
	
}
?>