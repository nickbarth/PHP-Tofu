<?php
	class Apple extends Model
	{
		public
		// 	Object Data
			$type,		// String Field
			$size,		// String Field
			$weight,	// Integer Field
		
		// Object Validation
			$validate = 'allAreNotEmpty,
                   typeAndSizeAreValidInput,
                   typeAndSizeAreLongerThan4,
                   weightIsInteger,
                   weightIsGreaterThan2,
                   weightIsUnique';
		
    // Instance Methods
		public function getWeightInPounds()
		{
			// Extend Tofu Object
			return int($this->weight/2.2);
		}

    // Class Methods
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
