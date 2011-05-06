<?php
	class Main extends Controller
	{
		public function index()
		{
			// Tofu Listing Page
			$this->tofus = Tofus::findAll();
		}
		
		public function view($tofuID = null)
		{
			// Single Tofu Page
			if (!$this->tofu = Tofus::find($tofuID))
				trigger_error('Tofu Not Found');
		}
		
		public function create()
		{
			// Create an Tofu Page
			if (!empty($_POST))
				$this->tofu = Tofus::create(
					$type 	= $_POST['type'],
					$size 	= $_POST['size'],
					$weight	= $_POST['weight']
				);
		}
		
		public function update($tofuID = null)
		{
			// Update an Tofu
			if (!$this->tofu = Tofus::find($tofuID))
				trigger_error("Tofu Not Found");
			if (!empty($_POST))
				$this->tofu->update(array(
					'type' 		=> $_POST['type'],
					'size'	 	=> $_POST['size'],
					'weight'	=> $_POST['weight']
				));
		}
		
		public function remove($tofuID = null)
		{
			// Confirm and Delete an Tofu
			if (!$this->tofu = Tofus::find($tofuID))
				trigger_error("Tofu Not Found.");
			if (!empty($_POST))
				$this->tofu->delete();
		}
	}
