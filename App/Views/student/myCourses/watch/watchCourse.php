<?php
use App\Controllers\Student\StudentController;

require_once "../../../../../vendor/autoload.php";

session_start();
if ((!isset($_SESSION["idStudent"]) || !isset($_SESSION["nameStudent"]) || $_SESSION["nameStudent"] != "student" || $_SESSION["validationStudent"] != "active")) {
    header("Location: ../auth/login.php");
    exit();
}

$courseData = [];
if ($_SERVER["REQUEST_METHOD"] == 'GET') {
    if (isset($_GET['course_id'])) {
        $courseID = $_GET["course_id"];
        $FetchThecourse = new StudentController();
        $courseData = $FetchThecourse->getCourseWatch($courseID);
        $courseData = $courseData[0] ?? [];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Watch Course | Youdemy</title>
</head>
<body class="bg-gray-900 text-white">
<header class="bg-gray-800 shadow">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold text-yellow-500">Youdemy</h1>
        <nav class="hidden md:flex space-x-6">
            <a href="../../home.php" class="text-gray-300 hover:text-yellow-500">Home</a>
            <a href="../myCourses.php" class="text-gray-300 hover:text-yellow-500">My Courses</a>
        </nav>
        <button id="menu-toggle" class="md:hidden flex items-center text-gray-300 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>
        </button>
    </div>
    <nav id="mobile-menu" class="hidden bg-gray-800 shadow-md">
        <ul class="space-y-4 p-4">
            <li><a href="../../home.php" class="block text-gray-300 hover:text-yellow-500">Home</a></li>
            <li><a href="../myCourses.php" class="block text-gray-300 hover:text-yellow-500">My Courses</a></li>
        </ul>
    </nav>
</header>

<main class="container mx-auto px-6 py-10">
    <!-- Course Content -->
    <div class="bg-gray-800 rounded-lg shadow-lg p-6 mb-10">
        <?php if (!empty($courseData)): ?>
            <h1 class="text-4xl font-extrabold text-yellow-500 mb-6"><?= htmlspecialchars($courseData['course_title'] ?? 'Course Title') ?></h1>
            <div class="relative mb-6">
                <iframe 
                    src="<?= htmlspecialchars($courseData['course_content'] ?? '') ?>" 
                    class="w-full h-96 rounded-lg border border-yellow-500" 
                    allowfullscreen>
                </iframe>
            </div>
            <p class="text-gray-300 text-lg mb-4">
                <?= htmlspecialchars($courseData['course_description'] ?? 'Course description not available.') ?>
            </p>
        <?php else: ?>
            <p class="text-red-500 text-center text-xl">Course data not found. Please try again.</p>
        <?php endif; ?>
    </div>

    <!-- Course Details -->
    <?php if (!empty($courseData)): ?>
        <div class="bg-gray-800 rounded-lg shadow-lg p-6">
            <h2 class="text-3xl font-bold text-yellow-500 mb-4">Course Details</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div>
                    <h4 class="font-bold text-gray-300">Category</h4>
                    <p class="text-gray-400"><?= htmlspecialchars($courseData['category_name'] ?? 'N/A') ?></p>
                </div>
                <div>
                    <h4 class="font-bold text-gray-300">Tags</h4>
                    <ul class="flex flex-wrap gap-2">
                        <?php 
                        $tags = explode(',', $courseData['tags'] ?? '');
                        foreach ($tags as $tag): 
                        ?>
                            <li class="px-2 py-1 bg-yellow-500 text-gray-900 rounded-full text-sm">
                                <?= htmlspecialchars($tag) ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-gray-300">Status</h4>
                    <p class="text-gray-400 capitalize"><?= htmlspecialchars($courseData['course_statu'] ?? 'Inactive') ?></p>
                </div>
            </div>
        </div>
    <?php endif; ?>
</main>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');

        menuToggle?.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
        });
    });
</script>
</body>
</html>
