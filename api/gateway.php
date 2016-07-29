<?php


require_once("commands/basecommand.php");



if (!isset($_POST['callNumber']))
{
	$call=$_GET['callNumber'];	
}
else
{
    $call   = $_POST['callNumber'];
}
if (!isset($_POST['z']))
{
    if (isset($_GET['z']))
    {
        $z=$_GET['z'];
    }
	else
    {
        $z="";
    }
}
else
{
    $z   = $_POST['z'];
}




$params = explode("|", $z);


function __autoload($class)
{
    // convert namespace to full file path
    $class = 'classes/' . str_replace('\\', '/', $class);
    $class = str_replace("_", "/", $class) . ".class.php";
    
    //echo "loading class=".$class;
    
	
	
    if (!file_exists($class)) {
        $class = str_replace("classes", "commands", $class);
        $class = str_replace("class.php", "command.php", $class);
    }
   //  $class = str_replace(".php.php", "", $class).".php";
	
	
    if (file_exists($class)) {
        require_once($class);
    } else {
        echo "class not found---" . $class;
    }
}

$database = new db_Database();

$database->query("select * from system_api where callNum=:callNum");
$database->bind(":callNum", $call);
$set = $database->resultset();




$len = $database->rowCount();

if ($len > 0) {
    $package = $set[0]['package'];
    $cname   = $set[0]['class'];
    //echo $package;
    $path    = "commands/" . $package . "/" . $cname . ".command.php";
   
    if (file_exists($path)) {
        require_once($path);
        $c = new $cname();
        call_user_func_array(array(
            $c,
            'execute'
        ), $params);
    } else {
        echo "path not found " . $path;
    }
} else {
    echo "no such command";
    
}
?>


