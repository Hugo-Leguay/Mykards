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
     * @ORM\Column(type="array")
     * @ORM\OneToOne(targetEntity="App\Entity\ImageCards", cascade={"persist", "remove"})
     */
    private $imageCard;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\CurrentCards", inversedBy="cards")
     */
    private $currentCards;

    public function __construct()
    {
        $this->idCards = new ArrayCollection();
        $this->imageCards = new ArrayCollection();
        $this->currentCards = new ArrayCollection();
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

    public function getImageCard(): ?ImageCards
    {
        return $this->imageCard;
    }

    public function setImageCard(?ImageCards $imageCard): self
    {
        $this->imageCard = $imageCard;

        return $this;
    }

    /**
     * @return Collection|CurrentCards[]
     */
    public function getCurrentCards(): Collection
    {
        return $this->currentCards;
    }

    public function addCurrentCard(CurrentCards $currentCard): self
    {
        if (!$this->currentCards->contains($currentCard)) {
            $this->currentCards[] = $currentCard;
        }

        return $this;
    }

    public function removeCurrentCard(CurrentCards $currentCard): self
    {
        if ($this->currentCards->contains($currentCard)) {
            $this->currentCards->removeElement($currentCard);
        }

        return $this;
    }
}
