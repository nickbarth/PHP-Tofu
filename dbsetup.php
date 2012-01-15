<?php
	class DBSetup
	{
		public static function doSetup()
		{
			// Initialize Database
			@unlink("example.sqldb");
			$db = new PDO('sqlite:example.sqldb');
			$db->exec("
				CREATE TABLE Tofu
				(
					id INTEGER PRIMARY KEY AUTOINCREMENT,
					type STRING NOT NULL,
					size STRING NOT NULL,
					weight INTEGER NOT NULL
				)");
		}
	}
	
	DBSetup::doSetup();
