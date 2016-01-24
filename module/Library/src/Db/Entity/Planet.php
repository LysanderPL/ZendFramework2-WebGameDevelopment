<?php
/**
 * Created by PhpStorm.
 * User: mkruszewski
 * Date: 24.01.16
 * Time: 15:17
 */

namespace Library\Db\Entity;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity */
class Planet
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;
    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user_id;
    /**
     * @ORM\Column(type="integer")
     */
    protected $planet_free_space;
    /**
     * @ORM\Column(type="integer")
     */
    protected $planet_max_space;
    /**
     * @ORM\Column(type="integer")
     */
    protected $planet_population;
    /**
     * @ORM\Column(type="integer")
     */
    protected $planet_max_population;
    /**
     * @ORM\Column(type="integer")
     */
    protected $planet_last_resource_update;
    /**
     * @ORM\Column(type="integer")
     */
    protected $planet_size;
    /**
     * @ORM\Column(type="integer")
     */
    protected $planet_metal_storage;
    /**
     * @ORM\Column(type="integer")
     */
    protected $planet_metal_per_hour;
    /**
     * @ORM\Column(type="integer")
     */
    protected $planet_metal_max_storage;
    /**
     * @ORM\Column(type="integer", length=4)
     */
    protected $planet_pollution;
    /**
     * @ORM\Column(type="integer", length=1)
     */
    protected $planet_class;
    /**
     * @ORM\Column(type="string", length=20)
     */
    protected $planet_name;

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
    public function setUserId(int $int)
    {
        $this->user_id = $int;
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param int $int
     */
    public function setPlanetMetalStorage(int $int)
    {
        $this->planet_metal_storage = $int;
    }

    /**
     * @return int
     */
    public function getPlanetMetalStorage()
    {
        return $this->planet_metal_storage;
    }

    /**
     * @param int $int
     */
    public function setPlanetMetalPerHour(int $int)
    {
        $this->planet_metal_per_hour = $int;
    }

    /**
     * @return int
     */
    public function getPlanetMetalPerHour()
    {
        return $this->planet_metal_per_hour;
    }

    /**
     * @param int $int
     */
    public function setPlanetMetalMaxStorage(int $int)
    {
        $this->planet_metal_max_storage = $int;
    }

    /**
     * @return int
     */
    public function getPlanetMetalMaxStorage()
    {
        return $this->planet_metal_max_storage;
    }

    /**
     * @param int $int
     */
    public function setPlanetLastResourceUpdate(int $int)
    {
        $this->planet_last_resource_update = $int;
    }

    /**
     * @return int
     */
    public function getPlanetLastResourceUpdate()
    {
        return $this->planet_last_resource_update;
    }

}