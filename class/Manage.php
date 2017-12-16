<?php require_once('Register.php') ?>
<?php 
	class Manage extends User{

		public function __construct($bdd)
		{
			$this->bdd = $bdd;
		}

		//_________ SETER

		protected function setPasswordBdd($id)
		{
			$sth=$this->bdd->prepare("SELECT * FROM users WHERE id = ?"); 
			$sth->execute(array($id));
			$result = $sth->fetch();
			$this->passwordBDD=$result['password'];
		}

		// METHODS

		public function showAllUsers()
		{
			$list = '';
			$sth=$this->bdd->prepare("SELECT * FROM users"); 
			$sth->execute();
			$result = $sth->fetchAll();
			return $result;
		}

		public function remove($id)
		{
			$sth=$this->bdd->prepare("DELETE FROM users WHERE id = ? "); 
			$sth->execute(array($id));
			$count = $sth->rowCount();
				if ($count > 0) {
					//return true;
				}
		}

		public function updateProfil($id, $name, $email, $password,$password_confirmation)
		{

			$emailBdd = $this->getEmail($id);
			$this->setName($name);
			$this->setEmail($email);

			if ($password == "") {
				$this->setPasswordBdd($id);
				$this->password =  $this->passwordBDD;
			}
			else{
				$this->setPassword($password, $password_confirmation);	
			}

			if ($this->statusOkay == true) {

				$sth=$this->bdd->prepare("UPDATE users SET username = ?, password = ?, email = ? WHERE id = ? "); 
				$try=$sth->execute(array($this->name, $this->password, $this->email, $id));
				$count = $sth->rowCount();
					if ($count > 0) 
					{
						$_SESSION['login'] = $this->name;

						 if (isset( $_COOKIE['name']) ){
						 	 setcookie('name', $this->name, time() + 365*24*3600, '/', 'localhost',false, true);
						 }
					}		
			}
		}


	}
?>