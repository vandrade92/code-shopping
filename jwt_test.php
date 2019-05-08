<?php

//header - payload - signature

//header - Saber qual algoritimo e qual o tipo do token
$header = [

     'alg' => 'HS256', //Tipo de Algoritimo (HMAC - SHA256)
     'typ' => 'JWT'    //Qual o tipo do token
];

$header_json = json_encode($header);
$header_base64 = base64_encode($header_json);

echo "Cabecalho JSON: $header_json";
echo "\n";
echo "Cabecalho JWT: $header_base64 ";

//payload - Dados envolvidos

$payload = [

     'first_name' => 'Vagner',
     'last_name' => 'Andrade',
     'email' => 'vagner.matias@gmail.com',
];

$payload_json = json_encode($payload);
$payload_base64 = base64_encode($payload_json);
echo "\n\n";
echo "Payload JSON: $payload_json";
echo "\n";
echo "Payload JWT: $payload_base64 ";

//signature - Dados envolvidos

$key = '9gqwe9asd9n9asd9lasdlkjdqi';

$signature = hash_hmac('sha256', "$header_base64.$payload_base64", $key,true);
$signature_base64 = base64_encode($signature);

echo "\n\n";
echo "Signature: $signature";
echo "\n";
echo "Signature JWT: $signature_base64 ";

$token = "$header_base64.$payload_base64.$signature_base64";
echo "\n\n";
echo "TOKEN: $token";
