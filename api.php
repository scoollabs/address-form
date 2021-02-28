<?php

require_once('_helper.php');

$address = get('address');

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

echo json_encode(to_address_components($address));
