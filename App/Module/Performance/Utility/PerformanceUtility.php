<?php
require APP_ROOT . '/Lib/Base/DatabaseConnection.php';
require APP_ROOT . '/Module/Performance/Utility/Sorter.php';

/**
 * Performance Class
 * 
 * Provides methods for acquiring information regarding a particluar performance specified using an id argument.
 * 
 * @requires DatabaseConnection.php, Sorter.php
 */
class PerformanceUtility extends DatabaseConnection
{

    /**
     * getPerformanceInfoById
     * 
     * A method for acquiring data for a given performance.
     * 
     * This method takes a $performance_id argument ($performance_id = matching integer of a database performance.id field) and uses the PDO $conn attribute for this class to prepare and execute an SQL query that will return a compound associative array. This compound array will contain an array for each piece performed for the performance specified by the $performance_id.  Each array contains the following associative indexes: performance, data, venue, music. Note the depedency on the resultsSorter() to group the returned arrays according to performance.
     * 
     * @param int $performance_id, database id for a performance
     * 
     * @return mixed $performance, associative array of performance record data.
     */
    public function getPerformanceInfoById(int $performance_id)
    {
        //get database connection object
        Parent::setConn();
        $conn = Parent::getConn();

        //store SQL query as a string variable.
        $sql = "SELECT performance, date, venue, programmed_music FROM
        (SELECT performance.id AS performance, performance.date AS date, venue.name AS venue, season_music.performable_music AS programmed_music FROM
        performance
        LEFT JOIN venue ON performance.venue_id = venue.id
        LEFT JOIN programme ON performance.programme_id = programme.id
        LEFT JOIN programmed_music ON programme.id = programmed_music.programme_id
        LEFT JOIN season_music ON programmed_music.season_music_id = season_music.id) as r
        WHERE performance = ?;";

        //prepare statement with placeholder value ready for binding
        $stmt = $conn->prepare($sql);

        $stmt->bindValue(1, $performance_id, PDO::PARAM_INT);

        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $results = Sorter::resultsSorter($results);

        return $results;
    }

    /**
     * getAllPerformancesInfo
     * 
     * A method for acquiring all performance data
     * 
     * This method uses the PDO $conn attribute for this class to prepare and execute an SQL query that will return a compound associative array. This compound array will contain an array for each piece performed for at each performance. Each array contains the following associative indexes: performance, data, venue, music. Note the depedency on the resultsSorter() to group the returned arrays according to performance.
     * 
     * @param int $performance_id, database id for a performance
     * 
     * @return mixed $performance, associative array of performance record data.
     */
    public function getAllPerformancesInfo()
    {

        //get database connection object
        Parent::setConn();
        $conn = Parent::getConn();

        //store SQL query as a string variable.
        $sql = "SELECT performance, date, venue, programmed_music FROM
        (SELECT performance.id AS performance, performance.date AS date, venue.name AS venue, season_music.performable_music AS programmed_music FROM
        performance
        LEFT JOIN venue ON performance.venue_id = venue.id
        LEFT JOIN programme ON performance.programme_id = programme.id
        LEFT JOIN programmed_music ON programme.id = programmed_music.programme_id
        LEFT JOIN season_music ON programmed_music.season_music_id = season_music.id) as r;";
        
        // //Prepare query, successful preparation creates PDOStatement object, failure creates a PDOException object.
        try{
            $stmt = $conn->query($sql);
        }//if query preparation is unsuccessful as PDOException object is thrown, establish Catch conditional for this.
        catch(PDOException $e)
        {
            //print out the error information sent to the PDO object, and contained within the new PDOException object.
            echo "Oops, looks like there was an issue with your database query.";
            if($err)
            {
                echo $this->conn->errorCode();
                var_dump($this->conn->errorInfo());
                echo $e->getMessage();
            }
            exit();
        }
        
        //Perform query on database to return records that meet query conditions, return as associative array.
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $results = Sorter::resultsSorter($results);

        return $results;
    }   
}