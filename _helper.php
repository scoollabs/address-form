<?php

function get($key) {
  return isset($_GET[$key]) ? $_GET[$key] : '';
}

function address_components_str($address_components) {
  $house_number = $address_components->house_number;
  $road = $address_components->road;
  $town = $address_components->town;
  $state = $address_components->state;
  $state_code = $address_components->state_code;
  $country = $address_components->country;
  return "$house_number $road $town $state $state_code $country";
}

function api_get($url, $data) {
  $curl = curl_init();

  curl_setopt($curl, CURLOPT_URL, $url . '?' . http_build_query($data));
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
//  curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($curl, CURLOPT_HTTPGET, 1);

  $output = curl_exec($curl);

  curl_close($curl);
  return $output;
}

function to_object($array) {
  return json_decode(json_encode($array));
}

function to_address_components($address) {
  $param = array(
    'q' => $address,
    'key' => 'YOUR_KEY',
  );
  $response = json_decode(api_get('https://api.opencagedata.com/geocode/v1/json', $param));
  // print_r($response);
  $results = $response->results;
  if (count($results) > 0) {
    // print_pre($response->results[0]);
    $components = $results[0]->components;
    $town = isset($components->town) ? $components->town : '';
    $house_number = isset($components->house_number) ? $components->house_number : '';
    $city = isset($components->city) ? $components->city : '';
    $postcode = isset($components->postcode) ? $components->postcode : '';
    $state_code = isset($components->state_code) ? $components->state_code : '';
    $state = isset($components->state) ? $components->state : '';
    $road = isset($components->road) ? $components->road : '';
    return to_object(
      array(
        'house_number' => $house_number,
        'road' => $road,
        'city' => $city,
        'town' => $town,
        'postcode' => $postcode,
        'state' => $state,
        'state_code' => $state_code,
        'country' => $components->country,
      )
    );
  } else {
    return to_object(
      array(
        'house_number' => '',
        'road' => '',
        'town' => '',
        'city' => '',
        'postcode' => '',
        'state' => '',
        'state_code' => '',
        'country' => '',
      )
    );
  }
}
