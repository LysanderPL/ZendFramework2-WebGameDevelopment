<?php

namespace Library\Db\Entity;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /** @ORM\Column(type="integer", length=1) */
    protected $status;

    /** @ORM\Column(type="string", length=20, unique=true) */
    protected $login;

    /** @ORM\Column(type="string", length=20, unique=true) */
    protected $email;

    /** @ORM\Column(type="string") */
    protected $password;

    /** @ORM\Column(type="datetime") */
    protected $date_add;

    /**
     * @param int $int
     */
    public function setId(int $int)
    {
        $this->id = $int;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $int
     */
    public function setStatus(int $int)
    {
        $this->id = $int;
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->id;
    }

    /**
     * @param String $login
     */
    public function setLogin(String $login)
    {
        $this->login = $login;
    }

    /**
     * @return String
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param String $password
     */
    public function setPassword(String $password)
    {
        $this->password = md5($password);
    }

    /**
     * @return String
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @desc TODO more logic etc..
     * @param User $login
     * @param $password
     * @return bool
     */
    public static function checkPassword(User $login, $password)
    {
        return ($login->getPassword() == $password);
    }

    /**
     * @param String $email
     */
    public function setEmail(String $email)
    {
        $this->email = $email;
    }

    /**
     * @return String
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param \DateTime $dateTime
     */
    public function setDateAdd(\DateTime $dateTime)
    {
        $this->date_add = $dateTime;
    }

    /**
     * @return String
     */
    public function getDateAdd()
    {
        return $this->date_add;
    }


}

