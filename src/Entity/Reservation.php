<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?bool $confirmed = null;

    #[ORM\ManyToOne(inversedBy: 'reservations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?user $passenger = null;

    #[ORM\ManyToOne(inversedBy: 'reservations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?ride $ride = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isConfirmed(): ?bool
    {
        return $this->confirmed;
    }

    public function setConfirmed(?bool $confirmed): self
    {
        $this->confirmed = $confirmed;

        return $this;
    }

    public function getPassenger(): ?user
    {
        return $this->passenger;
    }

    public function setPassenger(?user $passenger): self
    {
        $this->passenger = $passenger;

        return $this;
    }

    public function getRide(): ?ride
    {
        return $this->ride;
    }

    public function setRide(?ride $ride): self
    {
        $this->ride = $ride;

        return $this;
    }
}
