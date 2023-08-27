<?php

require_once 'Model.php';

class Hideout extends Model
{
    protected int $id;
    protected string $code;
    protected string $address;
    protected string $country;
    protected string $type;

    public function __construct()
    {
        $this->table = 'hideouts';
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getCountry(): string
    {
        return $this->country;
    }
    public function getType(): string
    {
        return $this->type;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }
    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    public function setCountry(string $country): void
    {
        $this->country = $country;
    }
    public function setType(string $type): void
    {
        $this->type = $type;
    }
}