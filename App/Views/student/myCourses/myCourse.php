<?php

use App\Controllers\AuthUsers\AuthUsers;
use App\Controllers\Student\StudentController;

require_once "../../../../vendor/autoload.php";

session_start();

if ((!isset($_SESSION["idStudent"]) || !isset($_SESSION["nameStudent"]) || $_SESSION["nameStudent"] != "student" || $_SESSION["validationStudent"] != "active")) {
  header("Location: ../auth/login.php");
  exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout'])) {
  $logoutController = new AuthUsers();
  $logoutController->logoutController();
}

$coursesFetche = new StudentController();
$courses = $coursesFetche->StudentMyAllCourses();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Courses | Youdemy</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-800 text-white">
  <header class="bg-gray-900 shadow">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
      <h1 class="text-2xl font-bold text-yellow-400">Youdemy</h1>
      <button id="menu-toggle" class="md:hidden flex items-center text-white focus:outline-none">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
        </svg>
      </button>
      <nav class="hidden md:flex space-x-6">
        <a href="../home.php" class="text-white hover:text-yellow-400">Home</a>
        <a href="./myCourse.php" class="text-white hover:text-yellow-400">My Courses</a>
      </nav>
    </div>
    <nav id="mobile-menu" class="hidden bg-gray-900 shadow-md">
      <ul class="space-y-4 p-4">
        <li><a href="../home.php" class="block text-white hover:text-yellow-400">Home</a></li>
        <li><a href="./myCourse.php" class="block text-white hover:text-yellow-400">My Courses</a></li>
      </ul>
    </nav>
  </header>

  <main class="container mx-auto p-6">
    <div class="text-center mb-10">
      <h1 class="text-4xl font-semibold text-yellow-400">Your Courses</h1>
      <p class="text-gray-400 mt-2">Watch or cancel your courses below</p>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <?php foreach ($courses as $course): ?>
        <div class="bg-gray-700 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 flex flex-col h-full">
          <div class="p-6 flex-grow">
            <h2 class="text-xl font-semibold text-yellow-400 mb-3"><?= htmlspecialchars($course['course_title']) ?></h2>
            <p class="text-gray-300 text-sm line-clamp-3"><?= htmlspecialchars($course['course_description']) ?></p>
          </div>
          <div class="border-t p-4 mt-auto flex justify-between">
            <form method="POST" action="./cancel.php">
              <input type="hidden" name="course_id" value="<?= htmlspecialchars($course['course_id']) ?>">
              <button type="submit" name="cancel" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-md">
                Cancel
              </button>
            </form>
            <form method="GET" action="./watch/watchCourse.php">
              <input type="hidden" name="course_id" value="<?= htmlspecialchars($course['course_id']) ?>">
              <button type="submit" name="watch" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-md">
                Watch
              </button>
            </form>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </main>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const menuToggle = document.getElementById('menu-toggle');
      const mobileMenu = document.getElementById('mobile-menu');
      
      menuToggle.addEventListener('click', function() {
        mobileMenu.classList.toggle('hidden');
      });
    });
  </script>
</body>
</html>
