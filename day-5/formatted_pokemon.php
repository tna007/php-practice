<?php
    $data = file_get_contents('data.json');

    $formatted_data = json_decode($data, true);
    $results = $formatted_data['results'];

    $formatted_results = array();

    for ($i = 0; $i < count($results); $i++){
        // $results[$i]['name'] = strtoupper($results[$i]['name']); Notice that this is illegal 
        $formatted_results[$i]['name'] = strtoupper($results[$i]['name']);
        $formatted_results[$i]['url'] = $results[$i]['url'];
    }
    
    
    $new_arr = array_chunk($formatted_results, 50); //false (or empty parameter) will reindex the chunk numerically
    
    isset($_GET['page']) ? $page = $_GET['page'] : $page = 1;
    
    $options = array(
        'options' => array(
            'min-range' => 0,
            'max-range' => (count($new_arr) - 1)
            )
        );
        
    $validated_page_number = filter_var($page, FILTER_VALIDATE_INT, $options);
    if($validated_page_number || $validated_page_number === 0) {   
        $page = $page - 1;
        $json_formatted_results = json_encode($new_arr[$page]);
        echo $json_formatted_results;
    } else {
        echo 'No such page';
    }; // filter_var return number 0 as false => 0 won't be validated => use || $validated_page_number === 0 to include page=0

    $write_file_result = file_put_contents('formatted_data.json', $json_formatted_results); // Create new JSON file
?>