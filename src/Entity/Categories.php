<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Categories
 *
 * @ORM\Table(name="categories")
 * @ORM\Entity
 */
class Categories
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Oeuvres", mappedBy="categorie")
     */
    private $oeuvres;

    /**
     * Categories constructor.
     */
    public function __construct()
    {
        $this->oeuvres = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getOeuvres()
    {
        return $this->oeuvres;
    }

    /**
     * @param mixed $oeuvres
     */
    public function setOeuvres($oeuvres): void
    {
        $this->oeuvres = $oeuvres;
    }
}
