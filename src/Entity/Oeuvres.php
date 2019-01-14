<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Oeuvres
 *
 * @ORM\Table(name="oeuvres")
 * @ORM\Entity
 */
class Oeuvres
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Vous devez saisir un titre!")
     * @Assert\Length(
     *     max="255",
     *     maxMessage="Votre titre ne doit pas dépasser {{limit}} caracters!",
     *     min="5",
     *     minMessage="Votre titre moins de 5 caracters!"
     * )
     */
    private $titre;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categories" , inversedBy="oeuvres")
     */
    private $id_categories;

    /**
     * @return mixed
     */
    public function getIdCategories()
    {
        return $this->id_categories;
    }

    /**
     * @param mixed $id_categories
     */
    public function setIdCategories($id_categories): void
    {
        $this->id_categories = $id_categories;
    }



    /**
     * @var string
     *
     * @ORM\Column(name="dimensions", type="string", length=10, nullable=false)
     * @Assert\NotBlank(message="Vous devez saisir un dimension!")
     *
     *
     */
    private $dimensions;

    /**
     * @var string
     *
     * @ORM\Column(name="techniques",  length=20, nullable=false)
     *
     */
    private $techniques;

    /**
     * @ORM\Column(length=180)
     * @Assert\Image(
     *     mimeTypesMessage="Verifies le format de votre image!",
     *     maxSize="5M", maxSizeMessage="Attention, votre image est trop lourde"
     * )
     */
    private $photo;

    /**
     * @var int
     *
     * @ORM\Column(name="prix", type="integer", nullable=false)
     */
    private $prix;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateImportAt;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="statut", type="boolean", nullable=true)
     */
    private $statut;
    
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categories", inversedBy="Oeuvres")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categories;

    /**
     * Oeuvres constructor.
     * @param $dateImportAt
     * @throws \Exception
     */
    public function __construct()
    {
        $this->dateImportAt = new \DateTime();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdCategories()
    {
        return $this->id_categories;
    }

    /**
     * @param mixed $id_categories
     */
    public function setIdCategories($id_categories): void
    {
        $this->id_categories = $id_categories;
    }



    public function getDimensions(): ?string


    public function getDimensions()
    {
        return $this->dimensions;
    }

    public function setDimensions(string $dimensions): self
    {
        $this->dimensions = $dimensions;

        return $this;
    }

    public function getTechniques()
    {
        return $this->techniques;
    }

    public function setTechniques(string $techniques): self
    {
        $this->techniques = $techniques;

        return $this;
    }

    public function getPhoto()
    {
        return $this->photo;
    }

    public function setPhoto($photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getPrix()
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getDateImportAt(): ?\DateTimeInterface
    {
        return $this->dateImportAt;
    }

    public function setDateImportAt(\DateTimeInterface $dateImportAt): self
    {
        $this->dateImportAt = $dateImportAt;

        return $this;
    }

    public function getStatut(): ?bool
    {
        return $this->statut;
    }

    public function setStatut(?bool $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCategories()
    {
        return $this->categories;
    }
    /**
     * @param mixed $categories
     */
    public function setCategories($categories): self
    {
        $this->categories = $categories;
        return $this;
    }


}
