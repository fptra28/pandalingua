<?php
session_start();

// Redirect jika tidak login
if (!isset($_SESSION['admin'])) {
    header("Location: ./admin-login.php");
    exit();
}

// Load koneksi database
include_once './koneksi/koneksi-db.php';

// Jumlah item per halaman
$itemsPerPage = 50;

// Menentukan halaman saat ini
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$page = ($page > 0) ? $page : 1;

// Hitung offset
$offset = ($page - 1) * $itemsPerPage;

// Ambil parameter pencarian dari URL
$search = isset($_GET['search']) ? trim($_GET['search']) : '';

// Query total record dengan pencarian
$totalQuery = "SELECT COUNT(*) AS total FROM tbl_dictionary WHERE Simplified LIKE ? OR Traditional LIKE ? OR Pinyin LIKE ? OR English LIKE ? OR Indonesian LIKE ?";
$searchParam = "%$search%";
if ($stmt = $conn->prepare($totalQuery)) {
    $stmt->bind_param("sssss", $searchParam, $searchParam, $searchParam, $searchParam, $searchParam);
    $stmt->execute();
    $totalResult = $stmt->get_result();
    $totalRow = $totalResult->fetch_assoc();
    $totalItems = $totalRow['total'];
    $totalPages = ceil($totalItems / $itemsPerPage);
} else {
    die("Query preparation failed: " . $conn->error);
}

// Query untuk mengambil data dengan pagination dan pencarian
$query = "SELECT * FROM tbl_dictionary WHERE Simplified LIKE ? OR Traditional LIKE ? OR Pinyin LIKE ? OR English LIKE ? OR Indonesian LIKE ? LIMIT $itemsPerPage OFFSET $offset";
if ($stmt = $conn->prepare($query)) {
    $stmt->bind_param("sssss", $searchParam, $searchParam, $searchParam, $searchParam, $searchParam);
    $stmt->execute();
    $resultDictionary = $stmt->get_result();
} else {
    die("Query preparation failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/svg+xml" href="/assets/img/logo-pandaLingua.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Admin Dashboard | Pandalingua</title>
</head>

<body class="m-0 font-sans flex">
    <!-- Sidebar -->
    <aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen bg-gray-800 text-white shadow-md">
        <div class="h-full px-4 py-6 overflow-y-auto">
            <h2 class="text-xl font-semibold mb-6 text-center">Hallo, <?php echo $_SESSION['admin']; ?>!</h2>
            <nav>
                <a href="./admin-dashboard.php" class="flex hover:bg-gray-700 px-2 py-3 items-center rounded-md group">
                    <svg class="w-5 h-5 text-gray-400 transition duration-75 group-hover:text-gray-100" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                    </svg>
                    <span class="ms-3">Dashboard</span>
                </a>
                <a href="./admin-Course.php" class="flex hover:bg-gray-700 px-2 py-3 items-center rounded-md group">
                    <svg class="w-5 h-5 text-gray-400 transition duration-75 group-hover:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                    </svg>
                    <span class="ms-3">Course</span>
                </a>
                <a href="./admin-Quizzes.php" class="flex hover:bg-gray-700 px-2 py-3 items-center rounded-md group">
                    <svg class="w-5 h-5 text-gray-400 transition duration-75 group-hover:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                    </svg>
                    <span class="ms-3">Quizzes</span>
                </a>
                <a href="./admin-Dictionary.php" class="flex hover:bg-gray-700 px-2 py-3 items-center rounded-md group">
                    <svg class="w-5 h-5 text-gray-400 transition duration-75 group-hover:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                    </svg>
                    <span class="ms-3">Dictionary</span>
                </a>
                <a href="./controller/logout.php" class="flex hover:bg-gray-700 px-2 py-3 items-center rounded-md group">
                    <svg class="w-5 h-5 text-gray-400 transition duration-75 group-hover:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                    </svg>
                    <span class="ms-3">LOGOUT</span>
                </a>
            </nav>
        </div>
    </aside>

     <!-- Main Content -->
     <div id="content" class="w-full flex flex-col ml-64 p-10 gap-5">
        <div class="flex flex-row justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Dictionary</h1>
            <div class="flex items-center gap-4">
                <!-- Search Bar -->
                <form method="GET" action="./admin-Dictionary.php" class="flex items-center">
                    <input type="text" name="search" placeholder="Search..." value="<?php echo htmlspecialchars($search); ?>" class="px-4 py-2 border rounded-md" />
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md ml-2 hover:bg-blue-800">Search</button>
                </form>
                <!-- Add Dictionary Button -->
                <a href="./dictionary/addDictionary.php">
                    <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-800">Add Dictionary</button>
                </a>
            </div>
        </div>

        <table class="w-full text-left text-sm text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-800">
                <tr class="text-center text-white">
                    <th class="px-6 py-3">ID</th>
                    <th class="px-6 py-3">Simplified</th>
                    <th class="px-6 py-3">Traditional</th>
                    <th class="px-6 py-3">Pinyin</th>
                    <th class="px-6 py-3">English</th>
                    <th class="px-6 py-3">Indonesian</th>
                    <th class="px-6 py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($resultDictionary)) : ?>
                    <tr class="bg-gray-300 text-black text-center">
                        <td class="px-6 py-4"><?php echo htmlspecialchars($row['id']); ?></td>
                        <td class="px-6 py-4"><?php echo htmlspecialchars($row['Simplified']); ?></td>
                        <td class="px-6 py-4"><?php echo htmlspecialchars($row['Traditional']); ?></td>
                        <td class="px-6 py-4"><?php echo htmlspecialchars($row['Pinyin']); ?></td>
                        <td class="px-6 py-4"><?php echo htmlspecialchars($row['English']); ?></td>
                        <td class="px-6 py-4"><?php echo htmlspecialchars($row['Indonesian']); ?></td>
                        <td class="px-6 py-4 flex flex-col gap-2 h-full">
                            <a href="./dictionary/editDictionary.php?id=<?php echo htmlspecialchars($row['id']); ?>" class="w-full bg-blue-500 text-white py-2 px-10 hover:bg-blue-900">Edit</a>
                            <a href="./controller/delete-Dictionary.php?id=<?php echo htmlspecialchars($row['id']); ?>" class="w-full bg-red-500 text-white py-2 px-10 hover:bg-red-900">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <div class="mt-4">
            <nav aria-label="Page navigation">
                <ul class="flex justify-center gap-2">
                    <?php if ($page > 1): ?>
                        <li><a href="?page=<?php echo $page - 1; ?>&search=<?php echo urlencode($search); ?>" class="px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-600">Previous</a></li>
                    <?php endif; ?>

                    <?php
                    $range = 2; 
                    $start = max(1, $page - $range);
                    $end = min($totalPages, $page + $range);

                    if ($start > 1) {
                        echo '<li><a href="?page=1&search=' . urlencode($search) . '" class="px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-600">1</a></li>';
                        if ($start > 2) {
                            echo '<li class="px-4 py-2">...</li>';
                        }
                    }

                    for ($i = $start; $i <= $end; $i++):
                        $active = ($i == $page) ? 'bg-blue-500 text-white' : 'bg-gray-800 text-white hover:bg-gray-600';
                    ?>
                        <li><a href="?page=<?php echo $i; ?>&search=<?php echo urlencode($search); ?>" class="px-4 py-2 rounded <?php echo $active; ?>"><?php echo $i; ?></a></li>
                    <?php endfor; ?>

                    <?php if ($end < $totalPages) {
                        if ($end < $totalPages - 1) {
                            echo '<li class="px-4 py-2">...</li>';
                        }
                        echo '<li><a href="?page=' . $totalPages . '&search=' . urlencode($search) . '" class="px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-600">' . $totalPages . '</a></li>';
                    }

                    if ($page < $totalPages): ?>
                        <li><a href="?page=<?php echo $page + 1; ?>&search=<?php echo urlencode($search); ?>" class="px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-600">Next</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </div>
</body>

</html>