<?php 

class commentServices{

	//return array
	protected function getCommentsByNewsId($newsId)
	{
		$comments = new commentsModel();
		$res = $comments->getCommentsByNewsId($newsId);
		foreach ($res as $v) {
			$row["id"] = $v["id"];
			$row["upid"] = $v["upid"];
			$row["status"] = $v["status"];
			$row["username"] = $v["username"];
			$row["news_id"] = $v["news_id"];
			$row["time"] = $v["time"];
			$result[] = $row;
		}
		return $result;
	}

	//return html
	protected function commentArr2Html($comment_arr)
	{
		$str = '';
		if(is_array($comment_arr) && !empty($comment_arr)){
			$str .= '<div id="commentHolder">';

			foreach($comment_arr as $key=>$value){
				$str .= '<div class="comment">';
				$str .= '<p class="title"><a href="#">'.$value['username'].'</a>';
				$str .= '<span>' . $value['time'] . 'post</span>';
				$str .= '</p>';

				global $temp_arr;
				$temp_arr = array();

				//这里去查找当前评论下的所有引用的评论,并格式化为html字符串
				$tmpStr = '';
				addCommentNode($comment_arr, $value);
				krsort($temp_arr);   //根据key倒序排序数组
				$tmpStr = getChildComment($temp_arr);   //添加所有的引用评论
				$str .= $tmpStr;

				$str .= "<p>" . $value['content'] . "</p>";
				$str .= '</div>';
			}
			$str .= '</div>';
		}
		return $str;
	}

	//把temp_arr数组中保存的引用评论信息转换为html形式
	public function getChildComment($temp_arr){
		$htmlStr = '';
		if(!is_array($temp_arr) || empty($temp_arr)){
			return '';
		}

		foreach()
	}
}

?>