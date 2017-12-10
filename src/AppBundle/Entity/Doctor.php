<?php

namespace AppBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * Doctor
 *
 * @ApiResource
 * @ORM\Table(name="doctor")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DoctorRepository")
 */
class Doctor
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
     * @ORM\Column(name="firstname", type="string", length=50)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=50)
     */
    private $lastname;

    /**
     * @Gedmo\Slug(fields={"firstname", "lastname"})
     * @ORM\Column(length=128, unique=true)
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="civility", type="string", length=6, nullable=true)
     */
    private $civility;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Speciality", cascade={"persist"})
     */
    private $specialities;

    /**
     * @var integer
     * @ORM\Column(name="insurance", type="boolean", options={"default":true}, nullable=true)
     */
    private $insurance;
    
    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="phone_number", type="string", length=12, nullable=true)
     */
    private $phoneNumber;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\DoctorConsultation", mappedBy="doctor")
     *
     */
    private $consultations;

    /**
     * @var \DateTime $createdAt
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime $updatedAt
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\OneToOne(targetEntity="User", cascade={"persist"}, inversedBy="doctor")
     * @ORM\JoinColumn(nullable=true)
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(name="enabled", type="boolean", options={"default" : 0})
     */
    private $enabled;

    /**
     * @var Boolean
     *
     * @ORM\Column(name="is_visible", type="boolean", options={"default" : 0})
     */
    private $isVisible;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Experience", mappedBy="doctor")
     */
    private $experiences;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Formation", mappedBy="doctor")
     */
    private $formations;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Publication", mappedBy="doctor")
     */
    private $publications;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Association", mappedBy="doctor", cascade={"persist"})
     */
    private $associations;


    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Language")
     */
    private $languages;

    /**
     * @var string
     *
     * @ORM\Column(type="time", nullable=true)
     */
    private $waitingTime;

    private $schedule;

    public function __construct()
    {
        $this->consultations = new ArrayCollection();
        $this->specialities = new ArrayCollection();
        $this->experiences = new ArrayCollection();
        $this->formations = new ArrayCollection();
        $this->publications = new ArrayCollection();
        $this->associations = new ArrayCollection();
        $this->languages = new ArrayCollection();
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

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return Doctor
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return Doctor
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Doctor
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Doctor
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set phoneNumber
     *
     * @param string $phoneNumber
     *
     * @return Doctor
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @return string
     */
    public function getSpecialities()
    {
        return $this->specialities;
    }

    /**
     * @param Speciality $speciality
     * @return $this
     */
    public function addSpeciality(Speciality $speciality)
    {
        $this->specialities[] = $speciality;

        return $this;
    }

    public function removeSpeciality(Speciality $speciality)
    {
        $this->specialities->removeElement($speciality);
    }

    /**
     * @return string
     */
    public function getInsurance()
    {
        return $this->insurance;
    }

    /**
     * @param string $insurance
     * @return Doctor
     */
    public function setInsurance($insurance)
    {
        $this->insurance = $insurance;
        return $this;
    }

    /**
     * @return string
     */
    public function getFormations()
    {
        return $this->formations;
    }

    /**
     * @param Formation $formation
     * @return Doctor
     */
    public function addFormation(Formation $formation)
    {
        $this->formations[] = $formation;
        return $this;
    }

    /**
     * @return string
     */
    public function getCivility()
    {
        return $this->civility;
    }

    /**
     * @param string $civility
     * @return Doctor
     */
    public function setCivility($civility)
    {
        $this->civility = $civility;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getConsultations()
    {
        return $this->consultations;
    }

    public function addConsultation(DoctorConsultation $consultations)
    {
        $this->consultations[] = $consultations;

        return $this;
    }

    public function removeConsultation(DoctorConsultation $consultations)
    {
        $this->consultations->removeElement($consultations);
    }

    /**
     * @return mixed
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param mixed $slug
     * @return Doctor
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     * @return Doctor
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param mixed $updatedAt
     * @return Doctor
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     * @return Doctor
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    
    public function __toString()
    {
        return $this->getFirstname() . $this->getLastname();
    }

    /**
     * @return string
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * @param string $enabled
     * @return Doctor
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
        return $this;
    }

    /**
     * @return Bool
     */
    public function getIsVisible()
    {
        return $this->isVisible;
    }

    /**
     * @param Bool $isVisible
     * @return Doctor
     */
    public function setIsVisible($isVisible)
    {
        $this->isVisible = $isVisible;
        return $this;
    }

    public function addExperience(Experience $experience)
    {
        $experience->setDoctor($this);
        $this->experiences[] = $experience;

        return $this;
    }

    public function removeExperience(Experience $experience)
    {
        $this->experiences->removeElement($experience);
    }

    public function getExperiences()
    {
        return $this->experiences;
    }

    public function removeFormation(Formation $formation)
    {
        $this->formation->removeElement($formation);
    }


    public function addAssociation(Association $association)
    {
        $this->associations[] = $association;
        $association->setDoctor($this);
        return $this;
    }

    public function removeAssociation(Association $association)
    {
        $this->associations->removeElement($association);
    }

    public function getAssociations()
    {
        return $this->associations;
    }

    public function addPublication(Publication $publication)
    {
        $publication->setDoctor($this);
        $this->publications[] = $publication;

        return $this;
    }

    public function removePublication(Publication $publication)
    {
        $this->publications->removeElement($publication);
    }

    public function getPublications()
    {
        return $this->publications;
    }

    public function addLanguage(Language $language)
    {
        $this->languages[] = $language;

        return $this;
    }

    public function removeLanguage(Language $language)
    {
        $this->languages->removeElement($language);
    }

    public function getLanguages()
    {
        return $this->languages;
    }

    /**
     * @return string
     */
    public function getWaitingTime()
    {
        return $this->waitingTime;
    }

    /**
     * @param string $waitingTime
     * @return Doctor
     */
    public function setWaitingTime($waitingTime)
    {
        $this->waitingTime = $waitingTime;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSchedule()
    {
        return $this->schedule;
    }

    /**
     * @param mixed $schedule
     * @return Doctor
     */
    public function setSchedule($schedule)
    {
        $this->schedule = $schedule;
        return $this;
    }
}
