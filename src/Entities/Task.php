<?php 

namespace Mhakkou\LearningTracker\Entities;

use DateTime;
use Mhakkou\LearningTracker\Enumeration\TaskStatusEnum;

class Task {

public function __construct(
    private ?int $id,
    private ?string $title,
    private ?string $description,
    private ?DateTime $createdAt,
    private ?DateTime $updatedAt,
    private ?Topic $topic,
    private ?TaskStatusEnum $status
)
{
    $this->createdAt = $this->createdAt ?? new DateTime();
    $this->status = $this->status ?? TaskStatusEnum::NOT_STARTED;
}
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(?string $title): static
    {
        $this->title = $title;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;
        return $this;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?DateTime $createdAt): static
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getUpdatedAt(): ?DateTime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?DateTime $updatedAt): static
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    public function getTopic(): Topic
    {
        return $this->topic;
    }

    public function setTopic(?Topic $topic): static
    {
        $this->topic = $topic;

        return $this;
    }


    public function getStatus(): TaskStatusEnum
    {
        return $this->status;
    }


    public function setStatus(?TaskStatusEnum $status): static
    {
        $this->status = $status;

        return $this;
    }
}