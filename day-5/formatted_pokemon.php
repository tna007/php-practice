<?php
    function json_response($code = 200, $message = null) {
        // clear the old headers
        header_remove();
        // set the actual code
        http_response_code($code);
        // set the header to make sure cache is forced
        header('Cache-Control: no-transform, public, max-age=300, s-maxage=900');
        // treat this as json
        header('Content-Type: application/json');

        $status = array(
            200 => '200 OK',
            400 => '400 Bad Request',
            404 => 'Page Not Found',
            500 => '500 Internal Server Error',
        );
        //ok, validation err or failure
        header("Status $status[$code]");
        // return the encoded json
        return json_encode(array(
            'status' => $code,
            'message' => $message,
        ));
    }
    // allow page parameter on top of the code in order for fetching to work
    isset($_GET['page']) ? $page = $_GET['page'] : $page = 0;

    $data = file_get_contents('data.json');

    $formatted_data = json_decode($data, true); // retrieve original array data from original data.json
    $results = $formatted_data['results'];

    // validate GET request data ($page parameter)
    if($_SERVER['REQUEST_METHOD'] == 'GET' && $page >= 0 && $page <= (ceil(count($results) / 50))) {          
        $formatted_results = array();

        for ($i = 0; $i < count($results); $i++){
            // $results[$i]['name'] = strtoupper($results[$i]['name']); Notice that this is illegal 
            $formatted_results[$i]['name'] = strtoupper($results[$i]['name']);
            $formatted_results[$i]['url'] = $results[$i]['url'];
        };

        $new_arr = array_chunk($formatted_results, 50); //false (or empty third parameter) will reindex the chunk numerically

        $json_formatted_results = json_encode($new_arr[$page]);
        echo $json_formatted_results;

        // Create new JSON file
        $write_file_result = file_put_contents('formatted_data.json', $json_formatted_results); 

    } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // validate POST request data ($name & $id)
        if(!empty($_POST['name']) && !empty($_POST['id'])) {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $type = $_POST['type'];
            $post_name = strtolower($name);
            $post_data = array('name'=>$post_name, 'type' => $type, 'id' => $id);

            if (!in_array($post_name, $results) && !isset($results[$id])) {
                array_push($formatted_data, $post_data);        
                $new_json = json_encode($formatted_data);
                
                echo json_response(200, 'Add Pokemon successfully');
                echo $new_json;
                
                $write_file_result = file_put_contents('data.json', $new_json);
            } else {
                echo json_response(500, 'Error saving new pokemon. Duplication found');
            };

        } else {
            echo json_response(400, 'Bad Request. Missing Pokemon Name & Id');
        }

    } else {
        echo json_response(404, 'Page Not Found');
    };
    
?>