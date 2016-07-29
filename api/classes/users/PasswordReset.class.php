<?php
/**
* 
*/
class users_PasswordReset
{
	
	function __construct()
	{
		# code...
	}

	public function reset($user)
	{
		$nPass=$this->makeNewPass();
		$user->updatePassword(md5($nPass));
		return $nPass;
	}

	private function makeNewPass()
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < 10; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
}


?>