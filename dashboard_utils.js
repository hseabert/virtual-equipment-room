/**
 * dashboard_utils.js
 * cs360 - final project
 * author: Hannah Seabert, Tony Shi, Jeb Ely
 * 
 * this file contains javascript functions for various dashboard functionalities
 */

// toggleDisplay
// takes the id of a div & checks whether or not it exists
// if it does not exist, an error will display in the main content window
// if it does exist, the specified div will be displayed and any other will be deactivated
// written by Hannah

// the very first display
var curDisplay = "welcome-content";

function toggleDisplay(id) {
    // check if this id is in the array of div id's
    var displayID = ["welcome-content", "add-item-field", "add-athlete-field"];
    var errDisplay = "err-content";
                
    // first turn off the current display
    var cur = document.getElementById(curDisplay);
    cur.style.display = "none";

    for (var i = 0; i < displayID.length; i++){
        if (displayID[i] == id){
            // find object with id
            var box = document.getElementById(id);
        }
    }

    // now turn on the new display (if valid) 
    // otherwise display error content
    if (box == null){
        var err = document.getElementById(errDisplay);
        err.style.display = "block";
        curDisplay = err.id;
    }
    else{
        box.style.display = "block";
        curDisplay = box.id;
    }
}