<?php

namespace Mhakkou\LearningTracker\Entities;

use DateTime;
use Mhakkou\LearningTracker\Enumeration\AccountStatusEnum;

class User {
    public function __construct(
        private ?int $id,
        private ?string $lastName,
        private ?string $firstName,
        private ?string $email,
        private ?string $password,
        private ?DateTime $registredAt,
        private ?AccountStatusEnum $accountStatus,
        private ?DateTime $lastLoginAt
    )
    {
        $this->registredAt = $this->registredAt ?? new DateTime();
        $this->accountStatus = $this->accountStatus ?? AccountStatusEnum::ACTIVE;
    }

    public function getId(): ?int 
    {
        return $this->id;
    }

    public function getLastname(): ?string 
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): static
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): static
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): static
    {
        $this->email = $email;
        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): static
    {
        $this->password = $password;
        return $this;
    }

    public function getAccountStatus(): ?AccountStatusEnum
    {
        return $this->accountStatus;
    }

    public function setAccountStatus(?AccountStatusEnum $accountStatus): static
    {
        $this->accountStatus = $accountStatus;
        return $this;
    }

    public function getLastLoginAt(): ?DateTime
    {
        return $this->lastLoginAt;
    }

    public function setLastLoginAt(?DateTime $lastLoginAt): static
    {
        $this->lastLoginAt = $lastLoginAt;
        return $this;
    }
    
    public function getRegistredAt(): DateTime
    {
        return $this->registredAt;
    }

    public function setRegistredAt(?DateTime $registredAt):static
    {
        $this->registredAt = $registredAt;
        return $this;
    }
}