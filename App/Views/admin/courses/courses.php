<?php

use App\Controllers\Course\GetCourseController;

require_once "../../../../vendor/autoload.php";

session_start();

if ((!isset($_SESSION["idAdmin"]) && !isset($_SESSION["nameAdmin"]) && $_SESSION["nameAdmin"] != "admin")) {
    header("Location: ../../auth/login.php");
    exit();
}


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

    <div id="mobileSidebar" class="bg-gray-800 text-white w-64 p-4 hidden">
      <nav>
        <a href="../home.php" class="block py-2.5 px-4 rounded hover:bg-gray-700"><i class="fas fa-tachometer-alt mr-2"></i>Dashboard</a>
        <a href="./courses/index.php" class="block py-2.5 px-4 rounded hover:bg-gray-700"><i class="fas fa-book mr-2"></i>Courses</a>
        <a href="../category/category.php" class="block py-2.5 px-4 rounded hover:bg-gray-700"><i class="fas fa-list-alt mr-2"></i>Categories</a>
        <a href="../tags/tags.php" class="block py-2.5 px-4 rounded hover:bg-gray-700"><i class="fas fa-tags mr-2"></i>Tags</a>
        <a href="../users/users.php" class="block py-2.5 px-4 rounded hover:bg-gray-700"><i class="fas fa-users mr-2"></i>Users</a>
      </nav>
    </div>

    <div class="flex-1 p-6">
      <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-700"><i class="fas fa-book mr-2"></i>Manage Courses</h1>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php if (!empty($courses)): ?>
          <?php foreach ($courses as $course): ?>
            <div class="bg-white p-4 rounded shadow hover:shadow-lg transition">
              <h2 class="text-lg font-semibold text-gray-700"><?php echo htmlspecialchars($course['title']); ?></h2>
              <p class="text-gray-600 mt-2"><?php echo htmlspecialchars($course['description']); ?></p>
              <a href="<?php echo htmlspecialchars($course['content']); ?>" target="_blank" class="text-blue-500 hover:text-blue-700 mt-2 block">View Content</a>
              <p class="text-gray-600 mt-2"><strong>Category:</strong> <?php echo htmlspecialchars($course['category']); ?></p>
              <p class="text-gray-600 mt-2"><strong>Tags:</strong> 
                <?php echo htmlspecialchars(implode(', ', $course['tags'])); ?>
              </p>

              <?php if ($course['is_banned']): ?>
                <p class="text-red-500 font-semibold mt-2">Banned</p>
              <?php else: ?>
                <form method="POST" action="./ban.php" onsubmit="return confirm('Are you sure you want to ban this course?');">
                  <input type="hidden" name="idCourse" value="<?php echo htmlspecialchars($course['id']); ?>">
                  <button type="submit" class="text-red-500 hover:text-red-700 mt-4">
                    <i class="fas fa-ban"></i> Ban
                  </button>
                </form>
              <?php endif; ?>
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
