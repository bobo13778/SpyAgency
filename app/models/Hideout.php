<?php

require_once 'Model.php';

class Hideout extends Model
{
    protected int $id;
    protected string $code;
    protected string $address;
    protected int $countryId;
    protected string $type;

    public function __construct()
    {
        $this->table = 'hideouts';
        $this->fields = [
                            ['name' =>'Code',
                            'required' => true,
                            'type' => 'text',
                            'formName' => 'code'
                            ],
                            ['name' =>'Adresse',
                            'required' => true,
                            'type' => 'text',
                            'formName' => 'address'
                            ],
                            ['name' =>'Pays',
                            'required' => true,
                            'type' => 'text',
                            'values' => [],
                            'formName' => 'countryId'
                            ],
                            ['name' =>'Type',
                            'required' => true,
                            'type' => 'text',
                            'formName' => 'type'
                            ]
                        ];
    }

    public function getFields(): array
    {
        return $this->fields;
    }

    public function setCountries(array $countries): void 
    {
        $this->fields[2]['values'] = $countries; 
    }


    public function getTable(): string
    {
        return $this->table;
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

    public function getCountryId(): int
    {
        return $this->countryId;
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

    public function setCountryId(int $countryId): void
    {
        $this->countryId = $countryId;
    }
    
    public function setType(string $type): void
    {
        $this->type = $type;
    }
}