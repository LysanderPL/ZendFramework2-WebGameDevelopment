<?php
/**
 * Created by PhpStorm.
 * User: mkruszewski
 * Date: 25.01.16
 * Time: 18:44
 */

namespace Library\Db\Entity;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity */
class Technology
{
    /**
     * @ORM\Id
     * @ORM\OneToOne(targetEntity="User")
     * @ORM\JoinColumn(name="id", referencedColumnName="id")
     */
    protected $id;

    /** @ORM\Column(type="integer", length=2) */
    protected $metal_extraction_tech;

    /** @ORM\Column(type="integer", length=2) */
    protected $pollution_reduction_tech;

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
    public function getMetalExtractionTech()
    {
        return $this->metal_extraction_tech;
    }

    /**
     * @param int $metal_extraction_tech
     */
    public function setMetalExtractionTech($metal_extraction_tech)
    {
        $this->metal_extraction_tech = $metal_extraction_tech;
    }

    /**
     * @return int
     */
    public function getPollutionReductionTech()
    {
        return $this->pollution_reduction_tech;
    }

    /**
     * @param int $pollution_reduction_tech
     */
    public function setPollutionReductionTech($pollution_reduction_tech)
    {
        $this->pollution_reduction_tech = $pollution_reduction_tech;
    }
    
    
}