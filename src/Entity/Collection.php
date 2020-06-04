<?php

namespace App\Entity;

use App\Repository\CollectionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection as CollectionFigure;
use Doctrine\ORM\Mapping as ORM;
use Cocur\Slugify\Slugify;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=CollectionRepository::class)
 * @UniqueEntity("title")
 */
class Collection
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
    private $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Range(min=5, max=150)
     */
    private $dimensions;

    /**
     * @ORM\Column(type="smallint")
     * @Assert\Range(min=1, max=9)
     */
    private $partsNumber;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Regex("/^[0-9]+$/")
     */
    private $price;

    /**
     * @ORM\Column(type="boolean")
     * @Assert\Choice({true, false})
     */
    private $possession;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\ManyToMany(targetEntity=Option::class, inversedBy="collection")
     */
    private $options;

    public function __construct() {
        $this->created_at = new \DateTime();
        $this->image = 'https://www.chauffage-stroh.fr/gallery/photos/photos/1.jpg';
        $this->options = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getSlug(): string {
        return (new Slugify())->slugify($this->title);
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDimensions(): ?int
    {
        return $this->dimensions;
    }

    public function setDimensions(int $dimensions): self
    {
        $this->dimensions = $dimensions;

        return $this;
    }

    public function getPartsNumber(): ?int
    {
        return $this->partsNumber;
    }

    public function setPartsNumber(int $partsNumber): self
    {
        $this->partsNumber = $partsNumber;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getPossession(): ?bool
    {
        return $this->possession;
    }

    public function setPossession(bool $possession): self
    {
        $this->possession = $possession;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getFormatedCreatedAt(): string {
        return $this->created_at->format('d/m/Y');
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return CollectionFigure|Option[]
     */
    public function getOptions(): CollectionFigure
    {
        return $this->options;
    }

    public function addOption(Option $option): self
    {
        if (!$this->options->contains($option)) {
            $this->options[] = $option;
            $option->addCollection($this);
        }

        return $this;
    }

    public function removeOption(Option $option): self
    {
        if ($this->options->contains($option)) {
            $this->options->removeElement($option);
            $option->removeCollection($this);
        }

        return $this;
    }
}
