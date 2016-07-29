<?php
class basecommand
{
	public $paramNames;
	public $paramCount;
	public $userID;
	//public $userName;
	
	public function basecommand()
	{		
		//$this->userID=$_SESSION['user_id'];
		//$this->userID=1;
		//$this->userName=$_SESSION['user_name'];
	}
	public function display2($output)
	{
		echo "output=".json_encode($output);		
	}
	public function display($output)
	{
		echo json_encode($output);		
	}
	public function describe()
	{
		echo $this->paramNames."<br>";
		echo $this->paramCount."<br>";
		
	}
}

?>