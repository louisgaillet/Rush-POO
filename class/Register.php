<?php 

	class User {

		protected $statusOkay = true;
		protected $is_admin;
		public $error = "<div class='alert alert-success' role='alert'>";


		public function __construct($bdd)
		{
			$this->bdd = $bdd;
		}

		//______ SETTER _______ //

		public function setName($name)
		{

			if ( strlen($name) < 3 || strlen($name) > 15)
			{
				$this->error .="<p> Invalid name</p>";
				$this->statusOkay = false;
			}

			$this->name=$name;
		}

		protected function  setEmail($email)
		{
			if( filter_var($email, FILTER_VALIDATE_EMAIL) == false)
				{
					$this->error .="<p> Invalid email</p>";
					$this->statusOkay = false;
				}
			$this->email=$email;
		}

		protected function setPassword($password, $password_confirmation)
		{

			if(strcmp($password, $password_confirmation) != 0)
			{
				$this->error .="<p> Invalid password or password confirmation </p>";
				$this->statusOkay = false;
			}

			if ( strlen($password) < 3 || strlen($password_confirmation) > 10)
			{
				$this->error .="<p> Invalid password or password confirmation </p>";
				$this->statusOkay = false;
			}
			$password = password_hash($password, PASSWORD_DEFAULT);
			$this->password = $password;
		}

		protected function setPasswordBdd($email)
		{
			$sth=$this->bdd->prepare("SELECT * FROM users WHERE email = ?"); 
			$sth->execute(array($email));
			$result = $sth->fetch();
			$this->passwordBDD=$result['password'];
			$this->name = $result['username'];
			$this->admin = $result['admin'];
			$this->id = $result['id'];
			$_SESSION['id'] =  $result['id'];
		}

		public function setPower($id)
		{
			$sth=$this->bdd->prepare("SELECT admin FROM users WHERE id = ?"); 
			$sth->execute(array($id));
			$result = $sth->fetch();
			$this->power = $result['admin'] ;
		}



		//______ GETTER _______ //

		public function getName()
		{
			return $this->name;
		}

		public function getId()
		{
			return $this->id;
		}

		public function getEmail($id)
		{
			$sth=$this->bdd->prepare("SELECT email FROM users WHERE id = ?"); 
			$sth->execute(array($id));
			$result = $sth->fetch();
			return $result['email'];
		}

		public function getPass()
		{
			return $this->password;
		}

		public function getpower()
		{
			return $this->power;
		}

		protected function getPasswordBdd()
		{
			return $this->passwordBDD;
		}

		public function getError()
		{
			return $this->error;
		}

		public function getStatus()
		{
			return $this->statusOkay;
		}


		//______ METHODS _______ //

		public function createUser($name, $email, $password,$password_confirmation, $is_admin)
		{
			$this->setName($name);
			$this->setEmail($email);
			$this->setPassword($password, $password_confirmation);
			$this->is_admin = $is_admin;
			$this->pushInDB($this->name, $this->email, $this->password, $this->is_admin, $this->bdd);
		}

		public function pushInDB ($name, $email, $password, $is_admin, $bdd)
		{
			// Verifier si email exist
			if ($this->statusOkay == true) {
				$sth=$bdd->prepare("INSERT INTO users (username, password, email, admin ) VALUES(?, ?, ?, ?)"); 
				$sth->execute(array($name,$password,$email,$is_admin));
				$count = $sth->rowCount();
				if($count > 0)
				$this->error .= "<p> User ".$name." created</p>";
			}
		} 

		public function login($email, $password, $remember)
		{

			$this->email = $email;
			$this->password = $password;
			$this->remember = $remember;
			$this->setPasswordBdd($email);
			$this->verifyPassword($this->password,$this->passwordBDD);
		}

		protected function verifyPassword($password, $passwordBDD)
		{
			if (password_verify ($password,$passwordBDD) ) { 
				$_SESSION['id'] = $this->id;
				 if ($this->admin == '1') {
				 	setcookie('admin', $this->admin, time() + 365*24*3600, '/', 'localhost',false, true);
				 }

				if ( $this->remember == "on" ) {
					setcookie('name', $this->name, time() + 365*24*3600, '/', 'localhost',false, true);
				}

				// header("Location: ./index.php");
				// exit;
			}
			else{
				$this->statusOkay = false;
				$this->error .= "<p> Incorrect email/password</p>";
			}
		}

		public function __destruct()
		{
			$this->error .= "</div>";
		}

	}
?>