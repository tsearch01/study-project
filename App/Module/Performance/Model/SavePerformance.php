<?php

require_once APP_ROOT . '/Module/Performance/Model/PerformanceCrudRepository.php';
require_once APP_ROOT . '/Module/Performance/Model/PerformanceDataRepository.php';
require_once APP_ROOT . '/Lib/Api/ExecuteInterface.php';

class SavePerformance extends PerformanceCrudRepository implements ExecuteInterface
{
    private PerformanceDataRepository $performanceDataObject;

    //METHODS
    //Construct Method
    public function __construct(array $performanceData)
    {
        $this->performanceDataObject = new PerformanceDataRepository;
        $this->performanceDataObject->setPerformanceId($performanceData['id']);
        $this->performanceDataObject->setVenueId($performanceData['venue_id']);
        $this->performanceDataObject->setProgrammeId($performanceData['programme_id']);
        $this->performanceDataObject->setDate($performanceData['date']);
        $this->performanceDataObject->setImage($performanceData['image']);
    }

    public function execute()
    {
        return Parent::save($this->performanceDataObject);
    }
}

