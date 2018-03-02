<?php
	
	class Customers
	{
		private $id;
		private $email;
		private $password;
		private $first_name;
		private $last_name;
		private $sms;
		private $address;
		private $activated;
		private $token;
		private $date_created;

		function setId($id) { $this->id = $id; }
		function getId() { return $this->id; }
		function setEmail($email) { $this->email = $email; }
		function getEmail() { return $this->email; }
		function setPassword($password) { $this->password = $password; }
		function getPassword() { return $this->password; }
		function setFirst_name($first_name) { $this->first_name = $first_name; }
		function getFirst_name() { return $this->first_name; }
		function setLast_name($last_name) { $this->last_name = $last_name; }
		function getLast_name() { return $this->last_name; }
		function setSms($sms) { $this->sms = $sms; }
		function getSms() { return $this->sms; }
		function setAddress($address) { $this->address = $address; }
		function getAddress() { return $this->address; }
		function setActivated($activated) { $this->activated = $activated; }
		function getActivated() { return $this->activated; }
		function setToken($token) { $this->token = $token; }
		function getToken() { return $this->token; }
		function setDate_created($date_created) { $this->date_created = $date_created; }
		function getDate_created() { return $this->date_created; }

		function __construct()
		{
			require 'connect.php';
		}
	}
?>