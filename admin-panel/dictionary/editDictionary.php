<?php
session_start();

// Redirect jika tidak login
if (!isset($_SESSION['admin'])) {
    header("Location: ./admin-login.php");
    exit();
}

// Load koneksi database
include_once '../koneksi/koneksi-db.php';

// Cek jika id dictionary ada di URL
if (!isset($_GET['id'])) {
    die("ID tidak ditemukan.");
}

$id = intval($_GET['id']);

// Query untuk mendapatkan data dictionary berdasarkan ID
$query = "SELECT * FROM tbl_dictionary WHERE id = ?";
if ($stmt = $conn->prepare($query)) {
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        die("Dictionary tidak ditemukan.");
    }

    $dictionary = $result->fetch_assoc();
    $stmt->close();
} else {
    die("Query preparation failed: " . $conn->error);
}

// Tutup koneksi
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/svg+xml" href="/assets/img/logo-pandaLingua.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Add Question | Pandalingua</title>
</head>

<body class="m-0 font-sans flex">
    <!-- Sidebar -->
    <aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen bg-gray-800 text-white shadow-md">
        <div class="h-full px-4 py-6 overflow-y-auto">
            <h2 class="text-xl font-semibold mb-6 text-center">Hallo, <?php echo $_SESSION['admin']; ?>!</h2>
            <nav>
                <a href="../admin-dashboard.php" class="flex hover:bg-gray-700 px-2 py-3 items-center rounded-md group">
                    <svg class="w-5 h-5 text-gray-400 transition duration-75 group-hover:text-gray-100" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                    </svg>
                    <span class="ms-3">Dashboard</span>
                </a>
                <a href="../admin-Course.php" class="flex hover:bg-gray-700 px-2 py-3 items-center rounded-md group">
                    <svg class="w-5 h-5 text-gray-400 transition duration-75 group-hover:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                    </svg>
                    <span class="ms-3">Course</span>
                </a>
                <a href="../admin-Quizzes.php" class="flex hover:bg-gray-700 px-2 py-3 items-center rounded-md group">
                    <svg class="w-5 h-5 text-gray-400 transition duration-75 group-hover:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                    </svg>
                    <span class="ms-3">Quizzes</span>
                </a>
                <a href="../admin-Dictionary.php" class="flex hover:bg-gray-700 px-2 py-3 items-center rounded-md group">
                    <svg class="w-5 h-5 text-gray-400 transition duration-75 group-hover:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                    </svg>
                    <span class="ms-3">Dictionary</span>
                </a>
                <a href="../controller/logout.php" class="flex hover:bg-gray-700 px-2 py-3 items-center rounded-md group">
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
        <a href="../admin-Dictionary.php" class="hover:underline">← BACK</a>
        <div class="flex flex-row justify-between items-center">
            <h1 class="text-2xl font-bold">Add New Dictionary</h1>
        </div>
        <div class="w-full bg-neutral-200 p-5 rounded-xl">
        <form action="../controller/edit-dictionary.php" method="post" class="flex flex-col gap-3">
                <!-- Input for Simplified -->
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($dictionary['id']); ?>">
                <label for="simplified">Simplified:</label>
                <input type="text" id="simplified" name="simplified" value="<?php echo htmlspecialchars($dictionary['Simplified']); ?>" required class="border-2 border-neutral-500 px-5 py-2 rounded-xl">

                <!-- Input for Traditional -->
                <label for="traditional">Traditional:</label>
                <input type="text" id="traditional" name="traditional" value="<?php echo htmlspecialchars($dictionary['Traditional']); ?>" required class="border-2 border-neutral-500 px-5 py-2 rounded-xl">

                <!-- Input for Pinyin -->
                <label for="pinyin">Pinyin:</label>
                <input type="text" id="pinyin" name="pinyin" value="<?php echo htmlspecialchars($dictionary['Pinyin']); ?>" required class="border-2 border-neutral-500 px-5 py-2 rounded-xl">

                <!-- Input for English -->
                <label for="english">English:</label>
                <input type="text" id="english" name="english" value="<?php echo htmlspecialchars($dictionary['English']); ?>" required class="border-2 border-neutral-500 px-5 py-2 rounded-xl">

                <!-- Input for Indonesian -->
                <label for="indonesian">Indonesian:</label>
                <input type="text" id="indonesian" name="indonesian" value="<?php echo htmlspecialchars($dictionary['Indonesian']); ?>" required class="border-2 border-neutral-500 px-5 py-2 rounded-xl">

                <!-- Submit button -->
                <button type="submit" name="submit" class="mt-10 bg-blue-500 text-white px-5 py-2 rounded-xl hover:bg-blue-900">Update Dictionary</button>
            </form>
        </div>
    </div>

</body>

</html>