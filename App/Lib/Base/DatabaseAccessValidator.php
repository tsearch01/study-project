<?php
require APP_ROOT . '/Lib/Base/DatabaseConnection.php';

/**
 * DatabaseValidator
 * 
 * A wrapper class that checks whether the table in the database that has been requested to operate on exists, and meets access criteria from client code.
 * 
 * implements extends DatabaseConnection (abstract). 
 */
abstract class DatabaseAccessValidator extends DatabaseConnection{
   
     //PROPERTIES
     /**
     * string table
     * 
     * @return string $table database table upon which this classes methods will operate.
     */
     private string $table;

     /**
     * array tables
     * 
     * @return array $db_tables array that contains the name for all tables to operate on
     */
     private array $db_tables = ['performance','venue','programme','programmed_music', 'season_music', 'orchestra_library'];
     //TABLE DATA STRUCTURE TO BE IMPLEMENTED VIA READING UPLOADED TXT FILE.

     //METHODS
     //Set table property to argument string
     protected function databaseAccessValidator($table){

          //Initialise table property with string argument value
          $this->table = $table;

          //Check table matches table in the database to operate on
          if(in_array($this->table, $this->db_tables)){ 

          }else{
               echo $table . ' is not a recognised database table, please insert a recognised table';
          }

          return Parent::setConn();
     }

     protected function databaseAccess(){

          if(is_null(Parent::getConn()))
          {
               echo 'database connection not validated yet, please call databaseAccessValidator($table) with an existing, accessible table.';

          }else{

               return Parent::getConn();

          }
     }

}