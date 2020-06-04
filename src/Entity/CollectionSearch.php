<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use App\Repository\CollectionRepository;
use Symfony\Component\Validator\Constraints as Assert;

class CollectionSearch {

    /**
     * @var int|null
     */
    private $maxPrice;

    /**
     * @var int|null
     */
    private $dimension;

    /**
     * @var ArrayCollection
     */
    private $options;

    public function __construct() {

        $this->options = new ArrayCollection;

    }

    /**
     * @return int|null
     */
    public function getMaxPrice(): ?int
    {
        return $this->maxPrice;
    }

    /**
     * @param int|null
     * @return CollectionSearch
     */
    public function setMaxPrice(int $maxPrice): CollectionSearch {

        $this->maxPrice = $maxPrice;
        return $this;

    }

    /**
     * @return int|null
     */
    public function getDimension(): ?int
    {
        return $this->dimension;
    }

    /**
     * @param int|null
     * @return CollectionSearch
     */
    public function setDimension(int $dimension): CollectionSearch
    {

        $this->dimension = $dimension;
        return $this;

    }

    /**
     * @return ArrayCollection
     */
    public function getOptions(): ArrayCollection
    {
        return $this->options;
    }

    /**
     * @param ArrayCollection $options
     * @return ArrayCollection
     */
    public function setOptions(int $options): ArrayCollection
    {

        $this->options = $options;
        return $this;

    }
    
}