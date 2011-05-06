<?php
	class Tofu extends ObjectType
	{
		public
		// 	Object Data
			$type,		// String Field
			$size,		// String Field
			$weight,	// Integer Field
		
		//	Relation Data
			$from = 'Tofus', // Model

		// Object Validation
			$validate = 'allAreNotEmpty,
						 typeAndSizeAreValidInput,
						 typeAndSizeAreLongerThan4,
						 weightIsInteger,
						 weightIsGreaterThan2,
						 weightIsUnique';
		
		public function getWeightInPounds()
		{
			// Extend Tofu Object
			return int($this->weight/2.2);
		}
	}


