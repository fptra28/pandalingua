<?php
session_start();

// Redirect jika tidak login
if (!isset($_SESSION['admin'])) {
    header("Location: ./admin-login.php");
    exit();
}

include './controller/getTotals.php';
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
        <h1 class="text-2xl font-bold">Admin Dashboard</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            <div class="w-full bg-blue-200 p-5">
                <h2 class="text-lg font-semibold">Total Users</h2>
                <p><?php echo $totalUsers; ?></p>
            </div>
            <div class="w-full bg-blue-200 p-5">
                <h2 class="text-lg font-semibold">Total Courses</h2>
                <p><?php echo $totalCourses; ?></p>
            </div>
            <div class="w-full bg-blue-200 p-5">
                <h2 class="text-lg font-semibold">Total Materi</h2>
                <p><?php echo $totalMateri; ?></p>
            </div>
            <div class="w-full bg-blue-200 p-5">
                <h2 class="text-lg font-semibold">Total Quizzes</h2>
                <p><?php echo $totalQuizzes; ?></p>
            </div>
            <div class="w-full bg-blue-200 p-5">
                <h2 class="text-lg font-semibold">Total Questions</h2>
                <p><?php echo $totalQuestions; ?></p>
            </div>
            <div class="w-full bg-blue-200 p-5">
                <h2 class="text-lg font-semibold">Total Dictionary</h2>
                <p><?php echo $totalDictionary; ?></p>
            </div>
        </div>
    </div>
</body>

</html>
