<?php

namespace JeanForteroche\Blog\Model;

require_once('model/Manager.php');

class MembersManager extends Manager
{
	public function availableName($pseudo)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT * FROM members WHERE pseudo = ?');
		$req->execute(array($pseudo));
		$pseudoexist = $req->rowcount();
		if ($pseudoexist == 0)
			return $submitOk = true;
	}

	public function addMember($pseudo, $hashed_pass, $email)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('INSERT INTO members(pseudo, pass, email, registration_date) VALUES ( ?, ?, ?, NOW())');
		$newMember = $req->execute(array($pseudo, $hashed_pass, $email));

		return $newMember;
	}
}
