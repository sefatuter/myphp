<!DOCTYPE html>
<html>
<head>
    <title>🛰️ API Tester</title>
    <style>
        body { font-family: monospace; padding: 2rem; background: white; color: black; }
        input, textarea, select, button { display: block; width: 100%; margin-bottom: 1rem; padding: 0.5rem; font-size: 1rem; }
    </style>
</head>
<body>

<h2>🧪 Simple API Tester</h2>

<form action="request.php" method="POST">
    <label>🔗 API URL:</label>
    <br><br>
    <input type="text" name="url" placeholder="https://api.example.com/data" required>
        <label>⚙️ Method:</label>
    <br><br>
    <select name="method">
        <option value="GET">GET</option>
        <option value="POST">POST</option>
    </select>
    <label>📦 Body (JSON for POST):</label>
    <br><br>
    <textarea name="body" rows="6" placeholder='{"key":"value"}'></textarea>
    <br>
    <button type="submit">🚀 Send Request</button>
</form>
<br>

<?php

$url = "https://api.exchangerate-api.com/v4/latest/USD";
$response = file_get_contents($url);

if ($response !== false) {
    $data = json_decode($response, true);
    echo "💵 EUR rate: " . $data['rates']['EUR'];
} else {
    echo "❌ Request failed.";
}

echo "<br>";

$ch = curl_init();

curl_setopt_array($ch, [
    CURLOPT_URL => "https://api.exchangerate-api.com/v4/latest/USD",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT => 10
]);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo "❌ cURL error: " . curl_error($ch);
} else {
    $data = json_decode($response, true);
    echo "💶 EUR rate: " . $data['rates']['USD'];
}

curl_close($ch);


?>

</body>
</html>
