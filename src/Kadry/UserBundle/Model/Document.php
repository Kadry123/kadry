<?php

namespace Kadry\UserBundle\Model;

/**
 * Description of Document
 *
 * @author Kamil
 */
class Document {
    
    protected $id;
    
    protected $fileName;
    
    protected $name;
    
    public function getId() {
        return $this->id;
    }

    public function getFileName() {
        return $this->fileName;
    }

    public function setFileName($fileName) {
        $this->fileName = $fileName;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }
}