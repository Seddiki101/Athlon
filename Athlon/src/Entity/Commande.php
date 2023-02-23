<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass=CommandeRepository::class)
 */
class Commande
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $idC;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank(message="ce chanp est obligatoire")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="ce chanp est obligatoire")
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="ce chanp est obligatoire")
     */
    private $statue = 'pending';

    /**
     * @ORM\OneToMany(targetEntity=CommandeItem::class, mappedBy="commande")
     */
    private $orderItem;

    /**
     * @ORM\OneToOne(targetEntity=Livraison::class, mappedBy="commande", cascade={"persist", "remove"})
     */
    private $livraison;

    public function __construct()
    {

    }

    public function getIdC(): ?int
    {
        return $this->idC;
    }

    public function setIdC(int $idC): self
    {
        $this->idC = $idC;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getUser(): ?string
    {
        return $this->user;
    }

    public function setUser(string $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getStatue(): ?string
    {
        return $this->statue;
    }

    public function setStatue(string $statue): self
    {
        $this->statue = $statue;

        return $this;
    }


    /**
     * @return Collection<int, CommandeItem>
     */
    public function getOrderItem(): Collection
    {
        return $this->orderItem;
    }

    public function addOrderItem(CommandeItem $orderItem): self
    {
        if (!$this->orderItem->contains($orderItem)) {
            $this->orderItem[] = $orderItem;
            $orderItem->setCommande($this);
        }

        return $this;
    }

//
    public function removeOrderItem(CommandeItem $orderItem): self
    {
        if ($this->orderItem->removeElement($orderItem)) {
            // set the owning side to null (unless already changed)
            if ($orderItem->getCommande() === $this) {
                $orderItem->setCommande(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getIdC() . "";
    }

    public function getLivraison(): ?Livraison
    {
        return $this->livraison;
    }

    public function setLivraison(?Livraison $livraison): self
    {
        // unset the owning side of the relation if necessary
        if ($livraison === null && $this->livraison !== null) {
            $this->livraison->setCommande(null);
        }

        // set the owning side of the relation if necessary
        if ($livraison !== null && $livraison->getCommande() !== $this) {
            $livraison->setCommande($this);
        }

        $this->livraison = $livraison;

        return $this;
    }

}
