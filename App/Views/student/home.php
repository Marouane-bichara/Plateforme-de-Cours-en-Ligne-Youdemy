<?php

use App\Controllers\AuthUsers\AuthUsers;
use App\Controllers\Student\StudentController;

require_once "../../../vendor/autoload.php";

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
$courses = $coursesFetche->affichageCourses();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>All Courses | Youdemy</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const menuToggle = document.getElementById('menu-toggle');
      const mobileMenu = document.getElementById('mobile-menu');
      
      menuToggle.addEventListener('click', function() {
        mobileMenu.classList.toggle('hidden');
      });
    });
  </script>
</head>
<body class="bg-gray-100 text-gray-800">
  <header class="bg-white shadow">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
      <h1 class="text-2xl font-bold text-blue-600">Youdemy</h1>
      <button id="menu-toggle" class="md:hidden flex items-center text-gray-700 focus:outline-none">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
        </svg>
      </button>
      <nav class="hidden md:flex space-x-6">
        <a href="./home.php" class="text-gray-700 hover:text-blue-600">Home</a>
        <a href="./myCourses/myCourse.php" class="text-gray-700 hover:text-blue-600">My Courses</a>
        <form method="POST">
          <button type="submit" name="logout" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-md">
            Logout
          </button>
        </form>
      </nav>
    </div>
    <nav id="mobile-menu" class="hidden bg-white shadow-md">
      <ul class="space-y-4 p-4">
        <li><a href="./home.php" class="block text-gray-700 hover:text-blue-600">Home</a></li>
        <li><a href="./myCourses/myCourse.php" class="block text-gray-700 hover:text-blue-600">My Courses</a></li>
        <form method="POST">
          <button type="submit" name="logout" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-md">
            Logout
          </button>
        </form>
      </ul>
    </nav>
  </header>

  <main class="container mx-auto p-6">
    <div class="text-center mb-10">
      <h1 class="text-4xl font-semibold">Explore Our Courses</h1>
      <p class="text-gray-600 mt-2">Find courses that fit your passion and goals</p>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <?php foreach ($courses as $course): ?>
        <div class="bg-white rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
          <div class="p-6">
            <h2 class="text-2xl font-semibold text-blue-600 mb-3"><?= htmlspecialchars($course['course_title']) ?></h2>
            <p class="text-gray-700 mb-4"><?= htmlspecialchars($course['course_description']) ?></p>
            <div class="mb-4">
              <h3 class="text-lg font-medium text-gray-800">Category:</h3>
              <p class="text-gray-600"><?= htmlspecialchars($course['category_name']) ?></p>
            </div>
            <div class="mb-4">
              <h3 class="text-lg font-medium text-gray-800">Tags:</h3>
              <ul class="flex flex-wrap gap-2">
                <?php 
                  $tags = explode(',', $course['tags']);
                  foreach ($tags as $tag): 
                ?>
                  <li class="px-2 py-1 bg-green-200 rounded-full text-sm text-green-800"><?= htmlspecialchars($tag) ?></li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
          <div class="border-t p-4 flex justify-between">
            <form method="POST" action="./inscription.php">
              <input type="hidden" name="course_id" value="<?= htmlspecialchars($course['course_id']) ?>">
              <button type="submit" name="inscription" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md">
                Enroll
              </button>
            </form>
            <form method="POST" action="./cancel.php">
              <input type="hidden" name="course_id" value="<?= htmlspecialchars($course['course_id']) ?>">
              <button type="submit" name="cancel" class="px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-md">
                Cancel
              </button>
            </form>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </main>
</body>
</html>