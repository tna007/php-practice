<?php 
    /**
     * GET /recipes
     * return all recipes
     * 
     * GET /recipes/{id}
     * return recipes with the specific id if found
     * 
     * POST /recipes
     * parameters must exist
     * if we have id, name, ingredients, difficulty
     * add a new recipe to our recipes array and save the json
     * 
     * PUT /recipes
     * parameters must exist
     * if we have id, name, ingredients, difficulty
     * find if there is a recipe with such id, if found, update
     * 
     * DELETE /recipes/{id}
     * delete recipe with the matching id if found
     * 
    */
    
$data = file_get_contents('test.json');
$request = $_SERVER['REQUEST_METHOD'];

$uri = $_SERVER['REQUEST_URI'];
$parts = parse_url($uri);

echo '<pre>';
echo $data;
print_r($parts);// result is an array with 2 elements: path and query(string after the path and ?)

parse_str($parts['query'], $params);
print_r($params); // result is an array that has elements made of query string, e.g query = 'name=soup&ingredients=water' then params = array(name => soup, ingredients => water) 

$exploded_parts = explode('/',$parts);
print_r($parts); // suppose there will be or not an id for the requested recipes in the path; result will return an array which will check that condition
echo '</pre>';

switch ($request) {
    case 'GET':
        get_recipes();
        break;
    case 'POST':
        add_new_recipes();
        break;
    case 'PUT':
        update_recipes();
        break;
    case 'DELETE':
        remove_recipes();
        break;
    default:
        echo json_encode(array('message' => 'Error'));
        break;
}
// use $GLOBALS to access global variables (in this case is $exploded_parts and $data)
function get_recipes(){
    if (!isset($GLOBALS['exploded_parts'][2])) {
        echo $GLOBALS['data'];
    } else {
        echo json_encode(array('recipes' => 'here is your recipes'));
    }
}

?>