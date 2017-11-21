<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Office
 *
 * @ORM\Table(name="office")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\OfficeRepository")
 */
class Office
{
    const TYPE_OFFICE_DOCTOR = 0;
    const TYPE_HOSPITAL = 10;
    const TYPE_CLINIC = 20;
    const TYPE_PRIVATE_CLINIC = 30;
    const TYPE_DENTAL_CLINIC = 40;
    const TYPE_NURSING = 50;
    const TYPE_HELTH_CENTER = 60;
    const TYPE_LABORATORY = 70;
    const TYPE_PARAMEDICAL = 80;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=8, nullable=true)
     */
    private $color;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=12, nullable=true)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="phone_second", type="string", length=12, nullable=true)
     */
    private $phoneSecond;

    /**
     * @var string
     *
     * @ORM\Column(name="fax_number", type="string", length=12, nullable=true)
     */
    private $fax;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="floor", type="string", length=20, nullable=true)
     */
    private $floor;

    /**
     * @var string
     *
     * @ORM\Column(name="intercom", type="string", length=50, nullable=true)
     */
    private $intercom;

    /**
     * @var string
     *
     * @ORM\Column(name="digicode", type="string", length=20, nullable=true)
     */
    private $digicode;

    /**
     * @var bool
     *
     * @ORM\Column(name="elevator", type="boolean", options={"default":false})
     */
    private $elevator;

    /**
     * @var bool
     *
     * @ORM\Column(name="handicap_access", type="boolean", options={"default":false})
     */
    private $handicapAccess;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\PaymentMean", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $paymentMeans;

    /**
     * @var bool
     *
     * @ORM\Column(name="opening_hours", type="text", nullable=true)
     */
    private $openingHours;


    /**
     * @var string
     *
     * @ORM\Column(name="zipcode", type="string", length=4, nullable=true)
     */
    private $zipcode;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Region")
     * @ORM\JoinColumn(nullable=true)
     */
    private $region;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\City")
     * @ORM\JoinColumn(nullable=true)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="longitude", type="string", length=50, nullable=true)
     */
    private $longitude;

    /**
     * @var string
     *
     * @ORM\Column(name="latitude", type="string", length=50, nullable=true)
     */
    private $latitude;

    /**
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Doctor", inversedBy="offices")
     * @ORM\JoinColumn(nullable=false)
     */
    private $doctor;

    /**
     * @var string
     *
     * @ORM\Column(type="integer", nullable=false, options={"unsigned":true, "default":0})
     */
    private $type;

    public function __construct()
    {
        $this->paymentMeans = new ArrayCollection();
        $this->type = self::TYPE_OFFICE_DOCTOR;
    }

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
     * Set name
     *
     * @param string $name
     *
     * @return Office
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set color
     *
     * @param string $color
     *
     * @return Office
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return Office
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set adddress
     *
     * @param string $address
     *
     * @return Office
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }


    /**
     * Set zipcode
     *
     * @param string $zipcode
     *
     * @return Office
     */
    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    /**
     * Get zipcode
     *
     * @return string
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Office
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @return mixed
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @param mixed $region
     * @return Office
     */
    public function setRegion($region)
    {
        $this->region = $region;
        return $this;
    }

    /**
     * Set floor
     *
     * @param string $floor
     *
     * @return Office
     */
    public function setFloor($floor)
    {
        $this->floor = $floor;

        return $this;
    }

    /**
     * Get floor
     *
     * @return string
     */
    public function getFloor()
    {
        return $this->floor;
    }

    /**
     * Set intercom
     *
     * @param string $intercom
     *
     * @return Office
     */
    public function setIntercom($intercom)
    {
        $this->intercom = $intercom;

        return $this;
    }

    /**
     * Get intercom
     *
     * @return string
     */
    public function getIntercom()
    {
        return $this->intercom;
    }

    /**
     * Set digicode
     *
     * @param string $digicode
     *
     * @return Office
     */
    public function setDigicode($digicode)
    {
        $this->digicode = $digicode;

        return $this;
    }

    /**
     * Get digicode
     *
     * @return string
     */
    public function getDigicode()
    {
        return $this->digicode;
    }

    /**
     * Set elevator
     *
     * @param boolean $elevator
     *
     * @return Office
     */
    public function setElevator($elevator)
    {
        $this->elevator = $elevator;

        return $this;
    }

    /**
     * Get elevator
     *
     * @return bool
     */
    public function getElevator()
    {
        return $this->elevator;
    }

    /**
     * Set handicapAccess
     *
     * @param boolean $handicapAccess
     *
     * @return Office
     */
    public function setHandicapAccess($handicapAccess)
    {
        $this->handicapAccess = $handicapAccess;

        return $this;
    }

    /**
     * Get handicapAccess
     *
     * @return bool
     */
    public function getHandicapAccess()
    {
        return $this->handicapAccess;
    }

    /**
     * @return ArrayCollection
     */
    public function getPaymentMeans()
    {
        return $this->paymentMeans;
    }

    /**
     * @param PaymentMean $paymentMean
     * @return $this
     */
    public function addPaymentMean(PaymentMean $paymentMean)
    {
        $this->paymentMeans[] = $paymentMean;
        return $this;
    }

    /**
     * @param PaymentMean $paymentMean
     */
    public function removePaymentMean(PaymentMean $paymentMean)
    {
        $this->paymentMeans->removeElement($paymentMean);
    }
    
    /**
     * @return boolean
     */
    public function isOpeningHours()
    {
        return $this->openingHours;
    }

    /**
     * @param boolean $openingHours
     * @return Office
     */
    public function setOpeningHours($openingHours)
    {
        $this->openingHours = $openingHours;
        return $this;
    }
    
    /**
     * @return mixed
     */
    public function getDoctor()
    {
        return $this->doctor;
    }

    /**
     * @param mixed $doctor
     * @return Office
     */
    public function setDoctor($doctor)
    {
        $this->doctor = $doctor;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhoneSecond()
    {
        return $this->phoneSecond;
    }

    /**
     * @param string $phoneSecond
     * @return Office
     */
    public function setPhoneSecond($phoneSecond)
    {
        $this->phoneSecond = $phoneSecond;
        return $this;
    }

    /**
     * @return string
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * @param string $fax
     * @return Office
     */
    public function setFax($fax)
    {
        $this->fax = $fax;
        return $this;
    }

    /**
     * @return string
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param string $longitude
     * @return Office
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
        return $this;
    }

    /**
     * @return string
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param string $latitude
     * @return Office
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
        return $this;
    }
}

