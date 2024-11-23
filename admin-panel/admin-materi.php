<?php
session_start();

// Redirect jika tidak login
if (!isset($_SESSION['admin'])) {
    header("Location: ./admin-login.php");
    exit();
}

// Load koneksi database
include_once './koneksi/koneksi-db.php';

// Mengambil quiz_id dari URL dengan aman
$courseId = isset($_GET['course_id']) ? intval($_GET['course_id']) : 0;

// Query untuk mendapatkan pertanyaan berdasarkan quiz_id
$queryMateri = "SELECT lesson_id, course_id, title, content, create_at 
                   FROM tbl_materi WHERE course_id = ?";
if ($stmt = $conn->prepare($queryMateri)) {
    $stmt->bind_param("i", $courseId);
    $stmt->execute();
    $resultQuestions = $stmt->get_result();
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
        <div class="flex flex-row justify-between items-center">
            <a href="./admin-Course.php" class="text-center text-2xl">
                <i class="fa-solid fa-circle-chevron-left"></i> Back
            </a>
            <h1 class="text-2xl font-bold">Materi List</h1>
            <a href="./materi/addMateri.php?course_id=<?php echo $courseId; ?>">
                <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-800">Add New Question</button>
            </a>
        </div>
        <table class="w-full text-left text-sm text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-800">
                <tr class="text-center text-white">
                    <th class="px-6 py-3">ID</th>
                    <th class="px-6 py-3">Title</th>
                    <th class="px-6 py-3">Content</th>
                    <th class="px-6 py-3">Created At</th>
                    <th class="px-6 py-3">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $resultQuestions->fetch_assoc()) : ?>
                    <tr class="bg-gray-300 text-black text-center">
                        <td class="px-6 py-4"><?php echo $row['lesson_id']; ?></td>
                        <td class="px-6 py-4"><?php echo $row['title']; ?></td>
                        <td class="px-6 py-4"><?php echo strip_tags(html_entity_decode($row['content'])); ?></td>
                        <td class="px-6 py-4"><?php echo $row['create_at']; ?></td>
                        <td class="px-6 py-4 flex flex-col items-center justify-center gap-2">
                            <a href="./materi/editMateri.php?course_id=<?php echo $courseId; ?>&lesson_id=<?php echo $row['lesson_id']; ?>" class="w-full bg-blue-500 text-white py-2 px-10 hover:bg-blue-900">Ubah</a>
                            <a href="./controller/deleteMateri.php?lesson_id=<?php echo urlencode($row['lesson_id']); ?>&course_id=<?php echo urlencode($courseId); ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus materi ini?');" class="w-full bg-red-500 text-white py-2 px-10 hover:bg-red-900">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>

</html>