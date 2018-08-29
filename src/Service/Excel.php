<?php

namespace Service;

use Exception;

use PHPExcel_Reader_IReader;
use PHPExcel_Shared_Date;
use PHPExcel_Worksheet;
use SplDoublyLinkedList;

class Excel implements ExcelInterface
{
    protected $excel;
    protected $headers;
    protected $rows = [];
    protected $filePath;
    protected $inputFileType;
    public function __construct($filePath)
    {
        $this->inputFileType = \PHPExcel_IOFactory::identify($filePath);

        /**
         * @var PHPExcel_Reader_IReader $objReader
         */
        $objReader = \PHPExcel_IOFactory::createReaderForFile($filePath);
        $objPHPExcel = $objReader->load($filePath);

    }

    public function getColumns()
    {
        if (is_array($this->headers)) {
            return $this->headers;
        }
        // todo
        return [];
    }

    public function getRows($filename)
    {
        // Tosses exception
        $reader = \PHPExcel_IOFactory::createReaderForFile($filename);

        // Need this otherwise dates and such are returned formatted
        /** @noinspection PhpUndefinedMethodInspection */
        $reader->setReadDataOnly(true);

        // Just grab all the rows
        $wb = $reader->load($filename);
        $ws = $wb->getSheet(0);
        $rows = $ws->toArray();

        return $rows;
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }
}