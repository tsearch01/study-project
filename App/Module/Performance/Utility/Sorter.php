<?php

/**
 * Sorter Class
 * 
 * Provides functionality to be used by other classes (Performance and MultiPerformance) to analyse and format the large associative arrays that result from the PDO query execution.
 * 
 * resultsSorter is the primary method for this class.
 */
class Sorter 
{
    /**
     * resultsSorter
     * 
     * A method for sorting results from SQL queries returned as associative arrays
     * 
     * Will sort according to performance id. A new array element is created for each performance id with corresponding performance, venue, date and music index. The music index element is itself an array that holds an aggregate of all the music performed for that concert.
     * 
     * @param mixed $results array, a nested array with each element representing a piece of music performed at a given performance.
     * 
     * @return mixed $performance, a nested array with each element representing a performance. Each array containes the indexes: performance, venue, date, music. The music index element is an array that contains as its elements each piece of music performed for that concert.
     */
    public static function resultsSorter(array $results)
    {
        //analyse and manipulate result returned from Database to create new data structures with correct formatting for use.
        $performance;
        $programmed_music;
        $previous_performance_id = 0;
        $music_count = 0;
        $index = 0;
        
        /*loop based sorting algorithm
        *
        *if groups records into array according to performance id.
        *
        *else constructs nested associative array that holds music for each performance.
        */
        foreach($results as $result)
        {
            $performance_id = $result['performance'];
            // ANALYSIS AID FOR SORTING ALGORITHM
            // echo "current p_id:" . $performance_id;
            // echo "<br>";
            // echo "previous p_id:" . $previous_performance_id;
            // echo "<br>";
            // echo "<br>";
        
            if (($performance_id!=$previous_performance_id)) {
                $programmed_music[$music_count]=$result['programmed_music'];
                $performance[$index] = ["performance"=>$result['performance'],"date"=>$result['date'],"venue"=>$result['venue'], "music"=>$programmed_music];
                $music_count++;
            }
            else
            {
                $performance[$index]["music"][$music_count] = $result['programmed_music'];
                $music_count++;
            }
        
            $previous_performance_id=$performance_id;
        
            //NOTE: hardcoded dependency on each performance == 3 works, refactoring design required.
            if ($music_count==3) {
                $performance_id++;
                $music_count=0;
                $index++;
            }
        }
        return $performance;
    }
}