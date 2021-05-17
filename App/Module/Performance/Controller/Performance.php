<?php
require APP_ROOT . '/Lib/Base/Controller.php';

require APP_ROOT . '/Lib/Helpers/Validation.php';


/**
 * Performance
 * 
 * Extends Controller class
 * 
 * Methods available index(), performance($params)
 * 
 */
class Performance extends Controller{

    public function index(){
        
            //Return results from a specific model with params.
            $results = $this->model('Performance','ReadPerformance');

            if(!is_null($results)){

                $this->view('Performance','index', $results);

            }
    }

    public function show($id=1){

        echo __METHOD__ . ' called <br>';


        //Require html from a specific view and make data in $data variable accessible to the embedded PHP.
        $results = $this->model('Performance','ReadPerformance', $id);

        if(!is_null($results)){

            $this->view('Performance','show', $results);
        }

    }

    public function update()
    {

        echo __METHOD__ . ' called <br>';

        $data = [
            "venue_id" => $_POST['venue'],
            "programme_id" => $_POST['programme'],
            "date" => $_POST['date'],
            "id" => $_POST['performance'],
            "errorMessages" => ""
        ];

        $errorMessages = [
            "venue_id" => "",
            "programme_id" => "",
            "date" => "",
            "id" => ""
        ];

        //VALIDATION
        //PERFORMANCE
        $errorMessages['id'] = Validation::performanceIdValidator($data['id']);

        //VENUE
        $errorMessages['venue_id'] = Validation::venueIdValidator($data['venue_id']);

        //PROGRAMME
        $errorMessages['programme_id'] = Validation::programmeIdValidator($data['programme_id']);

        //DATE
        $errorMessages['date'] = Validation::dateValidator($data['date']);


        //CHECK ERROR MESSAGES SET
        if ( (!empty($errorMessages['venue_id'])) || (!empty($errorMessages['programme_id'])) || (!empty($errorMessages['date'])) || (!empty($errorMessages['id'])) ) {
            $data['errorMessages'] = $errorMessages;

            $this->view('Performance','edit', $data);
         } else {
            echo('PASSES VALIDATION');
            //CONDITIONAL MODEL CALL
            if(empty($data['id'])){
                $results = $this->model('Performance', 'SavePerformance', $data);

                header('location: /studyproject/performance/show/' . $results);
            } else {
                $this->model('Performance', 'UpdatePerformance', $data);

                header('location: /studyproject/performance/show/' . $data['id']);
            }
        }
    }

    public function edit($id=null){

        if(!is_null($id)){
            //Require html from a specific view and make data in $data variable accessible to the embedded PHP.
            $results = $this->model('Performance','ReadPerformance', $id);

            $results = $results[0];

            $this->view('Performance','edit', $results);
        } else {
            $this->view('Performance','edit');
        }

    }

    public function delete($id=null){

        //Require html from a specific view and make data in $data variable accessible to the embedded PHP.
        $results = $this->model('Performance','DeletePerformance', $id);

        if($results != 0){

            header('location: /studyproject/performance');

        } else {

            die('Something went wrong.');

        }
    }
}

