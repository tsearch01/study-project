<?php

interface PerformanceCrudRepositoryInterface
{
    public function save(PerformanceDataRepository $performanceDataObject);
    public function getList();
    public function getListById(PerformanceDataRepository $performanceDataObject);
    public function update(PerformanceDataRepository $performanceDataObject);
    public function deleteById(PerformanceDataRepository $performanceDataObject);
}