<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Plant
 *
 * @ORM\Table(name="plant")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PlantRepository")
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
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="latinName", type="string", length=255, nullable=true)
     */
    private $latinName;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="frequency", type="integer")
     */
    private $frequency;

    /**
     * @var int
     *
     * @ORM\Column(name="frequencyDays", type="integer")
     */
    private $frequencyDays;

    /**
     * @var float
     *
     * @ORM\Column(name="amount", type="float")
     */
    private $amount;

    /**
     * @var string
     *
     * @ORM\Column(name="place", type="string", length=255, nullable=true)
     */
    private $place;


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
     * Set latinName
     *
     * @param string $latinName
     *
     * @return Plant
     */
    public function setLatinName($latinName)
    {
        $this->latinName = $latinName;

        return $this;
    }

    /**
     * Get latinName
     *
     * @return string
     */
    public function getLatinName()
    {
        return $this->latinName;
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
     * Set frequency
     *
     * @param integer $frequency
     *
     * @return Plant
     */
    public function setFrequency($frequency)
    {
        $this->frequency = $frequency;

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
     * Set frequencyDays
     *
     * @param integer $frequencyDays
     *
     * @return Plant
     */
    public function setFrequencyDays($frequencyDays)
    {
        $this->frequencyDays = $frequencyDays;

        return $this;
    }

    /**
     * Get frequencyDays
     *
     * @return int
     */
    public function getFrequencyDays()
    {
        return $this->frequencyDays;
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
}
