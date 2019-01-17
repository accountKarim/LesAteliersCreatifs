<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MembresRepository")
 * @UniqueEntity("email")
 */
class Membres implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Vous devez renseigner votre nom")
     * @Assert\Length(
     *     max="55",
     *     maxMessage="Votre nom ne doit pas depasser les 55 caracteres"
     * )
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=55)
     * @Assert\NotBlank(message="Vous devez renseigner votre prenom")
     * @Assert\Length(
     *     max="55",
     *     maxMessage="Votre prenom ne doit pas depasser les 55 caracteres"
     * )
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Vous devez renseigner votre email")
     * @Assert\Email(message="Votre adresse mail est incorect")
     * @Assert\Length(
     *     max="55",
     *     maxMessage="Votre adresse mail ne doit pas depasser les 55 caracteres"
     * )
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Vous devez renseigner un mot de passe")
     * @Assert\Length(
     *     max="255",
     *     maxMessage="Votre mot de passe ne doit pas depasser les 255 caracteres",
     *     min="5",
     *     minMessage="Votre mot de passe doit avoir au minimum plus de 5 caracteres"
     * )
     */
    private $mdp;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="vous devez renseigner votre adresse")
     * @Assert\Length(
     *     max="255",
     *     maxMessage="Ce champ ne doit pas depaser les 255 caracteres",
     * )
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank(message="Vous devez renseigner votre ville")
     */
    private $ville;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="Vous devez renseigner votre code postal")
     * @Assert\Length(
     *     max="5",
     *     maxMessage="Votre code postal ne doit pas depaser 5 caracteres",
     *     min="5",
     *     minMessage="Votre code postal doit avoir 5 caracteres"
     * )
     */
    private $codePostal;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="Vous devez renseigner votre numero de télèphone")
     */
    private $tel;

    /**
     * @ORM\Column(type="array")
     */
    private $role = [];

    /**
     * @ORM\Column(type="datetime")
     */
    private $creattedAt;

    /**
     * @return mixed
     */
    public function getCreattedAt()
    {
        return $this->creattedAt;
    }

    /**
     * @param mixed $creattedAt
     */
    public function setCreattedAt($creattedAt): void
    {
        $this->creattedAt = $creattedAt;
    }



    /**
     * @var string le token qui servira lors de l'oubli de mot de passe
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $resetToken;

    public function getId(): ?int
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

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

    public function getMdp(): ?string
    {
        return $this->mdp;
    }

    public function setMdp(string $mdp): self
    {
        $this->mdp = $mdp;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getCodePostal(): ?int
    {
        return $this->codePostal;
    }

    public function setCodePostal(int $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getTel(): ?int
    {
        return $this->tel;
    }

    public function setTel(int $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getRole(): ?array
    {
        return $this->role;
    }

    public function setRole(array $role): self
    {
        $this->role = $role;

        return $this;
    }



    public function __construct()
    {
        $this->creattedAt = new \DateTime();

        $this->role = ['ROLE_USER'];
    }


    /**
     * Returns the roles granted to the user.
     *
     *     public function getRoles()
     *     {
     *         return array('ROLE_USER');
     *     }
     *
     * Alternatively, the roles might be stored on a ``roles`` property,
     * and populated in any number of different ways when the user object
     * is created.
     *
     * @return (Role|string)[] The user roles
     */
    public function getRoles()
    {
        return $this->role;
    }

    /**
     * Returns the password used to authenticate the user.
     *
     * This should be the encoded password. On authentication, a plain-text
     * password will be salted, encoded, and then compared to this value.
     *
     * @return string The password
     */
    public function getPassword()
    {
        return $this->mdp;
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
        return null;
    }

    /**
     * Returns the username used to authenticate the user.
     *
     * @return string The username
     */
    public function getUsername(){}

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials(){}


    /**
     * @return string
     */
    public function getResetToken(): string
    {
        return $this->resetToken;
    }

    /**
     * @param string $resetToken
     */
    public function setResetToken(?string $resetToken)
    {
        $this->resetToken = $resetToken;
    }


}
