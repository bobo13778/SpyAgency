<?php

require_once 'Model.php';

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
    protected int $specialtyId;
    protected int $agentId;
    protected int $hideoutId;
    protected int $contactId;
    protected int $targetId;

    public function __construct()
    {
        $this->table = 'missions';
        $this->fields = [
                            ['name' =>'Titre',
                            'required' => true,
                            'type' => 'text',
                            'formName' => 'title'
                            ],
                            ['name' =>'Description',
                            'required' => true,
                            'type' => 'text',
                            'formName' => 'description'
                            ],
                            ['name' =>'Nom de code',
                            'required' => true,
                            'type' => 'text',
                            'formName' => 'codeName'
                            ],
                            ['name' =>'Pays',
                            'required' => true,
                            'type' => 'text',
                            'formName' => 'country'
                            ],
                            ['name' =>'Type',
                            'required' => true,
                            'type' => 'text',
                            'formName' => 'type'
                            ],
                            ['name' =>'Status',
                            'required' => true,
                            'type' => 'text',
                            'formName' => 'status'
                            ],            
                            ['name' =>'Date de début',
                            'required' => true,
                            'type' => 'date',
                            'formName' => 'startDate'
                            ],            
                            ['name' =>'Date de fin',
                            'required' => true,
                            'type' => 'date',
                            'formName' => 'endDate'
                            ],            
                            ['name' =>'Spécialité requise',
                            'required' => true,
                            'type' => 'text',
                            'values' => [],
                            'formName' => 'specialtyId'
                            ],            
                            ['name' =>'Agent',
                            'required' => true,
                            'type' => 'text',
                            'values' => [],
                            'formName' => 'agentId'
                            ],            
                            ['name' =>'Planque',
                            'required' => false,
                            'type' => 'text',
                            'values' => [],
                            'formName' => 'hideoutId'
                            ],            
                            ['name' =>'Contact',
                            'required' => true,
                            'type' => 'text',
                            'values' => [],
                            'formName' => 'contactId'
                            ],            
                            ['name' =>'Cible',
                            'required' => true,
                            'type' => 'text',
                            'values' => [],
                            'formName' => 'targetId'
                            ],
                        ];
    }

    public function getFields(): array
    {
        return $this->fields;
    }

    public function setSpecialties(array $specialties): void 
    {
        $this->fields[8]['values'] = $specialties; 
    }

    public function setAgents(array $agents): void 
    {
        $this->fields[9]['values'] = $agents; 
    }

    public function setHideouts(array $hideouts): void 
    {
        $this->fields[10]['values'] = $hideouts; 
    }

    public function setContacts(array $contacts): void 
    {
        $this->fields[11]['values'] = $contacts; 
    }

    public function setTargets(array $targets): void 
    {
        $this->fields[12]['values'] = $targets; 
    }

    public function getTable(): string
    {
        return $this->table;
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

    public function getSpecialtyId(): int
    {
        return $this->specialtyId;
    }

    public function getAgentId(): int
    {
        return $this->agentId;
    }

    public function getHideoutId(): int
    {
        return $this->hideoutId;
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

    public function setspecialtyId(int $specialtyId): void
    {
        $this->specialtyId = $specialtyId;
    }

    public function setAgentId(int $agentId): void
    {
        $this->agentId = $agentId;
    }
    
    public function setHideoutId(int $hideoutId): void
    {
        $this->hideoutId = $hideoutId;
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