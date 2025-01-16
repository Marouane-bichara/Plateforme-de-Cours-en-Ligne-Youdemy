<?php

use App\Controllers\TeacherCourses\GetTechaerCoursesController;
use App\Controllers\Tags\GetTagsController;
use App\Controllers\Category\GetCategoryController;
use App\Controllers\Courses\GetCoursesController;

require_once "../../../../vendor/autoload.php";

session_start();
if ((!isset($_SESSION["idTeacher"]) || !isset($_SESSION["nameTeacher"]) || $_SESSION["nameTeacher"] != "teacher" || $_SESSION["validationTeacher"] != "active" )) {
  header("Location: ../auth/login.php");
  exit();
}

$coursesFetch = new GetTechaerCoursesController();
$courses = $coursesFetch->getCourses();

$getCategories = new GetCategoryController();
$categoriess = $getCategories->getCategoriesController();

$countCourses = new GetCoursesController();
$numberOfCourses = $countCourses->numberofCourses();

$getTags = new GetTagsController();
$all_tags = $getTags->getTagsController();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Courses | Youdemy</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const openModalButtons = document.querySelectorAll('.open-modal');
      const modal = document.getElementById('course-modal');
      const closeModalButton = document.getElementById('close-modal');
      const modalCloseIcon = document.getElementById('modal-close-icon');

      openModalButtons.forEach(button => {
        button.addEventListener('click', function() {
          const courseId = this.getAttribute('data-course-id');
          const courseTitle = this.getAttribute('data-course-title');
          const courseDescription = this.getAttribute('data-course-description');
          const courseContent = this.getAttribute('data-course-content');
          const courseCategory = this.getAttribute('data-course-category');
          const courseTags = this.getAttribute('data-course-tags').split(',');

          // Populate modal inputs
          document.getElementById('course-title-input').value = courseTitle;
          document.getElementById('course-description-input').value = courseDescription;
          document.getElementById('course-content-input').value = courseContent;
          document.getElementById('course-id-input').value = courseId;
          document.getElementById('category-select').value = courseCategory;

          // Handle tags checkboxes
          document.querySelectorAll('.tag-checkbox').forEach(checkbox => {
            checkbox.checked = courseTags.includes(checkbox.value);
          });

          // Open modal
          modal.classList.remove('hidden');
        });
      });

      closeModalButton.addEventListener('click', function() {
        modal.classList.add('hidden');
      });

      modal.addEventListener('click', function(event) {
        if (event.target === modal) {
          modal.classList.add('hidden');
        }
      });

      modalCloseIcon.addEventListener('click', function() {
        modal.classList.add('hidden');
      });
    });
  </script>
</head>
<body class="bg-gray-100 text-gray-800">
  <header class="bg-white shadow">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
      <h1 class="text-2xl font-bold text-blue-600">Youdemy</h1>
      <nav class="hidden md:flex space-x-6">
        <a href="../home.php" class="text-gray-700 hover:text-blue-600">Home</a>
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
      </ul>
    </nav>
  </header>

  <div class="container mx-auto p-4">
    <div class="text-center mb-8">
      <h1 class="text-3xl font-semibold">My Courses</h1>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
      <?php foreach ($courses as $course): ?>
        <div class="bg-white rounded-lg shadow-lg p-6">
          <h2 class="text-xl font-semibold text-blue-600 mb-4"><?= htmlspecialchars($course['course_title']) ?></h2>
          <p class="text-gray-700 mb-4"><?= htmlspecialchars($course['course_description']) ?></p>
          <div class="text-sm text-gray-600 mb-4">
            <strong>Content: </strong><?= htmlspecialchars($course['course_content']) ?>
          </div>

          <div class="mb-4">
            <h3 class="text-lg font-medium">Category:</h3>
            <ul class="list-none pl-0">
              <li class="inline-block px-2 py-1 bg-blue-200 rounded-full text-sm text-blue-800 mr-2"><?= htmlspecialchars($course['category_name']) ?></li>
            </ul>
          </div>

          <div class="mb-4">
            <h3 class="text-lg font-medium">Tags:</h3>
            <ul class="list-none pl-0">
              <?php 
                $course_tags = explode(',', $course['tags']);
                foreach ($course_tags as $course_tag): 
              ?>
                <li class="inline-block px-2 py-1 bg-green-200 rounded-full text-sm text-green-800 mr-2"><?= htmlspecialchars($course_tag) ?></li>
              <?php endforeach; ?>
            </ul>
          </div>

          <div class="text-center mt-6">
            <button class="open-modal text-blue-600 hover:text-blue-800" 
                    data-course-id="<?= $course['course_id'] ?>"
                    data-course-title="<?= htmlspecialchars($course['course_title']) ?>"
                    data-course-description="<?= htmlspecialchars($course['course_description']) ?>"
                    data-course-content="<?= htmlspecialchars($course['course_content']) ?>"
                    data-course-category="<?= htmlspecialchars($course['category_name']) ?>"
                    data-course-tags="<?= htmlspecialchars($course['tags']) ?>"
                    >Edit</button>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <div id="course-modal" class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-1/2 relative">
        <button id="modal-close-icon" class="absolute top-2 right-2 text-gray-600 hover:text-gray-800">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
        <h3 class="text-2xl font-bold text-gray-800 mb-4">Edit Course</h3>
        <form action="./edit.php" method="POST">
            <input type="hidden" id="course-id-input" name="course_id" />
            <div class="mb-4">
                <label for="course-title" class="block text-gray-700">Course Title</label>
                <input type="text" id="course-title-input" name="course_title" class="w-full p-3 mt-2 border border-gray-300 rounded-lg" required />
            </div>
            <div class="mb-4">
                <label for="course-description" class="block text-gray-700">Course Description</label>
                <textarea id="course-description-input" name="course_description" class="w-full p-3 mt-2 border border-gray-300 rounded-lg" required></textarea>
            </div>
            <div class="mb-4">
                <label for="course-content" class="block text-gray-700">Course Content Link</label>
                <input type="url" id="course-content-input" name="course_content" class="w-full p-3 mt-2 border border-gray-300 rounded-lg" required />
            </div>
            <div class="mb-4">
                <label for="category-select" class="block text-gray-700">Category</label>
                <select id="category-select" name="category_id" class="w-full p-3 mt-2 border border-gray-300 rounded-lg" required>
                    <?php foreach ($categoriess as $category): ?>
                        <option value="<?= $category['id'] ?>" <?= $category['name'] == $course['category_name'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($category['name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Tags</label>
                <div id="tags" class="mt-2">
                    <?php foreach ($all_tags as $tag): ?>
                        <label class="inline-flex items-center space-x-2">
                        <input name="tags[]" type="checkbox" value="<?= $tag['id'] ?>" class="tag-checkbox form-checkbox text-blue-600" <?= in_array($tag['name'], $course_tags) ? 'checked' : '' ?>>
                        <span class="text-gray-800"><?= htmlspecialchars($tag['name']) ?></span>
                        </label>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="flex justify-between items-center">
                  <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Save</button>
                  <button id="close-modal" type="button" class="px-4 py-2 bg-red-600 text-white rounded-lg">Cancel</button>
            </div>
        </form>
    </div>
  </div>
</body>
</html>
