<?php

namespace App\Models;

abstract class Entity {

    protected $tableName; 

    protected $db;

    public function __construct() {
        $this->db = $this->getDB();
    }

    private function getDB()
    {
        if ($this->db==null) {
            try {
                 return new \PDO('mysql:host=mysql;dbname=test','test', 'test');
            } catch (\Exception $e) {
                throw new \Exception('Error creating a database connection ');
            }
        }
    }

    // public function save() {
    //     $class = new \ReflectionClass($this);
    //     $tableName = '';
    
    //     if ($this->tableName != '') {
    //         $tableName = $this->tableName;
    //     } else {
    //         $tableName = strtolower($class->getShortName());
    //     }

    //     $propsToImplode = [];
    //     foreach ($class->getProperties(\ReflectionProperty::IS_PUBLIC) as $property) {
    //         $propertyName = $property->getName();
    //         if ($propertyName!='id') $propsToImplode[] = '`'.$propertyName.'` = "'.$this->{$propertyName}.'"';
    //     }

    //     $setClause = implode(',',$propsToImplode);
    //     $sqlQuery = '';

    //     if ($this->id > 0) {
    //         $sqlQuery = 'UPDATE `'.$tableName.'` SET '.$setClause.' WHERE id = '.$this->id;
    //     } else {
    //         $sqlQuery = 'INSERT INTO `'.$tableName.'` SET '.$setClause.'';
    //     }
        
    //     $result = $this->db->exec($sqlQuery);
        
    //     return $result;
    // }

    public function create(array $data) {
        $tableName = $this->tableName;

        $propsToImplode[] = '`created_at` = "'.date('Y-m-d').'"';

        foreach ($data as $key => $value) {
            $propsToImplode[] = '`'.$key.'` = "'.$value.'"';
        }

        $setClause = implode(',',$propsToImplode);
        $sqlQuery = 'INSERT INTO `'.$tableName.'` SET '.$setClause.'';

        try {
            $result = $this->db->exec($sqlQuery);
            return $result;
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }

    public function get() {
        $tableName = $this->tableName;
        $sqlQuery = "SELECT * FROM $tableName ORDER BY `id` DESC";

        $statement = $this->db->prepare($sqlQuery);
        // $statement->setFetchMode(\PDO::FETCH_CLASS, '\DusanKasan\Knapsack\Collection'); 
        $statement->setFetchMode(\PDO::FETCH_ASSOC);
        $statement->execute();
        return $statement->fetchAll();
        
    }

    static public function morph(array $object) {

        $class = new \ReflectionClass(get_called_class());
    
        $entity = $class->newInstance();
    
        foreach($class->getProperties(\ReflectionProperty::PUBLIC) as $prop) {
            if (isset($object[$prop->getName()])) {
                $prop->setValue($entity, $object[$prop->getName()]);
            }
        }
    
        $entity->initialize();
    
        return $entity;
    }
  }