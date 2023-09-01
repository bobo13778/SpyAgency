<?php

require_once 'Model.php';

class Specialty  extends Model
{
  protected int $id;
  protected string $name;

  public function __construct()
  {
      $this->table = 'specialties';
      $this->fields = [
                        ['name' =>'Nom',
                        'required' => true,
                        'type' => 'text',
                        'formName' => 'name'
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
  
  public function getId() : int {
    return $this->id;
  }

  public function getName() : string {
    return $this->name;
  }

  public function setId(int $id) : void {
    $this->id = $id;
  }

  public function setName(string $name) : void {
    $this->name = $name;
  }

}