document.getElementById("performanceFormButton").addEventListener("click", function(e){
    let validationResults = false;

    let venueValidationResults = checkVenueField();
    let programmeValidationResults = checkProgrammeField();
    let performanceValidationResults = checkPerformanceField();
    let dateValidationResults = checkDateField()

    if (venueValidationResults && programmeValidationResults && performanceValidationResults && dateValidationResults){
        validationResults = true
    }
    if (!validationResults) {
        e.preventDefault();
        return false;
    } else {
        return true;
    }
});

function checkVenueField()
{
    let venue = document.getElementById("venueField");
    let venueError = document.getElementById("venueFieldError");
    if (!venue.value) {
        venueError.innerText = "FE: A venue id must be entered.";
        return false;
    } else {
        if (isNaN(venue.value)) {
            venueError.innerText = "FE: A venue id must be a numeric value.";
            return false;
        } else if (!(Number.isInteger(parseFloat(venue.value)))) {
            venueError.innerText = "FE: A venue id must be an integer.";
            return false;
        } else if (venue.value > 3) {
            venueError.innerText = "FE: This venue id is not recognised";
            return false;
        } else {
            console.log("venue validation: PASSED");
            venueError.innerText = "";
            return true;
        }
    }
}

function checkPerformanceField()
{
    let performance = document.getElementById("performanceField");
    let performanceError = document.getElementById("performanceFieldError");
    if (!performance.value) {
        //new performance to be created
        return true;
    } else {
        if (isNaN(performance.value)) {
            performanceError.innerText = "FE: A performance id must be a numeric value.";
            return false;
        } else if (!(Number.isInteger(parseFloat(performance.value)))) {
            performanceError.innerText = "FE: A performance id must be an integer.";
            return false;
        } else if (performance.value > 11) {
            performanceError.innerText = "FE: This performance id is not recognised";
            return false;
        } else {
            console.log("performance validation: PASSED");
            performanceError.innerText = "";
            return true;
        }
    }
}

function checkProgrammeField()
{
    let programme = document.getElementById("programmeField");
    let programmeError = document.getElementById("programmeFieldError");
    if (!programme.value) {
        programmeError.innerText = "FE: A programme id must be entered.";
        return false;
    } else {
        if (isNaN(programme.value)) {
            programmeError.innerText = "FE: A programme id must be a numeric value.";
            return false;
        } else if (!(Number.isInteger(parseFloat(programme.value)))) {
            programmeError.innerText = "FE: A programme id must be an integer.";
            return false;
        } else if (programme.value > 3) {
            programmeError.innerText = "FE: This programme id is not recognised";
            return false;
        } else {
            console.log("programme validation: PASSED");
            programmeError.innerText = "";
            return true;
        }
    }
}

function checkDateField()
{
    let date = document.getElementById("dateField");
    let dateError = document.getElementById("dateFieldError");
    if (!date.value) {
        dateError.innerText = "FE: A date must be entered.";
        return false;
    } else {
        let regex = /^\d{4}-\d{2}-\d{2}\s{1}\d{2}:\d{2}:\d{2}/g;
        if (date.value.match(regex)===null) {
            //1. Check datetime value is of correct format YYYY-MM-DD HH:MM:SS
            dateError.innerText = "FE: A date of the following format must be entered YYYY-MM-DD HH:MM:SS";
            return false;
        }
        console.log("date validation: PASSED");
        dateError.innerText = "";
        return true;
    }
}