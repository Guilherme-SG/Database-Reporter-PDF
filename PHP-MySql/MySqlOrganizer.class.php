<?php 
class MySqlOrganizer {
	public static function organizeInAssociativeArray($result) {
		/* Each row will be within an enumerated 
		array representing the result columns */
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}

		return $data;
	}
}
?>