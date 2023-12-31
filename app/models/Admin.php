<?php

require_once 'Model.php';

class Admin extends Model
{
    protected int $id;
    protected string $firstname;
    protected string $lastname;
    protected string $email;
    protected string $password;
    protected string $creationDate;

    public function __construct()
    {
        $this->table = 'admin';
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
            ['name' =>'Email',
            'required' => true,
            'type' => 'text',
            'formName' => 'email'
            ],
            ['name' =>'Mot de passe',
            'required' => true,
            'type' => 'password',
            'formName' => 'password'
            ]
        ];
    }

    public function getFields(): array
    {
        return $this->fields;
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

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getCreationDate(): string
    {
        return $this->creationDate;
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

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }
    
    public function setCreationDate(string $creationDate): void
    {
        $this->creationDate = $creationDate;
    }

}