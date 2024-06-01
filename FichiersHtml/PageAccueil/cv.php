<style>
    body {
    font-family: Arial, sans-serif;
    margin: 20px;
    padding: 20px;
    background-color: #f9f9f9;
    color: #333;
}

h1 {
    color: #2c3e50;
    border-bottom: 2px solid #2c3e50;
    padding-bottom: 10px;
}

h2 {
    color: #34495e;
    border-bottom: 1px solid #bdc3c7;
    padding-bottom: 5px;
    margin-top: 20px;
}

h3 {
    color: #2980b9;
    margin-bottom: 5px;
}

p {
    margin: 5px 0 15px 0;
    line-height: 1.6;
}

ul {
    list-style-type: disc;
    padding-left: 20px;
}

ul li {
    margin-bottom: 10px;
}

.address, .phone, .email {
    font-size: 0.9em;
    color: #7f8c8d;
}

</style>

<?php
function display_resume($xml_file) {
    $xml = simplexml_load_file($xml_file) or die("Error: Cannot create object");

    echo "<h1>" . $xml->personalInformation->name . "</h1>";
    echo "<p>" . $xml->personalInformation->address . "<br>";
    echo $xml->personalInformation->phone . "<br>";
    echo $xml->personalInformation->email . "</p>";

    echo "<h2>Objectif</h2>";
    echo "<p>" . $xml->objective->statement . "</p>";

    echo "<h2>Expérience</h2>";
    foreach ($xml->experience->job as $job) {
        echo "<h3>" . $job->title . " at " . $job->company . "</h3>";
        echo "<p>" . $job->location . " | " . $job->duration . "</p>";
        echo "<ul>";
        foreach ($job->responsibilities->responsibility as $responsibility) {
            echo "<li>" . $responsibility . "</li>";
        }
        echo "</ul>";
    }

    echo "<h2>Éducation</h2>";
    foreach ($xml->education->degree as $degree) {
        echo "<h3>" . $degree->level . "</h3>";
        echo "<p>" . $degree->institution . ", " . $degree->location . " (" . $degree->year . ")</p>";
    }

    echo "<h2>Compétences</h2>";
    echo "<ul>";
    foreach ($xml->skills->skill as $skill) {
        echo "<li>" . $skill . "</li>";
    }
    echo "</ul>";

    echo "<h2>Références</h2>";
    foreach ($xml->references->reference as $reference) {
        echo "<p>" . $reference->name . "<br>";
        echo $reference->contact . "<br>";
        echo $reference->relationship . "</p>";
    }
}





if (isset($_POST['resume'])) {
    display_resume("xmlcvs/".$_POST['resume']);
} else {
    echo "No resume found.";
}

?>
