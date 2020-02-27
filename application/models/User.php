<?php
namespace Application\Models;

use Application\Core\Model;

class User extends Model
{
    public function authorization($email, $password)
    {
        $q = "SELECT * 
        FROM `users` 
        WHERE (email='$email')";
        $res = $this->dbSelectRow($q);
        if ($password == $res['password']) {
            $_SESSION['user'] = $res;
        }
    }

    public function registration($name, $forename, $email, $password, $gender, $birthday = null)
    {
        $q = 'INSERT INTO `users`(`name`, `forename`, `email`, `password`, `gender`';
        $q .= ($birthday)?', `birthday`)':')';
        $q .= " VALUES ('$name', '$forename', '$email', '$password', $gender";
        $q .= ($birthday)?",'$birthday')":')';
        $this->dbQuery($q);
        $this->authorization($email, $password);
    }

    public function logout()
    {
        unset($_SESSION['user']);
    }
}
