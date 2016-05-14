<?php

include("configure.php");

function backup_db() {

	/* Store All Table nams in an Array */
	$allTables = array();
	$result = mysqli_query('SHOW TABLES');
	while ($row = mysqli_fetch_row($result)) {
		$allTables[] = $row[0];

	}

	foreach ($allTables as $table) {
		$result = mysqli_query('SELECT * FROM '.$table);
		$num_fields = mysqli_num_fields($result);

		$return.= 'DROP TABLE IF EXISTS '.$tables.';';
		$row2 = mysqli_fetch_row(mysqli_query('SHOW CREATE TABLE '.$table));
		$result.= "\n\n".$row2[1].";\n\n";

		for ($i = 0; $i < $num_fields; $i++) {
			while ($row = mysqli_fetch_row($result)) {
				$return.= 'INSERT INTO '.$table.' VALUES(';

				for ($j = 0; $j < $num_fields; $j++) {
					$row[$j] = addslashes($row[$j]);
					$row[$j] = str_replace("\n", "\\n", $row[$j]);

					if (isset($row[$j])) {
						$return.= '"'.$row[$j].'"' ;
					} else {
						$return.= '""';
					}

					if ($j < ($num_fields - 1)) {
						$return.= ',';
					}
				}
				$return.= ");\n";
			}
		}
		$return.="\n\n";
	}

	$folder = 'DB_Backup/';
	if (!is_dir($folder)) {
		mkdir($folder, 0777, true);
		chmod($folder, 0777);
	}

	$date = date('m-d-Y-H-i-s', time());
	$filename = $folder."db-backup-".$date;

	$handle = fopen($filename.'.sql', 'w+');
	fwrite($handle, $return);
	fclose($handle);

}

function deleteOldestBackup($dirName="") {

}

backup_db();

?>