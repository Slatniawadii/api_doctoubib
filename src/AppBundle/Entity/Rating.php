<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * City
 *
 * @ORM\Table(name="rating")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RatingRepository")
 */
class Rating
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var Doctor
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Doctor")
     * @ORM\JoinColumn(nullable=false)
     */
    private $doctor;

    /**
     * @var Office
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Office")
     * @ORM\JoinColumn(nullable=false)
     */
    private $office;

    /**
     * @var Patient
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Patient")
     * @ORM\JoinColumn(nullable=false)
     */
    private $patient;

    /**
     * @var float
     *
     * @ORM\Column(type="float", scale=2)
     */
    private $waitTime;

    /**
     * @var float
     *
     * @ORM\Column(type="float", scale=2)
     */
    private $overall;

    /**
     * @var float
     *
     * @ORM\Column(type="float", scale=2)
     */
    private $bedsideManner;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Doctor
     */
    public function getDoctor()
    {
        return $this->doctor;
    }

    /**
     * @param Doctor $doctor
     * @return Rating
     */
    public function setDoctor($doctor)
    {
        $this->doctor = $doctor;
        return $this;
    }

    /**
     * @return Office
     */
    public function getOffice()
    {
        return $this->office;
    }

    /**
     * @param Office $office
     * @return Rating
     */
    public function setOffice($office)
    {
        $this->office = $office;
        return $this;
    }

    /**
     * @return \stdClass
     */
    public function getPatient()
    {
        return $this->patient;
    }

    /**
     * @param \stdClass $patient
     * @return Rating
     */
    public function setPatient($patient)
    {
        $this->patient = $patient;
        return $this;
    }

    /**
     * @return float
     */
    public function getWaitTime()
    {
        return $this->waitTime;
    }

    /**
     * @param float $waitTime
     * @return Rating
     */
    public function setWaitTime($waitTime)
    {
        $this->waitTime = $waitTime;
        return $this;
    }

    /**
     * @return float
     */
    public function getOverall()
    {
        return $this->overall;
    }

    /**
     * @param float $overall
     * @return Rating
     */
    public function setOverall($overall)
    {
        $this->overall = $overall;
        return $this;
    }

    /**
     * @return float
     */
    public function getBedsideManner()
    {
        return $this->bedsideManner;
    }

    /**
     * @param float $bedsideManner
     * @return Rating
     */
    public function setBedsideManner($bedsideManner)
    {
        $this->bedsideManner = $bedsideManner;
        return $this;
    }
}

