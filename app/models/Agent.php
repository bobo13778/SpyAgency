<?php

namespace app\models;

class Agent extends Model
{
    protected int $id;
    protected string $firstname;
    protected string $lastname;
    protected string $dateOfBirth;
    protected string $idCode;
    protected string $nationality;
    protected int $specialtyId;

    public function __construct()
    {
        $this->table = 'agents';
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }
    public function getDateOfBirth(): string
    {
        return $this->dateOfBirth;
    }
    public function getIdCode(): string
    {
        return $this->idCode;
    }
    public function getNationality(): string
    {
        return $this->nationality;
    }
    public function getSpecialtyId(): int
    {
        return $this->specialtyId;
    }


    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }

    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }
    public function setDateOfBirth(string $dateOfBirth): void
    {
        $this->dateOfBirth = $dateOfBirth;
    }
    public function setIdCode(string $idCode): void
    {
        $this->idCode = $idCode;
    }
    public function setNationality(string $nationality): void
    {
        $this->nationality = $nationality;
    }
    public function setSpecialtyId(int $specialtyId): void
    {
        $this->specialtyId = $specialtyId;
    }

}