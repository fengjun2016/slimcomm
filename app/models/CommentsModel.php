<?php 

class CommentsModel extends model{

	//通过文章id来获取它下面所有的评论内容
	public function getCommentsByNewsId($newsId, $callback=false)
	{
		static $data = null;     //缓存数据库数据
		$data||$data = $this->db->comments()->where('news_id', $newsId);
		return $callback?$this->$callback($newsId):$data;
	}

	/**
	 * 查询树状数据
	 *array $arr 给定数据
	 *int $pid 指定从哪个节点开始找
	 */
	private function _tree($newsId, $upid=0, $level=0)
	{
		static $tree = array();
		$arr = $this->db->comments()->where(array('upid'=>$upid, 'news_id'=>$newsId));
		if($arr)
		{
			foreach ($arr as $v) {
				$v['level'] = $level;    //保存递归深度
				$tree[$v['id']] = $v;   //保存数据，并将id设置为数组下标
				$v['list'] = $this->_tree($newsId, $v['id'], $level+1);
			}
		}
		return $tree;
	}

}


?>