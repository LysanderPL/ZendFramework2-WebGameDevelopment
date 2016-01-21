<?php
namespace Application\Entity\UsersTable;

use Doctrine\ORM\Mapping as ORM;
use Zend\Form\Element\DateTime;

/** @ORM\Entity */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /** @ORM\Column(type="string") */
    protected $Name;

    /** @ORM\Column(type="string") */
    protected $Password;

    /** @ORM\Column(type="datetime") */
    protected $DateUserAdd;

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
     * @param String $string
     */
    public function setName(String $string)
    {
        $this->Name = $string;
    }

    /**
     * @return String
     */
    public function getName()
    {
        return $this->Name;
    }

    /**
     * @param String $string
     */
    public function setPassword(String $string)
    {
        $this->Password = $string;
    }

    /**
     * @return String
     */
    public function getPassword()
    {
        return $this->Password;
    }

    /**
     * @param DateTime $dateTime
     */
    public function setDateUserAdd(DateTime $dateTime)
    {
        $this->DateUserAdd = $dateTime;
    }

    /**
     * @return String
     */
    public function getDateUserAdd()
    {
        return $this->DateUserAdd;
    }


}

