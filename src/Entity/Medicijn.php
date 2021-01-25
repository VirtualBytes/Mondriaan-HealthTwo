<?php

namespace App\Entity;

use App\Repository\MedicijnRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Integer;

/**
 * @ORM\Entity(repositoryClass=MedicijnRepository::class)
 */
class Medicijn
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Naam;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Werking;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Bijwerking;

    /**
     * @ORM\Column(type="decimal", precision=8, scale=2)
     */
    private $Prijs;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Verzekerd;

    /**
     * @ORM\OneToMany(targetEntity=Recept::class, mappedBy="medicijn")
     */
    private $recepten;

    public function __construct()
    {
        $this->recepten = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNaam(): ?string
    {
        return $this->Naam;
    }

    public function setNaam(string $Naam): self
    {
        $this->Naam = $Naam;

        return $this;
    }

    public function getWerking(): ?string
    {
        return $this->Werking;
    }

    public function setWerking(string $Werking): self
    {
        $this->Werking = $Werking;

        return $this;
    }

    public function getBijwerking(): ?string
    {
        return $this->Bijwerking;
    }
    

    public function setBijwerking(string $Bijwerking): self
    {
        $this->Bijwerking = $Bijwerking;

        return $this;
    }

    public function getPrijs(): ?string
    {
        return $this->Prijs;
    }
    

    public function setPrijs(string $Prijs): self
    {
        $this->Prijs = $Prijs;

        return $this;
    }

    public function getVerzekerd(): ?bool
    {
        return $this->Verzekerd;
    }

    public function setVerzekerd(bool $Verzekerd): self
    {
        $this->Verzekerd = $Verzekerd;

        return $this;
    }

    public function __toString(){
        return $this->Naam;
    }

    /**
     * @return Collection|Recept[]
     */
    public function getRecepten(): Collection
    {
        return $this->recepten;
    }

    public function addRecepten(Recept $recepten): self
    {
        if (!$this->recepten->contains($recepten)) {
            $this->recepten[] = $recepten;
            $recepten->setMedicijn($this);
        }

        return $this;
    }

    public function removeRecepten(Recept $recepten): self
    {
        if ($this->recepten->removeElement($recepten)) {
            // set the owning side to null (unless already changed)
            if ($recepten->getMedicijn() === $this) {
                $recepten->setMedicijn(null);
            }
        }

        return $this;
    }
}
