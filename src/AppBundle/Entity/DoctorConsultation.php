<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DoctorFees
 *
 * @ORM\Table(name="doctor_consultation")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DoctorFeesRepository")
 */
class DoctorConsultation
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var \DateTime
     * @ORM\Column(name="slot_duration", type="integer", nullable=false)
     */
    private $slotDuration;

    /**
     * @var \DateTime
     * @ORM\Column(name="booking_delay_before", type="integer", nullable=false, options={"unsigned":true, "default":2})
     */
    private $bookingDelayBefore;

    /**
     * @var \DateTime
     * @ORM\Column(name="booking_delay_until", type="integer", nullable=false, options={"unsigned":true, "default":2})
     */
    private $bookingDelayUntil;

    /**
     * @var bool
     * @ORM\Column(name="online_booking", type="boolean", options={"default":1})
     */
    private $onlineBooking;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Doctor", inversedBy="consultations")
     * @ORM\JoinColumn(name="doctor_id", referencedColumnName="id")
     */
    private $doctor;


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
     * @return DoctorFees
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
     * Set doctor
     *
     * @param string $doctor
     *
     * @return DoctorFees
     */
    public function setDoctor($doctor)
    {
        $this->doctor = $doctor;

        return $this;
    }

    /**
     * Get doctor
     *
     * @return string
     */
    public function getDoctor()
    {
        return $this->doctor;
    }

    /**
     * @return \DateTime
     */
    public function getBookingDelayBefore()
    {
        return $this->bookingDelayBefore;
    }

    /**
     * @param \DateTime $bookingDelayBefore
     * @return DoctorConsultation
     */
    public function setBookingDelayBefore($bookingDelayBefore)
    {
        $this->bookingDelayBefore = $bookingDelayBefore;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getBookingDelayUntil()
    {
        return $this->bookingDelayUntil;
    }

    /**
     * @param \DateTime $bookingDelayUntil
     * @return DoctorConsultation
     */
    public function setBookingDelayUntil($bookingDelayUntil)
    {
        $this->bookingDelayUntil = $bookingDelayUntil;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isOnlineBooking()
    {
        return $this->onlineBooking;
    }

    /**
     * @param boolean $onlineBooking
     * @return DoctorConsultation
     */
    public function setOnlineBooking($onlineBooking)
    {
        $this->onlineBooking = $onlineBooking;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getSlotDuration()
    {
        return $this->slotDuration;
    }

    /**
     * @param \DateTime $slotDuration
     * @return DoctorConsultation
     */
    public function setSlotDuration($slotDuration)
    {
        $this->slotDuration = $slotDuration;
        return $this;
    }
}

