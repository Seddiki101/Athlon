<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Form\ProduitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Psr\Log\LoggerInterface;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
#[Assert\NotBlank(message:"Le titre  est obligatoire")]
#[Assert\Length(
    max :15,
    maxMessage : "Le titre ne doit pas dépasser {{ limit }} caractères")]
#[Assert\Regex(
    pattern: "/^[a-zA-Z0-9_ ]+$/",
    message: "Le titre ne doit contenir que des lettres, des chiffres, des espaces ou des underscores")]
    #[Assert\Length(
        max :15,
        maxMessage : "Le nom de machine ne doit pas dépasser {{ limit }} caractères")]
    
private $titre;


    #[ORM\Column(length: 255)]
    private ?string $auteur = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"La description de l'exercice est obligatoire")]
    #[Assert\Length(
        max :15,
        maxMessage : "La description d exercice ne doit pas dépasser {{ limit }} caractères")]
    private string $descripton ;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imgArticle = null;

    #[ORM\ManyToOne(inversedBy: 'articleX')]
    private ?Sujet $SujetX = null;

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

    public function getAuteur(): ?string
    {
        return $this->auteur;
    }

    public function setAuteur(string $auteur): self
    {
        $this->auteur = $auteur;

        return $this;
    }

    public function getDescripton(): ?string
    {
        return $this->descripton;
    }

    public function setDescripton(string $descripton): self
    {
        $this->descripton = $descripton;

        return $this;
    }

    public function getImgArticle(): ?string
    {
        return $this->imgArticle;
    }

    public function setImgArticle(?string $imgArticle): self
    {
        $this->imgArticle = $imgArticle;

        return $this;
    }

    public function getSujetX(): ?Sujet
    {
        return $this->SujetX;
    }

    public function setSujetX(?Sujet $SujetX): self
    {
        $this->SujetX = $SujetX;

        return $this;
    }
	
	
	
	
	public function __toString(): string
	{
		return ("Article ".$this.getTitre() );
	}
	
	
	
}



