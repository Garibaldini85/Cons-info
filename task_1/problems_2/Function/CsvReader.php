<?php

class CsvReader
{
    public $error = null;

    public $errorString;
    private $handlerFile;

    private $csvHeader;
    private $csvItem;

    public function __construct($csvFile)
    {
        $this->handlerFile = @fopen($csvFile, "r");
        if ($this->handlerFile === FALSE) {
            $this->error = error_get_last();
            $this->errorString = $this->error['message'];
        } else {
            $this->readHeader();
        }
    }

    public function __destruct() {
        if ($this->handlerFile !== FALSE) {
            fclose($this->handlerFile);
        }
    }

    public function getCsvItem() {
        return $this->csvItem;
    }

    public function getCsvHeader()
    {
        return $this->csvHeader;
    }

    public function getErrorString()
    {
        return $this->errorString;
    }

    public function readHeader()
    {
        if (($this->csvHeader = fgetcsv($this->handlerFile)) === FALSE) {
            $this->error = error_get_last();
            $this->errorString = $this->error['message'];
        }
    }

    public function next()
    {
        if (($this->csvItem = fgetcsv($this->handlerFile)) === FALSE) {
            return false;
        }
        return true;
    }
}