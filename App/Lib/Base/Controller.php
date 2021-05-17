<?php

/**
 * Controller
 * 
 * Serves as the base class for all table specific controllers
 * 
 * Methods available model($model, $params), view($view, $data)
 * 
 */
abstract class Controller
{
    protected function model($module, $model, $params=null)
    {
        //Return results from a specific model with params.
        if (file_exists(APP_ROOT . '/Module/' . $module . '/Model/' . $model . '.php')) {
            require APP_ROOT . '/Module/' . $module . '/Model/' . $model . '.php';
            $model = new $model($params);
            $results = $model->execute();
            return $results;
        } else {
            echo APP_ROOT . '/Module/' . $module . '/Model/' . $model . '.php does not exist.<br>';
        }
    }

    protected function view($module, $view, $data=null)
    {
        // Require html from a specific view and make data in $data variable accessible to the embedded PHP.
        if (file_exists(APP_ROOT . '/Module/' . $module . '/view/' . $view . '.php')) {
            require APP_ROOT . '/Module/' . $module . '/view/' . $view . '.php';
        } else {
            echo APP_ROOT . '/Module/' . $module . '/view/' . $view . '.php';
        }
    }
}