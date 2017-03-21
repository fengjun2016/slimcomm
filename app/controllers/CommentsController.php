<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Slim\Container;

class CommentsController{
	protected $app;

	//构造函数
	public function __construct(Container $ci)
	{
		$this->app = $ci;
	}

	//get请求
	public function getAllComments(Request $request, Response $response, $args)
	{
		$newsId = $request->getAttribute('newsId');
		$comments = new CommentsModel();
		$data = $comments->getCommentsByNewsId($newsId, '_tree');
		foreach ($data as $v) {
			$result[] = $v;
		}
		$res["records"] = $result;
		return json_encode($res);
	}
}

?>