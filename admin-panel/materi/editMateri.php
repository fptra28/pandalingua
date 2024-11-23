<?php
session_start();

// Redirect if not logged in
if (!isset($_SESSION['admin'])) {
    header("Location: ./admin-login.php");
    exit();
}

// Ensure database connection
include '../koneksi/koneksi-db.php';

// Capture course_id and lesson_id from URL
$courseId = isset($_GET['course_id']) ? $_GET['course_id'] : '';
$lesson_id = isset($_GET['lesson_id']) ? $_GET['lesson_id'] : '';

// Initialize materi data as null
$materi_data = null;

if ($lesson_id) {
    // Fetch existing materi data by lesson_id
    $stmt = $conn->prepare("SELECT * FROM tbl_materi WHERE lesson_id = ?");
    $stmt->bind_param("i", $lesson_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $materi_data = $result->fetch_assoc();
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
    <script src="https://cdn.tiny.cloud/1/rijrac2uxn06a1q296snq7j1fi420fd29r3lc1o12yzq6fwv/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <title>Edit Materi | Pandalingua</title>
</head>
<body class="m-0 font-sans flex">

<!-- Sidebar -->
<aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen bg-gray-800 text-white shadow-md">
    <div class="h-full px-4 py-6 overflow-y-auto">
        <h2 class="text-xl font-semibold mb-6 text-center">Hallo, <?php echo $_SESSION['admin']; ?>!</h2>
        <nav>
            <a href="../admin-dashboard.php" class="flex hover:bg-gray-700 px-2 py-3 items-center rounded-md group">
                <span class="ms-3">Dashboard</span>
            </a>
            <a href="../admin-Course.php" class="flex hover:bg-gray-700 px-2 py-3 items-center rounded-md group">
                <span class="ms-3">Course</span>
            </a>
            <a href="../admin-Quizzes.php" class="flex hover:bg-gray-700 px-2 py-3 items-center rounded-md group">
                <span class="ms-3">Quizzes</span>
            </a>
            <a href="../admin-Dictionary.php" class="flex hover:bg-gray-700 px-2 py-3 items-center rounded-md group">
                <span class="ms-3">Dictionary</span>
            </a>
            <a href="../controller/logout.php" class="flex hover:bg-gray-700 px-2 py-3 items-center rounded-md group">
                <span class="ms-3">LOGOUT</span>
            </a>
        </nav>
    </div>
</aside>

<!-- Main Content -->
<div id="Main content" class="w-full flex flex-col ml-64 p-10 gap-5">
    <a href="../admin-materi.php?course_id=<?php echo htmlspecialchars($courseId); ?>" class="hover:underline">← BACK</a>
    <div class="flex flex-row justify-between items-center">
        <h1 class="text-2xl font-bold">Edit Materi</h1>
    </div>
    <div class="w-full bg-neutral-200 p-5 rounded-xl">
        <form action="../controller/edit-Materi.php" method="post" class="flex flex-col gap-3">
            <!-- Input for course_id (hidden) -->
            <input type="hidden" id="course_id" name="course_id" value="<?php echo htmlspecialchars($courseId); ?>" required>

            <!-- Input for lesson_id (hidden) -->
            <input type="hidden" id="lesson_id" name="lesson_id" value="<?php echo htmlspecialchars($lesson_id); ?>" required>

            <!-- Input for title -->
            <label for="title">Materi Title:</label>
            <input type="text" id="title" name="title" value="<?php echo $materi_data['title'] ?? ''; ?>" class="border-2 border-neutral-500 px-5 py-2 rounded-xl" required>

            <!-- Input for content with TinyMCE -->
            <label for="content">Materi Content:</label>
            <textarea name="content" id="content" required class="border-2 border-neutral-500 px-5 py-2 rounded-xl"><?php echo $materi_data['content'] ?? ''; ?></textarea>

            <!-- Submit button -->
            <button type="submit" name="submit" class="bg-blue-500 text-white px-5 py-2 rounded-xl hover:bg-blue-900">Update</button>
        </form>
    </div>
</div>

<script>
    tinymce.init({
        selector: '#content',
        menubar: false,
        plugins: 'lists link image media charmap print preview hr anchor pagebreak',
        toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | media | removeformat',
        media_live_embeds: true,
        setup: function (editor) {
            editor.on('change', function () {
                // Ensure TinyMCE content is synced back to the textarea for validation
                tinymce.activeEditor.save();
            });
        }
    });

    // Form validation before submission
    document.querySelector('form').addEventListener('submit', function(event) {
        var content = tinymce.get('content').getContent(); // Get the content from TinyMCE
        if (content.trim() === '') {
            event.preventDefault(); // Prevent form submission
            alert("Content cannot be empty."); // Alert the user
            return false;
        }
    });
</script>

</body>
</html>
