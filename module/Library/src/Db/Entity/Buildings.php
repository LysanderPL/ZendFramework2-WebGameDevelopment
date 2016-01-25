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
class Buildings
{
    /**
     * @ORM\Id
     * @ORM\OneToOne(targetEntity="Planet")
     * @ORM\JoinColumn(name="id", referencedColumnName="id")
     */
    protected $id;

    /** @ORM\Column(type="integer", length=2) */
    protected $metal_mine;

    /** @ORM\Column(type="integer", length=2) */
    protected $tech_center;

    /** @ORM\Column(type="integer", length=2) */
    protected $shipyard;

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
    public function getTechCenter()
    {
        return $this->tech_center;
    }

    /**
     * @param int $tech_center
     */
    public function setTechCenter($tech_center)
    {
        $this->tech_center = $tech_center;
    }

    /**
     * @return int
     */
    public function getMetalMine()
    {
        return $this->metal_mine;
    }

    /**
     * @param int $metal_mine
     */
    public function setMetalMine($metal_mine)
    {
        $this->metal_mine = $metal_mine;
    }

    /**
     * @return int
     */
    public function getShipyard()
    {
        return $this->shipyard;
    }

    /**
     * @param int $shipyard
     */
    public function setShipyard($shipyard)
    {
        $this->shipyard = $shipyard;
    }


}