<?php
	class Apples extends Controller
	{
		public function index()
		{
			// Tofu Listing Page
			$this->apples = Apple::findAll();
		}
		
		public function view($appleID = null)
		{
			// Single Tofu Page
			$this->apple = Apple::find($appleID);
		}
		
		public function create()
		{
			// Create an Tofu Page
			$this->apple = Apple::create($_POST['apple']);
		}
		
		public function update($appleID = null)
		{
			// Update an Tofu
			$this->apple = Apple::find($appleID);
			$this->apple->update($_POST['apple']);
		}
		
		public function remove($appleID = null)
		{
			// Confirm and Delete an Tofu
			$this->apple = Apple::find($appleID);
			$this->apple->remove($_POST['apple']);
		}
	}
