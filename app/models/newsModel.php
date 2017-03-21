<?php 

class newsModel extends model{
	public function getNewsById($newsId)
	{
		$res = $this->db->news()->where('news_id', $newsId)->limit(1);
		return $res;
	}
}


?>