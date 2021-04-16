<?php
    $data = file_get_contents('data.json');

    $formatted_data = json_decode($data, true);

    if(isset($formatted_data['results'])) {
        $results = $formatted_data['results'];
            
        $formatted_results = array();

        for ($i = 0; $i < count($results); $i++){
            // $results[$i]['name'] = strtoupper($results[$i]['name']); Notice that this is illegal 
            $formatted_results[$i]['name'] = strtoupper($results[$i]['name']);
            $formatted_results[$i]['url'] = $results[$i]['url'];
        };
    } else {
        $formatted_results = $formatted_data;
    };
    
    // $new_arr = array_chunk($formatted_results, 50); //false (or empty parameter) will reindex the chunk numerically
    
    // isset($_GET['page']) ? $page = $_GET['page'] : $page = 1;
    
    // $options = array(
    //     'options' => array(
    //         'min-range' => 0,
    //         'max-range' => (count($new_arr) - 1)
    //         )
    //     );
        
    // $validated_page_number = filter_var($page, FILTER_VALIDATE_INT, $options);
    // if($validated_page_number || $validated_page_number === 0) {  
    //     $json_formatted_results = json_encode($new_arr[$page]);
    //     echo $json_formatted_results;
    // } else {
    //     echo 'No such page';
    // }; // filter_var return number 0 as false => 0 won't be validated => use || $validated_page_number === 0 to include page=0

    // $write_file_result = file_put_contents('formatted_data.json', $json_formatted_results); // Create new JSON file
    $id = $_POST['id'];
    $name = $_POST['name'];
    $type = $_POST['type'];
    $post_name = strtoupper($name);
    $post_data = array('name'=>$post_name, 'type' => $type, 'id' => $id);
    // echo "$post_name <br>";

    // echo '<pre>';
    // print_r($post_data);
    
    $customised_json = json_encode($post_data);
    // echo $customised_json;

    // echo isset($formatted_results[$id]) ? 'true' : 'false';
    // echo '<br>';
    
    if (!in_array($post_name, $formatted_results) && !isset($formatted_results[$id])) {
        array_push($formatted_results, $post_data);        
        $new_json = json_encode($formatted_results);
        echo $new_json;
        
        $success_resp = array('status' => 200, 'message' => '200 OK');
        $success_resp_json = json_encode($success_resp);
        echo $success_resp_json;

        $write_file_result = file_put_contents('data.json', $new_json);
    } else {
        $error_resp = array('status' => 500, 'message' =>'Error saving new pokemon. Duplication found');
        $error_resp_json = json_encode($error_resp);
        echo $error_resp_json;
    };
    
   
    // print_r($formatted_results);
    // echo '</pre>';

?>