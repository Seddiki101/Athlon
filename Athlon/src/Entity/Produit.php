<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ProduitRepository::class)]
class Produit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"veuillez remplir ce champs")]
    private ?string $brand = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"veuillez remplir ce champs")]
    private ?string $description = null;


    
    #[ORM\Column]
    #[Assert\NotBlank(message:"veuillez remplir ce champs")]
    #[Assert\NotEqualTo(
        value : 0,
        message:"Le prix ne doit pas etre egal à 0"
        )]
        #[Assert\Type(
            type: 'float',
            message: 'The value {{ value }} is not a valid {{ type }}.',
        )]
    private ?float $prix = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"veuillez remplir ce champs")]
    #[Assert\Type('string')]
    
    private ?string $nom = null;

    #[ORM\ManyToOne(inversedBy: 'produits')]
    #[Assert\NotBlank(message:"veuillez remplir ce champs")]
    private ?Categorie $Categories = null;


    public function getId(): ?int
    {
        return $this->id;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

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

    public function getCategories(): ?Categorie
    {
        return $this->Categories;
    }

    public function setCategories(?Categorie $Categories): self
    {
        $this->Categories = $Categories;

        return $this;
    }
}
