<?php

require_once 'Model.php';

class Agent extends Model
{
    protected int $id;
    protected string $firstname;
    protected string $lastname;
    protected string $dateOfBirth;
    protected string $idCode;
    protected int $countryId;
    protected int $specialtyId;

    public function __construct()
    {
        $this->table = 'agents';
        $this->fields = [
                            ['name' =>'Prénom',
                            'required' => true,
                            'type' => 'text',
                            'formName' => 'firstname'
                            ],
                            ['name' =>'Nom',
                            'required' => true,
                            'type' => 'text',
                            'formName' => 'lastname'
                            ],
                            ['name' =>'Date de naissance',
                            'required' => false,
                            'type' => 'date',
                            'formName' => 'dateOfBirth'
                            ],
                            ['name' =>'Nom de code',
                            'required' => true,
                            'type' => 'text',
                            'formName' => 'idCode'
                            ],
                            ['name' =>'Nationalité',
                            'required' => true,
                            'type' => 'text',
                            'values' => [],
                            'formName' => 'countryId'
                            ],
                            ['name' =>'Spécialité',
                            'required' => true,
                            'type' => null,
                            'values' => [],
                            'formName' => 'specialtyId'
                            ]
                        ];
    }

    public function getFields(): array
    {
        return $this->fields;
    }

    public function setSpecialties(array $specialties): void 
    {
        $this->fields[5]['values'] = $specialties; 
    }

    public function setCountries(array $countries): void 
    {
        $this->fields[4]['values'] = $countries; 
    }

    public function getTable(): string
    {
        return $this->table;
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

    public function getcountryId(): int
    {
        return $this->countryId;
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

    public function setcountryId(int $countryId): void
    {
        $this->countryId = $countryId;
    }
    
    public function setSpecialtyId(int $specialtyId): void
    {
        $this->specialtyId = $specialtyId;
    }

}