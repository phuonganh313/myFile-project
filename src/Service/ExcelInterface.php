<?php

namespace Service;

use SplDoublyLinkedList;

interface ExcelInterface
{
    const DETECT_HEADER_ROWS = 20;

    const DETECT_JSON_HEADER_ROWS = 50;

    const ROW_MATCH = 15;

    const FIRST_MATCH = 1;

    const SECOND_ROW = 2;

    const MAX_ROW_XLS = 65535;

    /**
     * @return array
     */
    public function getColumns();

    /**
     * @param $sheets
     * @return SplDoublyLinkedList
     */
    public function getRows($sheets);

    /**
     * @return array
     */
    public function getHeaders();
}