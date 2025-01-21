<?php

use App\Controllers\Courses\CoursesCrud;
use App\Controllers\Courses\GetCoursesController;

require_once "../../../../vendor/autoload.php";

session_start();

if ((!isset($_SESSION["idAdmin"]) && !isset($_SESSION["nameAdmin"]) && $_SESSION["nameAdmin"] != "admin")) {
    header("Location: ../../auth/login.php");
    exit();
}

$getCourses = new CoursesCrud();
$courses = $getCourses->getCoursesController();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Courses</title>
  <link href="../../../output.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <script>
    function toggleSidebar() {
      const sidebar = document.getElementById("mobileSidebar");
      sidebar.classList.toggle("hidden");
    }
  </script>
</head>
<body class="bg-gray-100 font-sans">
  <div class="flex h-screen">
    <!-- Desktop Sidebar -->
    <div class="bg-gray-800 text-white w-64 hidden md:block">
      <div class="p-4 text-center">
        <h2 class="text-xl font-bold">Youdemy</h2>
      </div>
      <nav class="mt-6">
        <a href="../home.php" class="block py-2.5 px-4 rounded hover:bg-gray-700"><i class="fas fa-tachometer-alt mr-2"></i>Dashboard</a>
        <a href="./courses.php" class="block py-2.5 px-4 rounded hover:bg-gray-700"><i class="fas fa-book mr-2"></i>Courses</a>
        <a href="../category/category.php" class="block py-2.5 px-4 rounded hover:bg-gray-700"><i class="fas fa-list-alt mr-2"></i>Categories</a>
        <a href="../tags/tags.php" class="block py-2.5 px-4 rounded hover:bg-gray-700"><i class="fas fa-tags mr-2"></i>Tags</a>
        <a href="../users/users.php" class="block py-2.5 px-4 rounded hover:bg-gray-700"><i class="fas fa-users mr-2"></i>Users</a>
      </nav>
    </div>

    <!-- Mobile Sidebar Button (Hamburger) -->
    <div class="md:hidden bg-gray-800 text-white p-4">
      <button id="menuToggle" class="block focus:outline-none" onclick="toggleSidebar()">
        <i class="fas fa-bars"></i>
      </button>
    </div>

    <!-- Mobile Sidebar -->
    <div id="mobileSidebar" class="bg-gray-800 text-white w-64 p-4 hidden">
      <nav>
        <a href="../home.php" class="block py-2.5 px-4 rounded hover:bg-gray-700"><i class="fas fa-tachometer-alt mr-2"></i>Dashboard</a>
        <a href="./courses.php" class="block py-2.5 px-4 rounded hover:bg-gray-700"><i class="fas fa-book mr-2"></i>Courses</a>
        <a href="../category/category.php" class="block py-2.5 px-4 rounded hover:bg-gray-700"><i class="fas fa-list-alt mr-2"></i>Categories</a>
        <a href="../tags/tags.php" class="block py-2.5 px-4 rounded hover:bg-gray-700"><i class="fas fa-tags mr-2"></i>Tags</a>
        <a href="../users/users.php" class="block py-2.5 px-4 rounded hover:bg-gray-700"><i class="fas fa-users mr-2"></i>Users</a>
      </nav>
    </div>

    <div class="flex-1 p-6">
      <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-700"><i class="fas fa-book mr-2"></i>Manage Courses</h1>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 max-h-[75vh] overflow-y-scroll">
        <?php if (!empty($courses)): ?>
          <?php foreach ($courses as $course): ?>
            <div class="bg-white p-4 rounded shadow hover:shadow-lg transition">
              <h2 class="text-lg font-semibold text-gray-700">Validation course: <?php echo ($course['validation_course']); ?></h2>
              <h2 class="text-lg font-semibold text-gray-700">Title: <?php echo ($course['course_title']); ?></h2>
              <p class="text-gray-600 mt-2">Description: <?php echo ($course['course_description']); ?></p>
              <a href="" target="_blank" class="text-blue-500 hover:text-blue-700 mt-2 block">Content: <?php echo ($course['course_content']); ?></a>
              <p class="text-gray-600 mt-2"><strong>Category:</strong> <?php echo ($course['category_name']); ?></p>
              <p class="text-gray-600 mt-2"><strong>Tags:</strong> 
                <?php
                $tags = explode(',', $course['tags']);
                echo (implode(', ', $tags));
                ?>
              </p>
              <div class="mt-4 space-x-2 flex">
                <form method="POST" action="./update.php">
                  <input type="hidden" name="action" value="active">
                  <input type="hidden" name="course_id" value="<?php echo $course['course_id']; ?>">
                  <button type="submit" name="active" class="text-white bg-green-600 hover:bg-green-700 px-4 py-2 rounded">Active</button>
                </form>
                <form method="POST" action="./update.php">
                  <input type="hidden" name="action" value="suspended">
                  <input type="hidden" name="course_id" value="<?php echo $course['course_id']; ?>">
                  <button type="submit" name="suspended" class="text-white bg-orange-600 hover:bg-orange-700 px-4 py-2 rounded">Suspended</button>
                </form>
                <form method="POST" action="./update.php">
                  <input type="hidden" name="action" value="deleted">
                  <input type="hidden" name="course_id" value="<?php echo $course['course_id']; ?>">
                  <button type="submit" name="deleted" class="text-white bg-red-600 hover:bg-red-700 px-4 py-2 rounded">Delete</button>
                </form>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <p class="text-gray-600">No courses found.</p>
        <?php endif; ?>
      </div>
    </div>
  </div>
</body>
</html>
