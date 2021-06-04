<?php

use JetBrains\PhpStorm\Pure;

class Validation
{

    public static function performanceIdValidator(mixed $num): string
    {
        $errorMessage = "";
        if (empty($num)) {
            //new performance to be created
        } else {
            //CHECK venue index in POST array is a numeric value
            if (!is_numeric($num)) {
                $errorMessage = "BE: This value must be numeric";
            } else if (intval(floatval($num)) != floatval($num)) {
                //CHECK venue index in POST array is not a float
                $errorMessage = "BE: An integer must be entered for this value";
            } else if ($num > 4) {
                //CHECK venue index in POST array is within range of known venue id integers
                $errorMessage = "BE: This performance id is not recognised";
            }
        }
        return $errorMessage;
    }

    public static function venueIdValidator(mixed $num): string
    {
        $errorMessage = "";
        if (empty($num)) {
            $errorMessage = "BE: A venue id must be entered";
        } else {
            //CHECK venue index in POST array is a numeric value
            if (!is_numeric($num)) {
                $errorMessage = "BE: This value must be numeric";
            } else if (intval(floatval($num)) != floatval($num)) {
                //CHECK venue index in POST array is not a float
                $errorMessage = "BE: An integer must be entered for this value";
            } else if ($num > 3) {
                //CHECK venue index in POST array is within range of known venue id integers
                $errorMessage = "BE: This venue id is not recognised";
            }
        }
        return $errorMessage;
    }

    public static function programmeIdValidator(mixed $num): string
    {
        $errorMessage = "";
        if (empty($num)) {
            $errorMessage = "BE: A venue id must be entered";
        } else {
            //CHECK venue index in POST array is a numeric value
            if (!is_numeric($num)) {
                $errorMessage = "BE: This value must be numeric";
            } else if (intval(floatval($num)) != floatval($num)) {
                //CHECK venue index in POST array is not a float
                $errorMessage = "BE: An integer must be entered for this value";
            } else if ($num > 3) {
                //CHECK venue index in POST array is within range of known venue id integers
                $errorMessage = "BE: This venue id is not recognised";
            }
        }
        return $errorMessage;
    }

    public static function dateValidator(string $date): string
    {
        $errorMessage = "";
        //CHECK date index in POST array
        if (empty($date)) {
            //CHECK value has been entered for date field
            $errorMessage = "BE: A date must be entered";
        } else {
            if (!Validation::dateFormatValidator($date)) {
                //CHECK date value submitted conforms to YYYY-MM-DD HH:MM:SS format
                $errorMessage = "BE: A date of the following format must be entered YYYY-MM-DD HH:MM:SS";
            } else if (!Validation::todayDateCheck($date)) {
                //CHECK date value is not today
                $errorMessage = "BE: The date for this performance cannot be today";
            } else if (!Validation::pastDateCheck($date)) {
                //CHECK date value submitted is not a date in the past.
                $errorMessage = "BE: date for this performance cannot be in the past";
            }
        }
        return $errorMessage;
    }

    /**
     *validateDate() will compare $_POST['date'] with DateTime format 'Y-m-d H:i:s'.
     */
    public static function dateFormatValidator(string $date, string $format = "Y-m-d H:i:s"): bool
    {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }

    /**
     * todayDateCheck() will convert the $_POST['date'] value into a DateTime object then isolate the date component ('Y-m-d') as a string and compare with today's date.
    */
    public static function todayDateCheck(string $date): bool
    {
        $format = "Y-m-d";
        $date = new DateTime($date);
        $dateStr = $date->format($format);
        $today = new DateTime();
        $todayStr = $today->format($format);
        if ($todayStr == $dateStr) {
            return 0;
        } else {
            return 1;
        }
    }

    /**
     * pastDate() will create new DateTime object using date and compare with current date, if in the past then send false
     */
    public static function pastDateCheck(string $date): bool
    {
        $date = new DateTime($date);
        $today = new DateTime();
        if (!($today<$date)) {
            return false;
        } else {
            return true;
        }
    }
}

