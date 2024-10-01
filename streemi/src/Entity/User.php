<?php

namespace App\Entity;

use App\Repository\UserRepository;
use App\enum\UserAccountStatusEnum;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $username = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\Column(enumType: UserAccountStatusEnum::class)]
    private ?UserAccountStatusEnum $accountstatus = null;

    #[ORM\ManyToOne(inversedBy: 'users')]
    private ?Subscriptions $currentSubscription = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): static
    {
        $this->username = $username;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getAccountstatus(): ?UserAccountStatusEnum
    {
        return $this->accountstatus;
    }

    public function setAccountstatus(UserAccountStatusEnum $accountstatus): static
    {
        $this->accountstatus = $accountstatus;

        return $this;
    }

    public function getCurrentSubscription(): ?Subscriptions
    {
        return $this->currentSubscription;
    }

    public function setCurrentSubscription(?Subscriptions $currentSubscription): static
    {
        $this->currentSubscription = $currentSubscription;

        return $this;
    }
}
