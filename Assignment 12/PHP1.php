


<?php

$dogBreeds = array("Labrador Retriever", "Pug", "German Shepherd", "Husky", "Golden Retriever", "Dachshund");

$dogBreed = $_GET["dogBreed"];

if ($dogBreed == "")

{

    echo "FOUND:";

}

else

{

    foreach ($dogBreeds as $breed)

    {

        if (stripos($breed, $dogBreed) === 0)

        {

            echo "FOUND: " . $breed;

            exit;

        }

    }

    echo "FOUND: Dog Breed not found.";

}


?>








