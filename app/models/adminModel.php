<?php 

class adminModel extends model{
	public $user = '';

	public function selectByName($name)
	{
		$res = $this->db->admin()->where('username', $name)->limit(1);
		return $res;
	}

	public function exists($field, $value)
	{
		$res = $this->db->admin()->where($field, $value)->limit(1);
		return $res;
	}

	public function getIdBySession()
	{
		$username = $_SESSION['admin']['username'];
		$user = $this->selectByName($username);
		if($user)
		{
			foreach($user as $v)
			{
				$id = $v['id'];
			}
		}
		return $id;
	}

	public function insertBySingle($data)
	{
		$res = $this->db->admin()->insert($data);
		$insertID = $this->admin()->insert_id();
		return $insertId;
	}
}
?>