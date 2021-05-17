<?php
require APP_ROOT . '/Module/Performance/Model/PerformanceCrudRepository.php';
require APP_ROOT . '/Module/Performance/Model/PerformanceDataRepository.php';
require APP_ROOT . '/Lib/Api/ExecuteInterface.php';

/**
 * DeletePerformance Class
 * 
 * Provides methods for deleting an existing record in the performance database
 * 
 * @requires PerformanceCrudRepository class, ExecuteInterface interface
 */
class DeletePerformance extends PerformanceCrudRepository implements ExecuteInterface
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
    public function __construct($performance_id = null){

        $this->performanceDataObject = new PerformanceDataRepository;

        $this->performanceDataObject->setPerformanceId($performance_id);
        
    }

    public function execute(){

        echo __METHOD__ . ' called <br>';

        return Parent::deleteById($this->performanceDataObject);

    }

}