<?php

namespace JeanForteroche\Blog\Model\Admin;

require_once('model/AdminManager.php');

class MembersManager extends Manager
{
  public function checkRights($pseudo)
  {
    $db = $this->dbConnect();
    $req = $db->prepare('SELECT pseudo, rights FROM members where pseudo = ?');
    $req->execute(array($pseudo));
    $member = $req->fetch();

    return $member;
  }

  public function changeRights($pseudo, $rights)
  {
    $db = $this->dbConnect();
    $member = $db->prepare('UPDATE members SET rights = :rights where pseudo = :pseudo');
    $member->execute(array('rights' => $rights, 'pseudo' => $pseudo));

    return $member;
  }
}
