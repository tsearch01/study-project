<?php

require APP_ROOT . '/Module/Performance/Api/Data/PerformanceDataInterface.php';


class PerformanceDataRepository implements PerformanceDataInterface
{
    //PROPERTIES
    /**
     * Performance id
     * @var int
     */
    protected $performance_id;

    /**
     * Venue id
     * @var int
     */
    protected $venue_id;

    /**
     * Programme id
     * @var int
     */
    protected $programme_id;

    /**
     * Date and time of performance
     * @var datetime
     */
    protected $date;

    //METHODS
    //performanceInterface Methods
    public function setPerformanceId($id){

        $this->performance_id = $id;
    }

    public function getPerformanceId(){

        return $this->performance_id;
    }

    public function setVenueId($id){

        $this->venue_id = $id;
    }

    public function getVenueId(){

        return $this->venue_id;

    }

    public function setProgrammeId($id){

        $this->programme_id = $id;
    }

    public function getProgrammeId(){

        return $this->programme_id;

    }

    public function setDate($date){

        //Convert $date argument to DateTime() data type and use as argument to setDate()
        $dateTime = new DateTime($date);
        
        $this->date = $dateTime;
    }

    public function getDate(){

        return $this->date;

    }
}