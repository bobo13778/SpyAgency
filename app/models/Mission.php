<?php

namespace app\models;

class Mission extends Model
{
    protected int $id;
    protected string $title;
    protected string $description;
    protected string $codeName;
    protected string $country;
    protected string $type;
    protected string $status;
    protected string $startDate;
    protected string $endDate;
    protected string $requiredSpecialty;
    protected int $agentId;
    protected int $hideOutId;
    protected int $contactId;
    protected int $targetId;

    public function __construct()
    {
        $this->table = 'missions';
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
    public function getCodeName(): string
    {
        return $this->codeName;
    }
    public function getCountry(): string
    {
        return $this->country;
    }
    public function getType(): string
    {
        return $this->type;
    }
    public function getStatus(): string
    {
        return $this->status;
    }
    public function getStartDate(): string
    {
        return $this->startDate;
    }
    public function getEndDate(): string
    {
        return $this->endDate;
    }
    public function getRequiredSpecialty(): string
    {
        return $this->requiredSpecialty;
    }
    public function getAgentId(): int
    {
        return $this->agentId;
    }
    public function getHideoutId(): int
    {
        return $this->hideOutId;
    }
    public function getContactId(): int
    {
        return $this->contactId;
    }
    public function getTargetId(): int
    {
        return $this->targetId;
    }




    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
    public function setCodeName(string $codeName): void
    {
        $this->codeName = $codeName;
    }
    public function setCountry(string $country): void
    {
        $this->country = $country;
    }
    public function setType(string $type): void
    {
        $this->type = $type;
    }
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }
    public function setStartDate(string $startDate): void
    {
        $this->startDate = $startDate;
    }
    public function setEndDate(string $endDate): void
    {
        $this->endDate = $endDate;
    }
    public function setRequiredSpecialty(string $requiredSpecialty): void
    {
        $this->requiredSpecialty = $requiredSpecialty;
    }
    public function setAgentId(int $agentId): void
    {
        $this->agentId = $agentId;
    }
    public function setHideoutId(int $hideOutId): void
    {
        $this->hideOutId = $hideOutId;
    }
    public function setContactId(int $contactId): void
    {
        $this->contactId = $contactId;
    }
    public function setTargetId(int $targetId): void
    {
        $this->targetId = $targetId;
    }

}