<?php
require APP_ROOT . '/Module/Performance/Model/PerformanceCrudRepository.php';
require APP_ROOT . '/Module/Performance/Model/PerformanceDataRepository.php';
require APP_ROOT . '/Lib/Api/ExecuteInterface.php';

/**
 * SavePerformance Class
 * 
 * Provides methods for saving a new record in the performance database
 * 
 * @requires PerformanceCrudRepository class, ExecuteInterface interface
 */
class SavePerformance extends PerformanceCrudRepository implements ExecuteInterface
{
    //PROPERTIES
    /**
     * PerformanceDataRepository object
     * 
     * @return object $performanceDataRepository object that provides access to data for a particular performance.
     */
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
    }

    public function execute()
    {
        return Parent::save($this->performanceDataObject);
    }

}