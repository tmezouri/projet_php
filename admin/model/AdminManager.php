<?php

namespace JeanForteroche\Blog\Model\Admin;

class Manager
{
	protected function dbConnect()
	{
		$db = new \PDO('mysql:host=localhost;dbname=projet_php', 'root', '');
		return $db;
	}
}
