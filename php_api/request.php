<?php

$url = $_POST['url'] ?? '';
$method = strtoupper($_POST['method'] ?? 'GET');
$body = $_POST['body'] ?? '';

$ch = curl_init();

$options = [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT => 10,
];

if ($method === 'POST') {
    $options[CURLOPT_POST] = true;
    $options[CURLOPT_HTTPHEADER] = ['Content-Type: application/json'];
    $options[CURLOPT_POSTFIELDS] = $body;
}

curl_setopt_array($ch, $options);

$response = curl_exec($ch);
$error = curl_error($ch);

curl_close($ch);

// Output
echo "<pre style='background: white; color: black; padding:1rem;'>";

if ($error) {
    echo "❌ cURL Error:\n$error\n";
} else {
    echo "✅ API Response:\n$response\n";
}

echo "</pre>";
echo "<a href='index.php' style='color: black'>⬅️ Back</a>";
