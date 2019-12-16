<?php
    error_reporting(E_ALL); 
    ini_set("display_errors", 1); 

    include_once ('./includes/db_config.php'); 
    include_once ('./includes/Pokemon.php'); 

    $file_handle = fopen('./pokemon.csv', 'r');

    // read the first line, which is a row of headers

    $first_line = fgetcsv($file_handle);
    
    // prints out the headers here

    for($i=0; $i<count($first_line); $i++){
        print_r('<div style ="background-color:goldenrod">'.'Column header found: '.$first_line[$i].'<br>'.'</div>');
    }
    // creates an empty array to be filled with pokemon

    $pokemons = array();
    
    // this loop reads through the data file and makes a Pokemon object for each row
    // these objects are then stored in the $pokemons array

    while($data_row = fgetcsv($file_handle)){

        $pokemon = new Pokemon();
        $pokemon->setData($data_row);
    // this calls the setData function which does the stuff that the code that was here before did
        array_push($pokemons, $pokemon);
    }
    // this loop goes through the $albums array i just made and prints out the data for each album
    for($i=0; $i<count($pokemons); $i++){

        $pokemons[$i]->getData();

        print_r('</p>');
    }
    // close the files
    fclose($file_handle);
?>