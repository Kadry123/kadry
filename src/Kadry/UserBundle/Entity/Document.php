<?php

namespace Kadry\UserBundle\Entity;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Kadry\UserBundle\Model\Document as ModelDocument;

/**
 * Description of Document
 *
 * @author Kamil
 */
class Document extends ModelDocument{
    
    private $file;
    
    public function __toString() {
        return (string)$this->name;
    }
    
    public function getAbsolutePath()
    {
        return null === $this->fileName
            ? null
            : $this->getUploadRootDir().'/'.$this->fileName;
    }

    public function getWebPath()
    {
        return null === $this->fileName
            ? null
            : $this->getUploadDir().'/'.$this->fileName;
    }

    protected function getUploadRootDir()
    {
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        return 'files/documents';
    }
    
    public function upload()
    {
        if (null === $this->getFile()) {
            return;
        }

        $this->getFile()->move(
            $this->getUploadRootDir(),
            $this->getFile()->getClientOriginalName()
        );

        $this->fileName = $this->getFile()->getClientOriginalName();

        $this->file = null;
    }
    
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
    }
    
    public function getFile()
    {
        return $this->file;
    }
}
