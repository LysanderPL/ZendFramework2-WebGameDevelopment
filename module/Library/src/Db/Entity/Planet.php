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
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param int $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @return int
     */
    public function getPlanetFreeSpace()
    {
        return $this->planet_free_space;
    }

    /**
     * @param int $planet_free_space
     */
    public function setPlanetFreeSpace($planet_free_space)
    {
        $this->planet_free_space = $planet_free_space;
    }

    /**
     * @return int
     */
    public function getPlanetMaxSpace()
    {
        return $this->planet_max_space;
    }

    /**
     * @param int $planet_max_space
     */
    public function setPlanetMaxSpace($planet_max_space)
    {
        $this->planet_max_space = $planet_max_space;
    }

    /**
     * @return int
     */
    public function getPlanetPopulation()
    {
        return $this->planet_population;
    }

    /**
     * @param int $planet_population
     */
    public function setPlanetPopulation($planet_population)
    {
        $this->planet_population = $planet_population;
    }

    /**
     * @return int
     */
    public function getPlanetLastResourceUpdate()
    {
        return $this->planet_last_resource_update;
    }

    /**
     * @param int $planet_last_resource_update
     */
    public function setPlanetLastResourceUpdate($planet_last_resource_update)
    {
        $this->planet_last_resource_update = $planet_last_resource_update;
    }

    /**
     * @return int
     */
    public function getPlanetSize()
    {
        return $this->planet_size;
    }

    /**
     * @param int $planet_size
     */
    public function setPlanetSize($planet_size)
    {
        $this->planet_size = $planet_size;
    }

    /**
     * @return int
     */
    public function getPlanetMaxPopulation()
    {
        return $this->planet_max_population;
    }

    /**
     * @param int $planet_max_population
     */
    public function setPlanetMaxPopulation($planet_max_population)
    {
        $this->planet_max_population = $planet_max_population;
    }

    /**
     * @return int
     */
    public function getPlanetMetalPerHour()
    {
        return $this->planet_metal_per_hour;
    }

    /**
     * @param int $planet_metal_per_hour
     */
    public function setPlanetMetalPerHour($planet_metal_per_hour)
    {
        $this->planet_metal_per_hour = $planet_metal_per_hour;
    }

    /**
     * @return int
     */
    public function getPlanetMetalMaxStorage()
    {
        return $this->planet_metal_max_storage;
    }

    /**
     * @param int $planet_metal_max_storage
     */
    public function setPlanetMetalMaxStorage($planet_metal_max_storage)
    {
        $this->planet_metal_max_storage = $planet_metal_max_storage;
    }

    /**
     * @return int
     */
    public function getPlanetClass()
    {
        return $this->planet_class;
    }

    /**
     * @param int $planet_class
     */
    public function setPlanetClass($planet_class)
    {
        $this->planet_class = $planet_class;
    }

    /**
     * @return String
     */
    public function getPlanetName()
    {
        return $this->planet_name;
    }

    /**
     * @param String $planet_name
     */
    public function setPlanetName($planet_name)
    {
        $this->planet_name = $planet_name;
    }

    /**
     * @return int
     */
    public function getPlanetPollution()
    {
        return $this->planet_pollution;
    }

    /**
     * @param int $planet_pollution
     */
    public function setPlanetPollution($planet_pollution)
    {
        $this->planet_pollution = $planet_pollution;
    }

    /**
     * @return int
     */
    public function getPlanetMetalStorage()
    {
        return $this->planet_metal_storage;
    }

    /**
     * @param int $planet_metal_storage
     */
    public function setPlanetMetalStorage($planet_metal_storage)
    {
        $this->planet_metal_storage = $planet_metal_storage;
    }


}