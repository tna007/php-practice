<?php
    $data = file_get_contents('data.json');

    // echo '<pre>';
    $formatted_data = json_decode($data, true);
    $results = $formatted_data['results'];
    $formatted_results = array();

    for ($i = 0; $i <= count($results); $i++){
        // $results[$i]['name'] = strtoupper($results[$i]['name']); Notice that this is illegal 
        $formatted_results[$i]['name'] = strtoupper($results[$i]['name']);
        $formatted_results[$i]['url'] = $results[$i]['url'];
    }

    // print_r($formatted_data);
    // echo '</pre>';

    $json_formatted_results = json_encode($formatted_results);
    echo $json_formatted_results;

    /**
     * Create new JSON file
     */
    $write_file_result = file_put_contents('formatted_data.json', $json_formatted_results);
?>