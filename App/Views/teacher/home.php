
<?php

use App\Controllers\AuthUsers\AuthUsers;
use App\Controllers\Category\CategoryCrud;



  require_once "../../../vendor/autoload.php";

use App\Controllers\Tags\TagsCrud;
use App\Controllers\TeacherCourses\GetTechaerCoursesController;

session_start();

if ((!isset($_SESSION["idTeacher"]) || !isset($_SESSION["nameTeacher"]) || $_SESSION["nameTeacher"] != "teacher" || $_SESSION["validationTeacher"] != "active" )) {
  header("Location: ../auth/login.php");
  exit();
} 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout'])) {
    $logoutController = new AuthUsers();
    $logoutController->logoutController();
}



$getCategories = new CategoryCrud();
$categories = $getCategories->getCategoriesController();

$fetchNumberStudents = new GetTechaerCoursesController();
$totalStudents = $fetchNumberStudents->numberOftotalStudentsEnrolled();

$countCourses = new GetTechaerCoursesController();
$numberOfCourses = $countCourses->getNumberOFcourses();

$numberActiveCourses = new GetTechaerCoursesController();
$activeCourses = $numberActiveCourses->numberActiveCourses();


$getTags = new TagsCrud();
$tags = $getTags->getTagsController();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Teacher Home | Youdemy</title>
  <link href="../../output.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800">

  <header class="bg-white shadow">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
      <h1 class="text-2xl font-bold text-blue-600">Youdemy</h1>
      <nav class="hidden md:flex space-x-6">
        <a href="./courses/courses.php" class="text-gray-700 hover:text-blue-600">My Courses</a>
        <a href="./studentsEnrolled/studentsEnrolled.php" class="text-gray-700 hover:text-blue-600">Enrolled Courses</a>
        <form method="POST">
          <button type="submit" name="logout" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-md">
            Logout
          </button>
        </form>
      </nav>
      <button id="menu-toggle" class="md:hidden flex items-center text-gray-700 focus:outline-none">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
        </svg>
      </button>
    </div>

    <nav id="mobile-menu" class="hidden bg-white shadow-md">
      <ul class="space-y-4 p-4">
        <li><a href="./courses/courses.php" class="block text-gray-700 hover:text-blue-600">My Courses</a></li>
        <li><a href="./studentsEnrolled/studentsEnrolled.php" class="block text-gray-700 hover:text-blue-600">Enrolled Courses</a></li>
        <li>
          <form method="POST" class="mt-2">
            <button type="submit" name="logout" class="block py-2 px-4 rounded bg-red-600 hover:bg-red-700 text-white">
              Logout
            </button>
          </form>
        </li>
      </ul>
    </nav>
  </header>

  <main class="container mx-auto px-6 py-8 space-y-8">

    <section class="bg-white shadow rounded-lg p-6">
      <div class="flex justify-between items-center">
        <div>
          <h2 class="text-2xl font-bold text-gray-800">Welcome, Teacher!</h2>
          <p class="text-gray-600 mt-2">Manage your courses and track your students' progress effortlessly.</p>
        </div>
        <button id="open-modal" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-blue-500">
          + Add New Course
        </button>
      </div>
    </section>

    <section class="grid grid-cols-1 md:grid-cols-3 gap-6">
  <div class="bg-blue-600 text-white rounded-lg shadow-md p-6">
    <h3 class="text-lg font-bold">Total Courses</h3>
    <p class="text-4xl font-extrabold mt-2">
      <?php echo isset($numberOfCourses) && $numberOfCourses !== '' ? $numberOfCourses : 0; ?>
    </p>
  </div>
  <div class="bg-green-600 text-white rounded-lg shadow-md p-6">
    <h3 class="text-lg font-bold">Enrolled Students</h3>
    <p class="text-4xl font-extrabold mt-2">
      <?php echo isset($totalStudents["course_count"]) && $totalStudents["course_count"] !== '' ? $totalStudents["course_count"] : 0; ?>
    </p>
  </div>
  <div class="bg-yellow-500 text-white rounded-lg shadow-md p-6">
    <h3 class="text-lg font-bold">Active Courses</h3>
    <p class="text-4xl font-extrabold mt-2">
      <?php echo isset($activeCourses) && $activeCourses !== '' ? $activeCourses : 0; ?>
    </p>
  </div>
</section>


<?php if (empty($recentCourses)): ?>
  <p>No courses available at the moment.</p>
<?php else: ?>
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
    <?php foreach ($recentCourses as $course): ?>
      <div class="bg-gray-100 rounded-lg shadow-md p-4">
        <h4 class="text-lg font-bold text-gray-800"><?= htmlspecialchars($course['title']); ?></h4>
        <p class="text-gray-600 mt-2">Category: <?= htmlspecialchars($course['category']); ?></p>
        <p class="text-gray-600 mt-1">Enrolled Students: <?= htmlspecialchars($course['students_count']); ?></p>
        <span class="inline-block bg-green-100 text-green-600 px-3 py-1 rounded-lg text-xs font-semibold mt-3">
          <?= $course['status'] == 'active' ? 'Active' : 'Inactive'; ?>
        </span>
      </div>
    <?php endforeach; ?>
  </div>
<?php endif; ?>


  </main>

  <div id="course-modal" class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-1/2">
        <h3 class="text-2xl font-bold text-gray-800 mb-4">Add New Course</h3>
        <form action="./createCourse.php" method="POST">
            <div class="mb-4">
                <label for="course-title" class="block text-gray-700">Course Title</label>
                <input type="text" id="course-title" name="course_title" class="w-full p-3 mt-2 border border-gray-300 rounded-lg" required />
            </div>
            <div class="mb-4">
                <label for="course-description" class="block text-gray-700">Course Description</label>
                <textarea id="course-description" name="course_description" class="w-full p-3 mt-2 border border-gray-300 rounded-lg" required></textarea>
            </div>
            <div class="mb-4">
                <label for="course-content" class="block text-gray-700">Course Content Link</label>
                <div class="flex items-center">
                    <input type="url" id="course-content" name="course_content" class="w-full p-3 mt-2 border border-gray-300 rounded-lg" required />
                </div>
            </div>
            <div class="mb-4">
                <label for="category" class="block text-gray-700">Select Category</label>
                <select id="category" name="category_id" class="w-full p-3 mt-2 border border-gray-300 rounded-lg" required>
                    <?php 
                        foreach ($categories as $category) {
                            echo "<option value='" . $category['id'] . "'>" . $category['name'] . "</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="mb-4">
    <label for="tags" class="block text-gray-700">Select Tags</label>
    <div id="tags-container">

  </div>
  <div class="form-group overflow-auto">
    <label for="tags" class="block text-gray-700 font-semibold">Tags</label>
    <div id="tags" class="checkbox-group space-y-2 overflow-auto mt-2">
        <?php foreach ($tags as $tag): ?>
            <label class="inline-flex items-center space-x-2">
                <input name="tags[]" type="checkbox" value="<?= $tag['id'] ?>" class="form-checkbox text-blue-600">
                <span class="text-gray-800"><?= $tag['name'] ?></span>
            </label>
        <?php endforeach; ?>
    </div>
</div>

    </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md">Add Course</button>
            </div>
        </form>
        <button id="close-modal" class="absolute top-2 right-2 text-gray-600">X</button>
    </div>
</div>






  <script>
    const modal = document.getElementById('course-modal');
    const openModalButton = document.getElementById('open-modal');
    const closeModalButton = document.getElementById('close-modal');
    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');

    openModalButton.addEventListener('click', () => {
      modal.classList.remove('hidden');
    });

    closeModalButton.addEventListener('click', () => {
      modal.classList.add('hidden');
    });

    window.addEventListener('click', (event) => {
      if (event.target === modal) {
        modal.classList.add('hidden');
      }
    });


    menuToggle.addEventListener('click', () => {
      mobileMenu.classList.toggle('hidden');
    });



    
  </script>

</body>
</html>
