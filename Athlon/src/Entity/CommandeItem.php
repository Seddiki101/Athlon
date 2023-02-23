<?php

namespace App\Entity;

use App\Repository\CommandeItemRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=CommandeItemRepository::class)
 */
class CommandeItem
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Produit::class)
     * * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="produit", referencedColumnName="id_p")
     * })
     * @Assert\NotBlank(message="ce champ est obligatoire")
     */
    private $produit;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="ce champ est obligatoire")
     * @Assert\Positive
     */
    private $quantity;

    /**
     * @ORM\ManyToOne(targetEntity=Commande::class,cascade={"persist"})
     * * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="commande", referencedColumnName="id_c")
     * })
     */
    private $commande;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProduit(): ?Produit
    {
        return $this->produit;
    }

    public function setProduit(?Produit $produit): self
    {
        $this->produit = $produit;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getCommande(): ?Commande
    {
        return $this->commande;
    }

    public function setCommande(?Commande $commande): self
    {
        $this->commande = $commande;

        return $this;
    }
}
