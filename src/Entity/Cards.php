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
     * @ORM\ManyToOne(targetEntity=Game::class, inversedBy="id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $game;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ImageCards", mappedBy="cards")
     */
    private $idCards;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CurrentCards", inversedBy="currentCards")
     */
    private $currentCards;

    public function __construct()
    {
        $this->idCards = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
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

    public function getCurrentCards(): ?CurrentCards
    {
        return $this->currentCards;
    }

    public function setCurrentCards(?CurrentCards $currentCards): self
    {
        $this->currentCards = $currentCards;

        return $this;
    }



    
}
