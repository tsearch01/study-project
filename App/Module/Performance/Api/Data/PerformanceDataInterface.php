<?php

interface PerformanceDataInterface
{
    
    public function setPerformanceId($id);
    public function getPerformanceId();

    public function setVenueId($id);
    public function getVenueId();

    public function setProgrammeId($id);
    public function getProgrammeId();

    public function setDate($date);
    public function getDate();
    
}