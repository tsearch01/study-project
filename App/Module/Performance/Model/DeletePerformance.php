<?php

require_once APP_ROOT . '/Module/Performance/Model/PerformanceCrudRepository.php';
require_once APP_ROOT . '/Module/Performance/Model/PerformanceDataRepository.php';
require_once APP_ROOT . '/Lib/Api/ExecuteInterface.php';

class DeletePerformance extends PerformanceCrudRepository implements ExecuteInterface
{
    private PerformanceDataRepository $performanceDataObject;

    //METHODS
    //Construct Method
    public function __construct($performance_id = null)
    {
        $this->performanceDataObject = new PerformanceDataRepository;
        $this->performanceDataObject->setPerformanceId($performance_id);
    }

    public function execute()
    {
        return Parent::deleteById($this->performanceDataObject);
    }
}

