<?php

require __DIR__ . '/../vendor/autoload.php';

$example = new Busuu\ExampleEvent();
$example->setExampleStr("Hello world!");
$example->setExampleInt(1234);

// Encode from PHP to binary
$payload = $example->serializeToString();
printf("Protobuf binary payload (%s bytes): %s \n", strlen($payload), bin2hex($payload));

// Just to compare size diff from Proto and JSON
$json = $example->serializeToJsonString();
printf("Equivalent JSON payload (%s bytes): %s \n\n", strlen($json), $json);

// Decode from binary to PHP
$decoded = new Busuu\ExampleEvent();
$decoded->mergeFromString($payload);
printf(
  "Decoded: example_str is %s, example_int is %s \n",
  $decoded->getExampleStr(),
  $decoded->getExampleInt()
);