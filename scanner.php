// Ejemplo de cómo obtener transacciones desde la API de Solana
$endpoint = "https://api.mainnet-beta.solana.com";
$contractAddress = "TU_CONTRATO_ADDRESS";
$lastSignature = "ULTIMA_FIRMA_GUARDADA"; // Esto es opcional

$data = [
    "jsonrpc" => "2.0",
    "id" => 1,
    "method" => "getConfirmedSignaturesForAddress2",
    "params" => [$contractAddress, ["before" => $lastSignature]]
];

$options = [
    'http' => [
        'header'  => "Content-Type: application/json\r\n",
        'method'  => 'POST',
        'content' => json_encode($data),
    ],
];

$context = stream_context_create($options);
$result = file_get_contents($endpoint, false, $context);
$response = json_decode($result, true);

// Compara con tu base de datos y actualiza según sea necesario
