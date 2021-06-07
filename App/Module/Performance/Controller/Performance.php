<?php

require_once APP_ROOT . '/Lib/Base/Controller.php';
require_once APP_ROOT . '/Lib/Helpers/Validation.php';
require_once APP_ROOT . '/Lib/Helpers/MediaHandler.php';

class Performance extends Controller
{
    public function index()
    {
        //Return results from a specific model with params.
        $results = $this->model('Performance', 'ReadPerformance');
        if (!is_null($results)) {
            $this->view('Performance', 'index', $results);
        }
    }

    public function show($id = 1)
    {
        //Require html from a specific view and make data in $data variable accessible to the embedded PHP.
        $results = $this->model('Performance', 'ReadPerformance', $id);
        if (!is_null($results)) {
            $this->view('Performance', 'show', $results);
        }
    }

    public function update()
    {
        $data = [
            "venue_id" => $_POST['venue'],
            "programme_id" => $_POST['programme'],
            "date" => $_POST['date'],
            /*If image is on record then use this image, else let image = null*/
            "image" => null,
            "id" => $_POST['performance'],
            "errorMessages" => ''
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
        //PROGRAMME
        $errorMessages['programme_id'] = Validation::programmeIdValidator($data['programme_id']);
        //VENUE
        $errorMessages['venue_id'] = Validation::venueIdValidator($data['venue_id']);
        //DATE
        $errorMessages['date'] = Validation::dateValidator($data['date']);
        //IMAGE
        if (!empty($_FILES)) {
            $errorMessages['image'] = MediaHandler::imageValidator();
            if (empty($errorMessages['image'])) {
                  $data['image'] = MediaHandler::imageHandler($data['id']);
            }
        };

        //CHECK ERROR MESSAGES SET
        if ((!empty($errorMessages['venue_id'])) || (!empty($errorMessages['programme_id'])) || (!empty($errorMessages['date'])) || (!empty($errorMessages['id']))) {
            $data['errorMessages'] = $errorMessages;
            $this->view('Performance', 'edit', $data);
        } else {
            //CONDITIONAL MODEL CALL
            if (empty($data['id'])) {
                $results = $this->model('Performance', 'SavePerformance', $data);
                header('location: /study-project/performance/show/' . $results);
            } else {
                $this->model('Performance', 'UpdatePerformance', $data);
                header('location: /study-project/performance/show/' . $data['id']);
            }
        }
    }

    public function edit($id = null)
    {
        if (!is_null($id)) {
            //Require html from a specific view and make data in $data variable accessible to the embedded PHP.
            $results = $this->model('Performance', 'ReadPerformance', $id);
            $results = $results[0];
            $this->view('Performance', 'edit', $results);
        } else {
            $this->view('Performance', 'edit');
        }
    }

    public function delete($id = null)
    {
        //Require html from a specific view and make data in $data variable accessible to the embedded PHP.
        $results = $this->model('Performance', 'DeletePerformance', $id);
        if ($results != 0) {
            header('location: /study-project/performance');
        } else {
            die('Something went wrong.');
        }
    }
}

