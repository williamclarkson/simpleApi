<?PHP
session_start();
if (file_exists("../basecommand.php"))
{
	include("../basecommand.php");
}
class getusersession extends basecommand
{
	
	public function getuserinfo()
	{
		parent::__construct();
		
	}
	public function execute()
	{
		if (isset($_SESSION['userSession']))
		{
			$sess=$_SESSION['userSession'];
		}
		else
		{
			$sess=-1;
		}
	//echo "session=".$sess;
		
		$sArray=array("sid"=>$sess);
		
		$this->display($sArray);
	}

}

?>