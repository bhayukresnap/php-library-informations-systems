<?php 
	require_once($_SERVER["DOCUMENT_ROOT"]."/src/Database.php");
	class Type extends Database{
		
		public function __construct(){
			parent::__construct();
			$this->table = "types";
			$this->columns = [
				"book_type",
			];
		}

		public function insert($value){
			$insert = parent::insert($value);
			if(!$insert){
				$this->message = "$value is already exist!";
			}else{
				$this->message = "$value has been added to database!";
				$this->status = 1;
			}
			Helper::notification($this->message, $this->status);
			exit(header("location: ".Helper::currentURL()));
		}

		public function update($values = []){
			$update = parent::update($values);
			if(!$update){
				$this->message = "Duplicate entry is found!";
			}else{
				$this->message = "Data has been successfully updated!";
				$this->status = 1;
			}
			Helper::notification($this->message, $this->status);
			exit(header("location: ".Helper::currentURL()));
		}
	}

 ?>