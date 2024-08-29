<?php
session_start();

// Redirect jika tidak login
if (!isset($_SESSION['admin'])) {
    header("Location: ./admin-login.php");
    exit();
}

// Include koneksi database
include '../koneksi/koneksi-db.php';

// Inisialisasi variabel untuk data quiz
$quiz_id = '';
$course_id = '';
$title = '';
$desc = '';

// Cek apakah ada quiz_id yang dikirimkan melalui URL
if (isset($_GET['id'])) {
    $quiz_id = $_GET['id'];

    // Ambil data quiz berdasarkan quiz_id
    $result = $conn->query("SELECT * FROM tbl_quizzes WHERE quiz_id = $quiz_id");
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $course_id = $row['course_id'];
        $title = $row['title'];
        $desc = $row['desc'];
    } else {
        echo "Quiz tidak ditemukan.";
        exit();
    }
} else {
    echo "Quiz ID tidak diberikan.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/svg+xml" href="/assets/img/logo-pandaLingua.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Edit Quiz | Pandalingua</title>
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
        <a href="../admin-Quizzes.php" class="hover:underline">← BACK</a>
        <div class="flex flex-row justify-between item-center">
            <h1 class="text-2xl font-bold">Edit Quiz</h1>
        </div>
        <div class="w-full bg-neutral-200 p-5">
            <form action="../controller/editQuiz.php" method="post" class="flex flex-col gap-3">
                <!-- Hidden input to store quiz_id -->
                <input type="hidden" name="quiz_id" value="<?php echo $quiz_id; ?>">

                <!-- Dropdown to select course -->
                <label for="course_id">Select Course:</label>
                <select id="course_id" name="course_id" required class="border-2 border-neutral-500 px-5 py-2 rounded-xl">
                    <?php
                    // Fetch available courses from the database
                    $result = $conn->query("SELECT course_id, title FROM tbl_course");
                    while ($row = $result->fetch_assoc()) {
                        $selected = ($row['course_id'] == $course_id) ? 'selected' : '';
                        echo '<option value="' . $row['course_id'] . '" ' . $selected . '>' . $row['course_id'] . ' - ' . $row['title'] . '</option>';
                    }
                    ?>
                </select>

                <!-- Input for quiz title -->
                <label for="title">Quiz Title:</label>
                <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($title); ?>" required class="border-2 border-neutral-500 px-5 py-2 rounded-xl">

                <!-- Text area for quiz description -->
                <label for="desc">Quiz Description:</label>
                <textarea id="desc" name="desc" required class="border-2 border-neutral-500 px-5 py-2 rounded-xl"><?php echo htmlspecialchars($desc); ?></textarea>

                <!-- Submit button -->
                <button type="submit" name="submit" class="bg-blue-500 text-white px-5 py-2 rounded-xl hover:bg-blue-900">Update Quiz</button>
            </form>
        </div>
    </div>
</body>
</html>
