<?php

include_once "class.database.php";

class main {
	
	public function grapToevoegen($naam, $email, $grap){
		
		$db = new MysqliDb ('odil.io', 'odil_io_matig', 'HVssHAF74dgu', 'odil_io_matig');
		
		$data = Array ("naam" => $naam,
				"email" => $email,
				"grap" => $grap
		);
		$id = $db->insert('matig', $data);
		
	}
	
	public function grapLaden($id){
		
		$db = new MysqliDb ('odil.io', 'odil_io_matig', 'HVssHAF74dgu', 'odil_io_matig');
		
		$query = "SELECT Naam, Email, Grap FROM matig WHERE id='$id' LIMIT 1";
		
		$grap = $db->rawQuery($query);
		
		return $grap[0];
		
	}
	
	public function sloganMaker(){}
	
	public function telGrappen(){
		
		$db = new MysqliDb ('odil.io', 'odil_io_matig', 'HVssHAF74dgu', 'odil_io_matig');
		
		$query = "SELECT COUNT(`id`) AS Aantal FROM matig";
		
		$index = $db->rawQuery($query);
		
		return $index[0]["Aantal"];
		
	}
	
	public function hahaha($id){
		$db = new MysqliDb ('odil.io', 'odil_io_matig', 'HVssHAF74dgu', 'odil_io_matig');
		
		$query = "SELECT hahahaCounter FROM matig WHERE id='$id' LIMIT 1";
		$hahahaCounter = $db->rawQuery($query);
		
		$hahaha = $hahahaCounter[0]["hahahaCounter"];
		
		$nieuwHahaha = $hahaha + 1;
		
		$query = "UPDATE matig SET hahahaCounter = '$nieuwHahaha' WHERE id = $id";
		
		$db->rawQuery($query);
				
	}
	public function matig($id){
		$db = new MysqliDb ('odil.io', 'odil_io_matig', 'HVssHAF74dgu', 'odil_io_matig');
		
		$query = "SELECT matigCounter FROM matig WHERE id='$id' LIMIT 1";
		$matigCounter = $db->rawQuery($query);
		
		$matig = $matigCounter[0]["matigCounter"];
		
		$nieuwMatig = $matig + 1;
		
		$query = "UPDATE matig SET matigCounter = '$nieuwMatig' WHERE id = $id";
		
		$db->rawQuery($query);
		
	}
	
}



?>