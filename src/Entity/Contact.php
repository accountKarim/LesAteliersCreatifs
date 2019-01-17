<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass="App\Repository\ContactRepository")
 */
class Contact
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Vous devez saisir Votre Nom!")
     * @Assert\Length(
     *     max="255",
     *     maxMessage="Votre nom ne doit pas dépasser {{limit}} caracters!",
     * )
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Vous devez saisir Votre Prenom!")
     * @Assert\Length(
     *     max="255",
     *     maxMessage="Votre prenom ne doit pas dépasser {{limit}} caracters!",
     * )
     */
    private $prenom;

    /**
     * @ORM\Column(type="integer", nullable=true)
     *
     * @Assert\Length(
     *     max="255",
     *     maxMessage="Votre nom ne doit pas dépasser {{limit}} caracters!",
     * )
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=80)
     * @Assert\NotBlank(message="Vous devez saisir un email!")
     * @Assert\Length(
     *     max="80",
     *     maxMessage="Votre email ne doit pas dépasser {{limit}} caracters!"
     *      )
     * @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email.",
     *     checkMX = true
     * )
     */
    private $email;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank(message="Vous devez saisir un message!")
     */
    private $message;

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

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(?int $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }
}
