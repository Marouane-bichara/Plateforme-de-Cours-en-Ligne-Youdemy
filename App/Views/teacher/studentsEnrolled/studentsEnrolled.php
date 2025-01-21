<?php

use App\Controllers\TeacherCourses\GetTechaerCoursesController;

require_once "../../../../vendor/autoload.php";

session_start();
if ((!isset($_SESSION["idTeacher"]) || !isset($_SESSION["nameTeacher"]) || $_SESSION["nameTeacher"] != "teacher" || $_SESSION["validationTeacher"] != "active" )) {
    header("Location: ../auth/login.php");
    exit();
}

$studentsAndCourse = new GetTechaerCoursesController();
$coursesAndStudent = $studentsAndCourse->getUsersEnrollWithCourses();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Courses | Youdemy</title>
    <link href="../../../output.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800">
<header class="bg-white shadow">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold text-blue-600">Youdemy</h1>
        <nav class="hidden md:flex space-x-6">
            <a href="../home.php" class="text-gray-700 hover:text-blue-600">Home</a>
            <a href="../courses/courses.php" class="block text-gray-700 hover:text-blue-600">My Courses</a>
        </nav>
        <button id="menu-toggle" class="md:hidden flex items-center text-gray-700 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>
        </button>
    </div>
    <nav id="mobile-menu" class="hidden bg-white shadow-md">
        <ul class="space-y-4 p-4">
            <li><a href="../home.php" class="block text-gray-700 hover:text-blue-600">Home</a></li>
            <li><a href="../courses/courses.php" class="block text-gray-700 hover:text-blue-600">My Courses</a></li>
        </ul>
    </nav>
</header>

<main class="container mx-auto mt-8 px-6">
    <h2 class="text-3xl font-semibold text-gray-800 mb-6">Students Enrolled in Your Courses</h2>

    <?php if (empty($coursesAndStudent)) : ?>
        <div class="bg-yellow-100 text-yellow-800 p-6 rounded-lg shadow-md">
            <p class="text-center text-lg">No users are currently enrolled in your courses.</p>
        </div>
    <?php else : ?>
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            <?php foreach ($coursesAndStudent as $item) : ?>
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">
                        <?php echo htmlspecialchars($item['course_title']); ?>
                    </h3>
                    <p class="text-gray-600 mb-2">
                        <span class="font-semibold">First Name:</span> <?php echo htmlspecialchars($item['user_name']); ?>
                    </p>
                    <p class="text-gray-600">
                        <span class="font-semibold">Last Name:</span> <?php echo htmlspecialchars($item['second_name']); ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</main>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');

        menuToggle.addEventListener('click', function () {
            mobileMenu.classList.toggle('hidden');
        });
    });
</script>
</body>
</html>
