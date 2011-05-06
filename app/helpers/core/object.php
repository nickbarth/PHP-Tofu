<?php
	abstract class ObjectType
	{
		public
			// Primary Key
			$id = 0;
		
		protected
			// Valid Object
			$isValid = true,
			$isRemoved = false,
			$isUpdated = false;
		
		public function __toString()
		{
			return get_called_class();
		}
		
		public function isValid()
		{
			// Check if Valid
			return $this->isValid;
		}
		
		public function isRemoved()
		{
			// Check if Removed
			return $this->isRemoved;
		}
		
		public function isUpdated()
		{
			// Check was Updated
			return $this->isUpdated;
		}
		
		public function setInvalid()
		{
			// Set Invalid Object
			$this->isValid = false;
		}
		
		public function getLog($var = null)
		{
			// Get Error Log
			return Validation::getErrors((string)$this, $var);
		}
		
		public function getObject()
		{
			// Get Called Class
			return get_parent_class($this);
		}
		
		public function delete()
		{
			// Delete Object From Database
			$object = $this->from;
			$object::delete($this->id);
			$this->isRemoved = true;
		}
		
		public function update($update)
		{
			// Update Object 
			foreach($update as $key => $value)
				$this->{$key} = $value;
			if ($this->Validate())
			{
				call_user_func(array($this->from, 'update'), $this);
				$this->isUpdated = true;
			} else $this->setInvalid();
		}
		
		public function Validate()
		{
			if (empty($this->validate))
				return true;
			$validators = explode(',', 
				preg_replace('/\s/', '', $this->validate));
			array_unshift($validators, $this);
			return call_user_func_array('Validation::check', $validators);
		}

	}