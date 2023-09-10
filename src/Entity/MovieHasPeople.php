<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use App\Repository\MovieHasPeopleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MovieHasPeopleRepository::class)]
#[ApiResource(operations: [
    new Get(),
    new GetCollection(),
    new Post(security: "is_granted('ROLE_ADMIN')"),
    new Put(security: "is_granted('ROLE_ADMIN')"),
    new Delete(security: "is_granted('ROLE_ADMIN')"),
])]
class MovieHasPeople
{


    #[ORM\Column]
    #[ORM\Id]
    private ?int $Movie_id = null;

    #[ORM\Column]
    #[ORM\Id]
    private ?int $People_id = null;

    #[ORM\Column(length: 255)]
    private ?string $role = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $significance = null;



    public function getMovieId(): ?int
    {
        return $this->Movie_id;
    }

    public function setMovieId(int $Movie_id): static
    {
        $this->Movie_id = $Movie_id;

        return $this;
    }

    public function getPeopleId(): ?int
    {
        return $this->People_id;
    }

    public function setPeopleId(int $People_id): static
    {
        $this->People_id = $People_id;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): static
    {
        $this->role = $role;

        return $this;
    }

    public function getSignificance(): ?string
    {
        return $this->significance;
    }

    public function setSignificance(?string $significance): static
    {
        $this->significance = $significance;

        return $this;
    }
}
