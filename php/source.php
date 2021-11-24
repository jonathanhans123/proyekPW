<?php
    require_once("koneksi.php");

    // Deklarasi variable keyword buah.
$sepatu = $_GET["query"];

// Query ke database.
$query  = $conn->query("SELECT * FROM item WHERE item_nama LIKE '%$sepatu%' ORDER BY item_nama DESC");
$result = $query->fetch_all(MYSQLI_ASSOC);

// Format bentuk data untuk autocomplete.
foreach($result as $data) {
    $output['suggestions'][] = [
        'value' => $data['item_nama'],
        'item_nama'  => $data['item_nama']
    ];
}

if (! empty($output)) {
    // Encode ke format JSON.
    echo json_encode($output);
}
?>