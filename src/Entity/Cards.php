<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CardsRepository")
 */
class Cards
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
    private $Type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Image;

    /**
     * @ORM\ManyToOne(targetEntity=Game::class, inversedBy="id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $game;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ImageCards", mappedBy="cards")
     */
    private $idCards;

    public function __construct()
    {
        $this->idCards = new ArrayCollection();
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->Type;
    }

    public function setType(string $Type): self
    {
        $this->Type = $Type;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->Image;
    }

    public function setImage(string $Image): self
    {
        $this->Image = $Image;

        return $this;
    }

    public function getGame(): ?Game
    {
        return $this->game;
    }

    public function setGame(?Game $game): self
    {
        $this->game = $game;

        return $this;
    }

    /**
     * @return Collection|ImageCards[]
     */
    public function getIdCards(): Collection
    {
        return $this->idCards;
    }

    public function addIdCard(ImageCards $idCard): self
    {
        if (!$this->idCards->contains($idCard)) {
            $this->idCards[] = $idCard;
            $idCard->setCards($this);
        }

        return $this;
    }

    public function removeIdCard(ImageCards $idCard): self
    {
        if ($this->idCards->contains($idCard)) {
            $this->idCards->removeElement($idCard);
            // set the owning side to null (unless already changed)
            if ($idCard->getCards() === $this) {
                $idCard->setCards(null);
            }
        }

        return $this;
    }



    
}
