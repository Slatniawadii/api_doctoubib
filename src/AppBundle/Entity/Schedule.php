<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Schedule
 *
 * @ORM\Table(name="schedule")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ScheduleRepository")
 */
class Schedule
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
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Doctor")
     * @ORM\JoinColumn(nullable=false)
     */
    private $doctor;

    /**
     * @var int
     *
     * @ORM\Column(name="day", type="integer")
     */
    private $day;

    /**
     * @var int
     *
     * @ORM\Column(name="slot", type="integer")
     */
    private $slot;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="first_slot_start", type="time")
     */
    private $firstSlotStart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="first_slot_end", type="time")
     */
    private $firstSlotEnd;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="second_slot_start", type="time")
     */
    private $secondSlotStart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="second_slot_end", type="time")
     */
    private $secondSlotEnd;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text")
     */
    private $comment;


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
     * Set doctor
     *
     * @param string $doctor
     *
     * @return Schedule
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
     * Set day
     *
     * @param integer $day
     *
     * @return Schedule
     */
    public function setDay($day)
    {
        $this->day = $day;

        return $this;
    }

    /**
     * Get day
     *
     * @return int
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * Set slot
     *
     * @param integer $slot
     *
     * @return Schedule
     */
    public function setSlot($slot)
    {
        $this->slot = $slot;

        return $this;
    }

    /**
     * Get slot
     *
     * @return int
     */
    public function getSlot()
    {
        return $this->slot;
    }

    /**
     * Set firstSlotStart
     *
     * @param \DateTime $firstSlotStart
     *
     * @return Schedule
     */
    public function setFirstSlotStart($firstSlotStart)
    {
        $this->firstSlotStart = $firstSlotStart;

        return $this;
    }

    /**
     * Get firstSlotStart
     *
     * @return \DateTime
     */
    public function getFirstSlotStart()
    {
        return $this->firstSlotStart;
    }

    /**
     * Set firstSlotEnd
     *
     * @param \DateTime $firstSlotEnd
     *
     * @return Schedule
     */
    public function setFirstSlotEnd($firstSlotEnd)
    {
        $this->firstSlotEnd = $firstSlotEnd;

        return $this;
    }

    /**
     * Get firstSlotEnd
     *
     * @return \DateTime
     */
    public function getFirstSlotEnd()
    {
        return $this->firstSlotEnd;
    }

    /**
     * Set secondSlotStart
     *
     * @param \DateTime $secondSlotStart
     *
     * @return Schedule
     */
    public function setSecondSlotStart($secondSlotStart)
    {
        $this->secondSlotStart = $secondSlotStart;

        return $this;
    }

    /**
     * Get secondSlotStart
     *
     * @return \DateTime
     */
    public function getSecondSlotStart()
    {
        return $this->secondSlotStart;
    }

    /**
     * Set secondSlotEnd
     *
     * @param \DateTime $secondSlotEnd
     *
     * @return Schedule
     */
    public function setSecondSlotEnd($secondSlotEnd)
    {
        $this->secondSlotEnd = $secondSlotEnd;

        return $this;
    }

    /**
     * Get secondSlotEnd
     *
     * @return \DateTime
     */
    public function getSecondSlotEnd()
    {
        return $this->secondSlotEnd;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return Schedule
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }
}

