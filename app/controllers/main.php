<?php
	class Main extends Controller
	{
		public function index()
		{
			// Tofu Listing Page
			$this->tofus = Tofu::findAll();
		}
		
		public function view($tofuID = null)
		{
			// Single Tofu Page
			$this->tofu = Tofu::find($tofuID);
		}
		
		public function create()
		{
			// Create an Tofu Page
      $this->tofu = Tofu::create($_POST['tofu']);
		}
		
		public function update($tofuID = null)
		{
			// Update an Tofu
			$this->tofu = Tofu::find($tofuID);
      $this->tofu->update($_POST['tofu']);
		}
		
		public function remove($tofuID = null)
		{
			// Confirm and Delete an Tofu
			$this->tofu = Tofu::find($tofuID);
      $this->tofu->remove($_POST['tofu']);
		}
	}
