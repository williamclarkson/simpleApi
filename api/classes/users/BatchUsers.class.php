<?php

class users_BatchUsers
{
	public $users;
	private $processed;
	
	public function users_BatchUsers()
	{
		$this->users=array();		
		$this->processed=array();
	}	
	public function getUsers($ids)
	{
		
		
		$len=count($ids);
		for ($a=0;$a<$len;$a++)
		{
			$id=$ids[$a];			
			$user=new users_User($id);		
			
			if ($this->processed[$id]!=1)
			{
				array_push($this->users,$user->getPublicInfo());
				$this->processed[$id]=1;
			}
		}
		return $this->users;
	}
}

?>