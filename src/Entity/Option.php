<?php

namespace App\Entity;

use App\Repository\OptionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection as CollectionFigure;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OptionRepository::class)
 * @ORM\Table(name="`option`")
 */
class Option
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity=Collection::class, mappedBy="options")
     */
    private $collection;

    public function __construct()
    {
        $this->collection = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return CollectionFigure|CollectionFigure[]
     */
    public function getCollection(): CollectionFigure
    {
        return $this->collection;
    }

    public function addCollection(CollectionFigure $collection): self
    {
        if (!$this->collection->contains($collection)) {
            $this->collection[] = $collection;
        }

        return $this;
    }

    public function removeCollection(CollectionFigure $collection): self
    {
        if ($this->collection->contains($collection)) {
            $this->collection->removeElement($collection);
        }

        return $this;
    }
}
