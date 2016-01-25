<?php
/**
 * Created by PhpStorm.
 * User: mkruszewski
 * Date: 25.01.16
 * Time: 18:43
 */

namespace Library\Db\Entity;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity */
class Hangar
{
    /**
     * @ORM\Id
     * @ORM\OneToOne(targetEntity="Planet")
     * @ORM\JoinColumn(name="id", referencedColumnName="id")
     */
    protected $id;

    /** @ORM\Column(type="integer") */
    protected $light_ship;

    /** @ORM\Column(type="integer") */
    protected $heavy_ship;

    /** @ORM\Column(type="integer") */
    protected $light_frigate;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getLightShip()
    {
        return $this->light_ship;
    }

    /**
     * @param int $light_ship
     */
    public function setLightShip($light_ship)
    {
        $this->light_ship = $light_ship;
    }

    /**
     * @return int
     */
    public function getHeavyShip()
    {
        return $this->heavy_ship;
    }

    /**
     * @param int $heavy_ship
     */
    public function setHeavyShip($heavy_ship)
    {
        $this->heavy_ship = $heavy_ship;
    }

    /**
     * @return int
     */
    public function getLightFrigate()
    {
        return $this->light_frigate;
    }

    /**
     * @param int $light_frigate
     */
    public function setLightFrigate($light_frigate)
    {
        $this->light_frigate = $light_frigate;
    }
    
    
}