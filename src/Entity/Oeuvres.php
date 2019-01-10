<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OeuvresRepository")
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
     */
    private $titre;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categories", inversedBy="Oeuvres")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_categories;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $dimensions;

    /**
     * @ORM\Column(type="text")
     */
    private $techniques;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $photo;

    /**
     * @ORM\Column(type="integer")
     */
    private $prix;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateImport_at;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $statut;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getIdCategories(): ?int
    {
        return $this->id_categories;
    }

    public function setIdCategories(int $id_categories): self
    {
        $this->id_categories = $
        ;

        return $this;
    }

    public function getDimensions(): ?string
    {
        return $this->dimensions;
    }

    public function setDimensions(string $dimensions): self
    {
        $this->dimensions = $dimensions;

        return $this;
    }

    public function getTechniques(): ?string
    {
        return $this->techniques;
    }

    public function setTechniques(string $techniques): self
    {
        $this->techniques = $techniques;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getPrix(): ?int
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
        return $this->dateImport_at;
    }

    public function setDateImportAt(\DateTimeInterface $dateImport_at): self
    {
        $this->dateImport_at = $dateImport_at;

        return $this;
    }

    public function __construct()
    {
        $this->dateImport_at = new \DateTime();
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




}
