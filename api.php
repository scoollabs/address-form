<?php

require_once('_helper.php');

$address = get('address');

header('Content-Type: application/json');
echo json_encode(to_address_components($address));