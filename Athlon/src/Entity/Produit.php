<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProduitRepository::class)
 */
class Produit
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $idP;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $brand;

    /**
     * @ORM\OneToMany(targetEntity=CommandeItem::class, mappedBy="produit")
     */
    private $quantity;

    public function __construct()
    {
        $this->quantity = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdP(): ?int
    {
        return $this->idP;
    }

    public function setIdP(int $idP): self
    {
        $this->idP = $idP;

        return $this;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * @return Collection<int, CommandeItem>
     */
    public function getQuantity(): Collection
    {
        return $this->quantity;
    }

    public function addQuantity(CommandeItem $quantity): self
    {
        if (!$this->quantity->contains($quantity)) {
            $this->quantity[] = $quantity;
            $quantity->setProduit($this);
        }

        return $this;
    }

    public function removeQuantity(CommandeItem $quantity): self
    {
        if ($this->quantity->removeElement($quantity)) {
            // set the owning side to null (unless already changed)
            if ($quantity->getProduit() === $this) {
                $quantity->setProduit(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->getBrand();
    }
}
