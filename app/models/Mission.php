<?php

require_once 'Model.php';

class Mission extends Model
{
    protected int $id;
    protected string $title;
    protected string $description;
    protected string $codeName;
    protected int $countryId;
    protected int $typeId;
    protected int $statusId;
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
                            'values' => [],
                            'formName' => 'countryId'
                            ],
                            ['name' =>'Type',
                            'required' => true,
                            'type' => 'text',
                            'values' => [],
                            'formName' => 'typeId'
                            ],
                            ['name' =>'Status',
                            'required' => true,
                            'type' => 'text',
                            'values' => [],
                            'formName' => 'statusId'
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

    public function setCountries(array $countries): void 
    {
        $this->fields[3]['values'] = $countries; 
    }

    public function setTypes(array $types): void 
    {
        $this->fields[4]['values'] = $types; 
    }

    public function setStatusList(array $status): void 
    {
        $this->fields[5]['values'] = $status; 
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

    public function getCountryId(): int
    {
        return $this->countryId;
    }

    public function getTypeId(): int
    {
        return $this->typeId;
    }

    public function getStatus(): int
    {
        return $this->statusId;
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

    public function setCountryId(int $countryId): void
    {
        $this->countryId = $countryId;
    }

    public function setTypeId(int $typeId): void
    {
        $this->typeId = $typeId;
    }

    public function setStatusId(int $statusId): void
    {
        $this->statusId = $statusId;
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