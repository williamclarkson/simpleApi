<?php

class db_Database
{
    private $_dbh;
    private $_stmt;
    private $_queryCounter = 0;
	public $q;
	
    public function __construct()
    {
		
		
		$user="root";
		$pass="";
		$dbname="userDatabase";
		
        $dsn = 'mysql:host=localhost;dbname=' . $dbname;
        //$dsn = 'sqlite:myDatabase.sq3';
        //$dsn = 'sqlite::memory:';
        $options = array(
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                    PDO::ATTR_PERSISTENT => true
                    );
        try {
            $this->_dbh = new PDO($dsn, $user, $pass, $options);
        }
        catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public function query($query)
    {
		$this->q=$query;
        $this->_stmt = $this->_dbh->prepare($query);
    }

    public function bind($pos, $value, $type = null)
    {
		
		$this->q=str_replace($pos,"'".$value."'",$this->q);
		
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->_stmt->bindValue($pos, $value, $type);
    }

    public function execute()
    {
        $this->_queryCounter++;
        return $this->_stmt->execute();
    }

    public function resultset()
    {
        $this->execute();
        return $this->_stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function single()
    {
        $this->execute();
        return $this->_stmt->fetch(PDO::FETCH_ASSOC);
    }

    // returns last insert ID
    //!!!! if called inside a transaction, must call it before closing the transaction!!!!!!
    public function lastInsertId()
    {
        return $this->_dbh->lastInsertId();
    }

    // begin transaction // must be innoDatabase table
    public function beginTransaction()
    {
        return $this->_dbh->beginTransaction();
    }

    // end transaction
    public function endTransaction()
    {
        return $this->_dbh->commit();
    }

    // cancel transaction
    public function cancelTransaction()
    {
        return $this->_dbh->rollBack();
    }

    // returns number of rows updated, deleted, or inserted
    public function rowCount()
    {
        return $this->_stmt->rowCount();
    }

    // returns number of queries executed
    public function queryCounter()
    {
        return $this->_queryCounter;
    }

    public function debugDumpParams()
    {
        return $this->_stmt->debugDumpParams();
    }

}
