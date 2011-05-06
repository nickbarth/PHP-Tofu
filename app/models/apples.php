<?php
	class Tofus extends Model
	{
		public static
		//	Object Data
			$to = 'Tofu';
		
		public static function findSize($size)
		{
			// Find Tofu By Size
			return self::findWhere("size = :size", $small);
		}
		
		public static function findType($type)
		{
			// Find Tofu By Type
			return self::findWhere("type = :type", $type);
		}
	}
