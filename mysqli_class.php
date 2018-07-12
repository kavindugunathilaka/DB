<?php

/******************************************************
 * @author Viral Chauhan <viral.chauhan.vd@gmail.com> *
 ******************************************************/
class ViralDB
{
	private $link;
	public  $sql;
	public  $id;
	public 	$table;
	private $row_count;

	function __construct()
	{
		if(HOST == "" OR USERNAME == "" OR PASSWORD == "" OR DBNAME == ""){
			die("Please Enter DATABASE details in mysqli_conf.php file");
		}
		$this->link = new mysqli(HOST,USERNAME,PASSWORD,DBNAME);
		if($this->link->connect_errno > 0){
			die('Unable to connect to database [' . $this->link->connect_error . ']');
		}
	}

	public function query($sql){
		$result = mysqli_query($this->link,$sql) or die(mysqli_error($this->link));

		/* DEBUG TRUE OR FALSE BY CONFIG FILE*/
		if(DEBUG == true){
			echo "\n";
			echo ":::::::::::::::::::::::::\n";
			echo ":: mysqli_query Result ::\n";
			echo ":::::::::::::::::::::::::\n";
			echo "\n";
			print_r($result);
		}

		if($result->num_rows < 1){

			/* DEBUG TRUE OR FALSE BY CONFIG FILE*/
			if(DEBUG == true){
				echo "\n";
				echo "::::::::::::::::::::::::::::::::\n";
				echo ":: No Row Found by This Query ::\n";
				echo "::::::::::::::::::::::::::::::::\n";
				echo "\n";
			}
			return  '';
		}

		$result = mysqli_fetch_object($result);

		/* DEBUG TRUE OR FALSE BY CONFIG FILE*/
		if(DEBUG == true){
			echo "\n";
			echo "::::::::::::::::::::::::::::::::\n";
			echo ":: mysqli_fetch_object Result ::\n";
			echo "::::::::::::::::::::::::::::::::\n";
			echo "\n";
			print_r($result);
		}

		return $result;
	}


	public function find($id,$table){
		$sql = "SELECT * FROM $table WHERE id = $id";
		$result = mysqli_query($this->link,$sql) or die(mysqli_error($this->link));

		/* DEBUG TRUE OR FALSE BY CONFIG FILE*/
		if(DEBUG == true){
			echo "\n";
			echo ":::::::::::::::::::::::::\n";
			echo ":: mysqli_query Result ::\n";
			echo ":::::::::::::::::::::::::\n";
			echo "\n";
			print_r($result);
		}

		if($result->num_rows < 1){

			/* DEBUG TRUE OR FALSE BY CONFIG FILE*/
			if(DEBUG == true){
				echo "\n";
				echo "::::::::::::::::::::::::::::::::\n";
				echo ":: No Row Found by This Query ::\n";
				echo "::::::::::::::::::::::::::::::::\n";
				echo "\n";
			}
			return  '';
		}

		$result = mysqli_fetch_object($result);

		/* DEBUG TRUE OR FALSE BY CONFIG FILE*/
		if(DEBUG == true){
			echo "\n";
			echo "::::::::::::::::::::::::::::::::\n";
			echo ":: mysqli_fetch_object Result ::\n";
			echo "::::::::::::::::::::::::::::::::\n";
			echo "\n";
			print_r($result);
		}

		return $result;
	}

	public function close(){
		return $this->link->close();
	}


}
?>