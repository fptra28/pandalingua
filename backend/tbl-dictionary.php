<?php
include 'koneksi-db.php'; // Sertakan file koneksi

// Tentukan jumlah data per halaman
$limit = 100; // Jumlah data per halaman

// Ambil parameter pencarian dan halaman
$searchQuery = isset($_GET['search']) ? $_GET['search'] : '';
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit; // Hitung offset

if (isset($_GET['clear']) && $_GET['clear'] == '1') {
    $searchQuery = ''; // Kosongkan parameter pencarian
}

// Modifikasi query SQL dengan pencarian
// Query SQL dengan lima parameter untuk pencarian dan menggunakan LIMIT dan OFFSET
$sql = "SELECT * FROM tbl_dictionary 
        WHERE Simplified LIKE ? 
        OR Traditional LIKE ? 
        OR Pinyin LIKE ? 
        OR English LIKE ? 
        OR Indonesian LIKE ? 
        LIMIT ? OFFSET ?";

$stmt = $conn->prepare($sql);

// Buat parameter pencarian
$searchParam = '%' . $searchQuery . '%';

// Bind parameter ke statement
$stmt->bind_param('sssssii', $searchParam, $searchParam, $searchParam, $searchParam, $searchParam, $limit, $offset);

// Eksekusi statement
$stmt->execute();

// Ambil hasil
$result = $stmt->get_result();


// Periksa jika query gagal
if ($result === FALSE) {
    die("Error: " . $conn->error);
}

// Query total untuk pagination
$totalSql = "SELECT COUNT(*) AS total FROM tbl_dictionary WHERE Simplified LIKE ? OR Traditional LIKE ?";
$totalStmt = $conn->prepare($totalSql);
$totalStmt->bind_param('ss', $searchParam, $searchParam);
$totalStmt->execute();
$totalResult = $totalStmt->get_result();
$totalRow = $totalResult->fetch_assoc();
$totalRecords = $totalRow['total'];
$totalPages = ceil($totalRecords / $limit);

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];

    // Query untuk mendapatkan definisi berdasarkan ID
    $sql = "SELECT * FROM tbl_dictionary WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo '<h2 class="text-2xl font-bold mb-4">Detail Kamus</h2>';
        echo '<table class="min-w-full border-collapse border border-gray-200">';
        echo '  <tr class="bg-gray-100">';
        echo '    <td class="atribut px-4 py-2 border border-gray-300 font-bold">Simplified</td>';
        echo '    <td class="px-4 py-2 border border-gray-300">:</td>';
        echo '    <td class="px-4 py-2 border border-gray-300">' . htmlspecialchars($row["Simplified"]) . '</td>';
        echo '  </tr>';
        echo '  <tr class="bg-white">';
        echo '    <td class="atribut px-4 py-2 border border-gray-300 font-bold">Traditional</td>';
        echo '    <td class="px-4 py-2 border border-gray-300">:</td>';
        echo '    <td class="px-4 py-2 border border-gray-300">' . htmlspecialchars($row["Traditional"]) . '</td>';
        echo '  </tr>';
        echo '  <tr class="bg-gray-100">';
        echo '    <td class="atribut px-4 py-2 border border-gray-300 font-bold">Pinyin</td>';
        echo '    <td class="px-4 py-2 border border-gray-300">:</td>';
        echo '    <td class="px-4 py-2 border border-gray-300">' . htmlspecialchars($row["Pinyin"]) . '</td>';
        echo '  </tr>';
        echo '  <tr class="bg-white">';
        echo '    <td class="atribut px-4 py-2 border border-gray-300 font-bold">English</td>';
        echo '    <td class="px-4 py-2 border border-gray-300">:</td>';
        echo '    <td class="px-4 py-2 border border-gray-300">' . htmlspecialchars($row["English"]) . '</td>';
        echo '  </tr>';
        echo '  <tr class="bg-gray-100">';
        echo '    <td class="atribut px-4 py-2 border border-gray-300 font-bold">Indonesian</td>';
        echo '    <td class="px-4 py-2 border border-gray-300">:</td>';
        echo '    <td class="px-4 py-2 border border-gray-300">' . htmlspecialchars($row["Indonesian"]) . '</td>';
        echo '  </tr>';
        echo '</table>';;
    } else {
        echo '<p>Data not found</p>';
    }
}
?>