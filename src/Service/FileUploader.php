<?php

namespace App\Service;


use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUploader
{
    /** @var string */
    private $targetDirectory;

    /**
     * @param string $targetDirectory
     */
    public function __construct(string $targetDirectory)
    {
        $this->targetDirectory = $targetDirectory;
    }

    /**
     * @return string
     */
    public function getTargetDirectory() : string
    {
        return $this->targetDirectory;
    }

    public function upload(UploadedFile $file) : string
    {
        $filename = md5(uniqid()) . '.' . $file->guessExtension();

        $file->move($this->targetDirectory, $filename);

        return $filename;
    }

}