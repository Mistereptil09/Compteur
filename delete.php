<?php
include("Bdd.php");

// Vérify if the key 'delete is used
if (isset($_GET['delete'])) {
    $deleteValue = intval($_GET['delete']);
    //deletes the entry with a condition with the value selected
    $bdd->query("DELETE FROM numbers WHERE idnumber='$deleteValue'");
    
    // redirect to the precedent page with a succes message
    header("Location: historic.php?success=1");
    exit(); // ends the script execution
}
// the key 'delete is not used
// Redirect with an error message
header("Location: historic.php?error=1");
exit();
?>
