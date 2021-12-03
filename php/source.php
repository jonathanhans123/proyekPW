<?php
// Set header type konten.
header("Content-Type: application/json; charset=UTF-8");

require_once("koneksi.php");
// Deklarasi variable keyword buah.
$item_nama = $_GET["query"];

// Query ke database.
$query  = $conn->query("SELECT DISTINCT * FROM item WHERE item_nama LIKE '%$item_nama%' ORDER BY item_nama DESC");
$result = $query->fetch_all(MYSQLI_ASSOC);

// Format bentuk data untuk autocomplete.
foreach($result as $data) {
    $output['suggestions'][] = [
        'value' => $data['item_nama'],
        'buah'  => $data['item_nama']
    ];
}

if (! empty($output)) {
    // Encode ke format JSON.
    echo json_encode($output);
}