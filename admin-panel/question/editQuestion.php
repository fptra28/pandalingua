<?php
session_start();

// Redirect jika tidak login
if (!isset($_SESSION['admin'])) {
    header("Location: ./admin-login.php");
    exit();
}

// Include koneksi database
include '../koneksi/koneksi-db.php';

// Tangkap quiz_id dari URL
$quiz_id = isset($_GET['quiz_id']) ? $_GET['quiz_id'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : '';

$question_data = null;

if ($id) {
    // Ambil data pertanyaan berdasarkan question_id
    $stmt = $conn->prepare("SELECT * FROM questions WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $question_data = $result->fetch_assoc();
    }
}
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
        <a href="../admin-question.php?quiz_id=<?php echo $quiz_id; ?>" class="hover:underline">← BACK</a>
        <div class="flex flex-row justify-between items-center">
            <h1 class="text-2xl font-bold">Edit Question</h1>
        </div>
        <div class="w-full bg-neutral-200 p-5">
            <form action="../controller/edit-Question.php" method="post" class="flex flex-col gap-3">
                <!-- Input for quiz ID (hidden) -->
                <input type="hidden" id="quiz_id" name="quiz_id" value="<?php echo $quiz_id; ?>" required>

                <!-- Input for ID (hidden) -->
                <input type="hidden" id="id" name="id" value="<?php echo $id; ?>" required>

                <!-- Input for question text -->
                <label for="question_text">Question Text:</label>
                <input type="text" id="question_text" name="question_text" value="<?php echo $question_data['question_text'] ?? ''; ?>" required class="border-2 border-neutral-500 px-5 py-2 rounded-xl">

                <!-- Input for options -->
                <label for="option_a">Option A:</label>
                <input type="text" id="option_a" name="option_a" value="<?php echo $question_data['option_a'] ?? ''; ?>" required class="border-2 border-neutral-500 px-5 py-2 rounded-xl">

                <label for="option_b">Option B:</label>
                <input type="text" id="option_b" name="option_b" value="<?php echo $question_data['option_b'] ?? ''; ?>" required class="border-2 border-neutral-500 px-5 py-2 rounded-xl">

                <label for="option_c">Option C:</label>
                <input type="text" id="option_c" name="option_c" value="<?php echo $question_data['option_c'] ?? ''; ?>" required class="border-2 border-neutral-500 px-5 py-2 rounded-xl">

                <label for="option_d">Option D:</label>
                <input type="text" id="option_d" name="option_d" value="<?php echo $question_data['option_d'] ?? ''; ?>" required class="border-2 border-neutral-500 px-5 py-2 rounded-xl">

                <!-- Select correct option -->
                <label for="correct_option">Correct Option:</label>
                <select id="correct_option" name="correct_option" required class="border-2 border-neutral-500 px-5 py-2 rounded-xl">
                    <option value="A" <?php echo ($question_data['correct_option'] ?? '') === 'A' ? 'selected' : ''; ?>>A</option>
                    <option value="B" <?php echo ($question_data['correct_option'] ?? '') === 'B' ? 'selected' : ''; ?>>B</option>
                    <option value="C" <?php echo ($question_data['correct_option'] ?? '') === 'C' ? 'selected' : ''; ?>>C</option>
                    <option value="D" <?php echo ($question_data['correct_option'] ?? '') === 'D' ? 'selected' : ''; ?>>D</option>
                </select>

                <!-- Submit button -->
                <button type="submit" name="submit" class="bg-blue-500 text-white px-5 py-2 rounded-xl hover:bg-blue-900">Edit Question</button>
            </form>
        </div>
    </div>

</body>

</html>