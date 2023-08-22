<?php

namespace app\models;

class Target extends Model
{
    protected int $id;
    protected string $firstname;
    protected string $lastname;
    protected string $dateOfBirth;
    protected string $codeName;
    protected string $nationality;

    public function __construct()
    {
        $this->table = 'targets';
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
    public function getCodeName(): string
    {
        return $this->codeName;
    }
    public function getNationality(): string
    {
        return $this->nationality;
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
    public function setCodeName(string $codeName): void
    {
        $this->codeName = $codeName;
    }
    public function setNationality(string $nationality): void
    {
        $this->nationality = $nationality;
    }


}