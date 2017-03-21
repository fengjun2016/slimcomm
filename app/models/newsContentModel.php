<?php 

class newsContentModel extends model{
	public function getNewsContentByNewsId($newsId)
	{
		$res = $this->db->news_content()->where('news_id', $newsId)->limit(1);
		return $res;
	}
}


?>