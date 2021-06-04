<?php

interface PerformanceDataInterface
{
    
    public function setPerformanceId($id): bool;
    public function getPerformanceId(): mixed;

    public function setVenueId($id): bool;
    public function getVenueId(): mixed;

    public function setProgrammeId($id): bool;
    public function getProgrammeId(): mixed;

    public function setDate($date): bool;
    public function getDate(): mixed;

    public function setImage($image): bool;
    public function getImage(): mixed;
    
}