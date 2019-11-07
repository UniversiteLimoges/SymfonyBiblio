<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass="App\Repository\LivreRepository")
 */
class Livre
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
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $auteur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $editeur;

    /**
     * @ORM\Column(type="date")
     */
    private $dateParution;

    /**
     * @ORM\Column(type="boolean")
     */
    private $disponibilite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $iban;

    /**
     * @ORM\Column(type="integer")
     */
    private $exemplaire_total;

    /**
     * @ORM\Column(type="integer")
     */
    private $exemplaire_dispo;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="livres")
     */
    private $category;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", inversedBy="livres")
     */
    private $user;

    public function __construct()
    {
        $this->user = new ArrayCollection();
    }

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getAuteur(): ?string
    {
        return $this->auteur;
    }

    public function setAuteur(string $auteur): self
    {
        $this->auteur = $auteur;

        return $this;
    }

    public function getEditeur(): ?string
    {
        return $this->editeur;
    }

    public function setEditeur(string $editeur): self
    {
        $this->editeur = $editeur;

        return $this;
    }

    public function getDateParution(): ?\DateTimeInterface
    {
        return $this->dateParution;
    }

    public function setDateParution(\DateTimeInterface $dateParution): self
    {
        $this->dateParution = $dateParution;

        return $this;
    }

    public function getDisponibilite(): ?bool
    {
        return $this->disponibilite;
    }

    public function setDisponibilite(bool $disponibilite): self
    {
        $this->disponibilite = $disponibilite;

        return $this;
    }

    public function getIban(): ?string
    {
        return $this->iban;
    }

    public function setIban(string $iban): self
    {
        $this->iban = $iban;

        return $this;
    }

    public function getExemplaireTotal(): ?int
    {
        return $this->exemplaire_total;
    }

    public function setExemplaireTotal(int $exemplaire_total): self
    {
        $this->exemplaire_total = $exemplaire_total;

        return $this;
    }

    public function getExemplaireDispo(): ?int
    {
        return $this->exemplaire_dispo;
    }

    public function setExemplaireDispo(int $exemplaire_dispo): self
    {
        $this->exemplaire_dispo = $exemplaire_dispo;

        return $this;
    }

    public function enleverExemplaireDispo(): self
    {
        if ($this->exemplaire_total!=0){
            $this->exemplaire_dispo--;
            if ($this->exemplaire_dispo == 0){
                $this->disponibilite=false;
            }
        }
        return $this;
    }

    public function ajouterExemplaireDispo(): self
    {
        $this->exemplaire_dispo++;
        if ($this->exemplaire_dispo == 1){
            $this->disponibilite=true;
        }
        return $this;

    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUser(): Collection
    {
        return $this->user;
    }

    public function addUser(User $user): self
    {
        if (!$this->user->contains($user)) {
            $this->user[] = $user;
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->user->contains($user)) {
            $this->user->removeElement($user);
        }

        return $this;
    }

}
