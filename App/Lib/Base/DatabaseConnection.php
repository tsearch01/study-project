<?php
/**
 * Database Class 
 * 
 * This class can be used to create and retrieve use a Database Connection PDO.
 */
Abstract class DatabaseConnection
{
    //Attributes
    /**
     * PDO object
     * 
     * @return PDO $conn connection to the database.
     */
    private PDO $conn;

    //Methods
    /**
     * setConn
     * 
     * @param null
     * 
     * @return null, creates PDO attribute that is accessible after instantiation.
     */ 
    protected function setConn()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "orchestra";
        $rdbms = "mysql";

        try {
            $this->conn = new PDO("{$rdbms}:host={$servername};dbname={$dbname}",$username,$password);
        }
        catch (PDOException $e) {
            echo "Oops, looks like there was an issue connecting to the database. Check your credentials and try again.";
            if ($err) {
                $e->getMessage();
            }
            exit();
        };
        return true;
    }

    /**
     * getConn
     * 
     * A method for returning the PDO property of a database object
     * 
     * @param null
     * 
     * @return PDO $conn, the property that holds the PDO created by the database constructor method is returned.
     */
    protected function getConn()
    {
        return $this->conn;
    }

}