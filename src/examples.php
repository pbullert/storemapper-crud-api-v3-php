<?php
require_once ('storemapper_api.php');

/***************
Query all Stores 
****************/
$allStores              = $storemapper->query_all();
if($allStores){
    foreach($allStores as $store){
        echo '<p>Name: ' . $store->name . '<br>';
        echo 'Address: ' . $store->address . '</p>';
    }
}

/*******************
Query a single Store 
********************/
$name = 'University of South Dakota';
$address = '414 E. Clark Street, Vermillion, SD 57069, USA';
//$singleStore              = $storemapper->query_single($name, $address);
if($singleStore){
    foreach($singleStore as $store){
        echo '<p>Name: ' . $store->name . '<br>';
        echo 'Address: ' . $store->address . '</p>';
    }
}

/*******************
Create a Store
********************/
$query = array(
    'name' => 'University of South Dakota',
    'address' => '414 E. Clark Street, Vermillion, SD 57069, USA',
    //  'phone'                 => '',
    //  'email'                 => '',
    //  'url'                   => '',
    //  'description'           => '',
    //  'category'              => '',
    //  'custom_field_1'        => '',
    //  'custom_field_2'        => '',
    //  'custom_field_3'        => '',
    //  'image_url'             => '',
    //  'custom_marker_url'     => '',
    //  'latitude'              => '',
    //  'longitude'             => '',
    'hidden' => 'true',
    //  'tier'                  => '',
    
);
//$createStore = $storemapper->create($query);
//echo $createStore->id;


/*******************
Update a Store
********************/
$id = '13772523'; //insert store id
$query = array(
    'name' => 'University of South Dakota',
    'address' => '414 E. Clark Street, Vermillion, SD 57069, USA',
    //  'phone'                 => '',
    //  'email'                 => '',
    //  'url'                   => '',
    //  'description'           => '',
    //  'category'              => '',
    //  'custom_field_1'        => '',
    //  'custom_field_2'        => '',
    //  'custom_field_3'        => '',
    //  'image_url'             => '',
    //  'custom_marker_url'     => '',
    //  'latitude'              => '',
    //  'longitude'             => '',
    //  'hidden'                => 'true',
    //  'tier'                  => '',
    
);
//$updateStore = $storemapper->update($id, $query);
//echo $updateStore->id;


/*******************
Delete a Store
********************/
$id = '13772533'; //insert store id
//$deleteStore = $storemapper->delete($id);

?>
