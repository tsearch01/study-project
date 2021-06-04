<?php

require_once APP_ROOT . '/Module/Performance/Api/Data/PerformanceDataInterface.php';

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

    /**
     * Image
     * @var string
     */
    protected $image;

    //METHODS
    //performanceInterface Methods
    public function setPerformanceId($id): bool
    {
        $this->performance_id = $id;
        return true;
    }

    public function getPerformanceId(): mixed
    {
        return $this->performance_id;
    }

    public function setVenueId($id): bool
    {
        $this->venue_id = $id;
        return true;
    }

    public function getVenueId(): mixed
    {
        return $this->venue_id;
    }

    public function setProgrammeId($id): bool
    {
        $this->programme_id = $id;
        return true;
    }

    public function getProgrammeId(): mixed
    {
        return $this->programme_id;
    }

    public function setDate($date): bool
    {
        //Convert $date argument to DateTime() data type and use as argument to setDate()
        $dateTime = new DateTime($date);
        $this->date = $dateTime;
        return true;
    }

    public function getDate(): mixed
    {
        return $this->date;
    }

    public function setImage($image): bool
    {
        $this->image = $image;
        return true;
    }

    public function getImage(): mixed
    {
        return $this->image;
    }
}

