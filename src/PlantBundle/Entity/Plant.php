<?php

namespace PlantBundle\Entity;

use AppBundle\Entity\User;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Plant
 *
 * @ORM\Table(name="plant")
 * @ORM\Entity(repositoryClass="PlantBundle\Repository\PlantRepository")
 */
class Plant
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
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="place", type="string", length=255, nullable=true)
     */
    private $place;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="dateLastWatered", type="datetime")
     * @Assert\NotBlank()
     * @Assert\LessThanOrEqual("today")
     */
    private $dateLastWatered;

    /**
     * @var float
     *
     * @ORM\Column(name="amount", type="float")
     * @Assert\NotBlank()
     */
    private $amount;

    /**
     * @var int
     *
     * @ORM\Column(name="frequency", type="integer")
     * @Assert\NotBlank()
     * @Assert\GreaterThan(0)
     */
    private $frequency;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_daily", type="boolean")
     */
    private $isDaily;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="plants")
     */
    private $owner;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_watered", type="boolean")
     */
    private $isWatered;

    /**
     * @var int
     *
     * @ORM\Column(name="$remaining", type="integer")
     */
    private $remaining;

    /**
     * Plant constructor.
     */
    public function __construct()
    {
        $this->isDaily = false;
        $this->dateLastWatered = new DateTime('now');
        $this->isWatered = true;
        $this->remaining = 0;
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
     * @return Plant
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
     * Set place
     *
     * @param string $place
     *
     * @return Plant
     */
    public function setPlace($place)
    {
        $this->place = $place;

        return $this;
    }

    /**
     * Get place
     *
     * @return string
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Plant
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
     * Set dateLastWatered
     *
     * @param DateTime $dateLastWatered
     *
     * @return Plant
     */
    public function setDateLastWatered($dateLastWatered)
    {
        $this->dateLastWatered = $dateLastWatered;

        return $this;
    }

    /**
     * Get dateLastWatered
     *
     * @return DateTime
     */
    public function getDateLastWatered()
    {
        return $this->dateLastWatered;
    }

    /**
     * Set amount
     *
     * @param float $amount
     *
     * @return Plant
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set frequency
     *
     * @param integer $frequency
     *
     * @return Plant
     */
    public function setFrequency($frequency)
    {
        $this->frequency = $frequency;
        if($this->isDaily)
        {
            $this->remaining = $frequency;
        }
        return $this;
    }

    /**
     * Get frequency
     *
     * @return int
     */
    public function getFrequency()
    {
        return $this->frequency;
    }

    /**
     * Set type
     *
     * @param integer $isDaily
     *
     * @return Plant
     */
    public function setIsDaily($isDaily)
    {
        $this->isDaily = $isDaily;
        if($this->isDaily)
        {
            $this->remaining = $this->frequency;
        }
        return $this;
    }

    /**
     * Get isDaily
     *
     * @return integer
     */
    public function getIsDaily()
    {
        return $this->isDaily;
    }

    /**
     * Get owner
     *
     * @return User
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Set owner
     *
     * @param User $owner
     *
     * @return Plant
     */
    public function setOwner(User $owner)
    {
        $this->owner = $owner;
        $owner->addPlant($this);
        return $this;
    }

    /**
     * Set type
     *
     * @param integer $isWatered
     *
     * @return Plant
     */
    public function setIsWatered($isWatered)
    {
        $this->isWatered = $isWatered;
        return $this;
    }

    /**
     * Get isWatered
     *
     * @return integer
     */
    public function getIsWatered()
    {
        return $this->isWatered;
    }

    /**
     * Get remaining
     *
     * @return int
     */
    public function getRemaining()
    {
        return $this->remaining;
    }

    /**
     * Set remaining
     *
     * @param int $remaining
     * @return Plant
     */
    public function setRemaining($remaining)
    {
        $this->remaining = $remaining;
        return $this;
    }
}

