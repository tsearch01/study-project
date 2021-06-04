<?php

interface PerformanceCrudRepositoryInterface
{
    public function save(PerformanceDataRepository $performanceDataObject): string;
    public function getList(): array;
    public function getListById(PerformanceDataRepository $performanceDataObject): array;
    public function update(PerformanceDataRepository $performanceDataObject): bool;
    public function deleteById(PerformanceDataRepository $performanceDataObject): bool;
}