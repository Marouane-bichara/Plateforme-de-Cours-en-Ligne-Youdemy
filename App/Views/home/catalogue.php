<?php


use App\Controllers\Student\StudentController;
require_once "../../../vendor/autoload.php";


$itemsPerPage = 6;
$currentPage = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($currentPage - 1) * $itemsPerPage;

$coursesFetch = new StudentController();
$totalCourses = $coursesFetch->countCourses(); 
$courses = $coursesFetch->affichageCourses($offset, $itemsPerPage); 
$totalPages = ceil($totalCourses / $itemsPerPage);

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>All Courses | Youdemy</title>
  <link href="../../output.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
<header class="bg-white shadow-lg sticky top-0 z-50">
  <div class="container mx-auto px-4 py-4 flex justify-between items-center">
    <h1 class="text-2xl font-bold text-blue-600 cursor-pointer">Youdemy</h1>
    <nav class="hidden md:flex gap-8">
      <a href="./index.php" class="text-gray-700 hover:text-blue-600 font-medium">Home</a>
      <a href="./catalogue.php" class="text-gray-700 hover:text-blue-600 font-medium">Catalogue</a>
      <a href="./about.php" class="text-gray-700 hover:text-blue-600 font-medium">About Us</a>
      <a href="./contact.php" class="text-gray-700 hover:text-blue-600 font-medium">Contact</a>
    </nav>
    <button id="hamburger" class="block md:hidden text-gray-700 focus:outline-none">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
      </svg>
    </button>
  </div>
</header>

<div id="mobile-menu" class="fixed inset-0 flex justify-center items-center bg-black bg-opacity-50 z-50 transform scale-0 opacity-0">
  <div class="bg-white w-72 h-72 rounded-xl shadow-lg overflow-hidden transform transition-all ease-in-out duration-500 flex flex-col justify-center items-center">
    <div class="flex justify-end w-full p-4">
      <button id="close-menu" class="text-gray-700 hover:text-blue-600">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>
    <nav class="flex flex-col items-center space-y-6">
      <a href="./index.php" class="text-gray-800 text-xl font-semibold hover:text-blue-600 transition-all duration-300">Home</a>
      <a href="./catalogue.php" class="text-gray-800 text-xl font-semibold hover:text-blue-600 transition-all duration-300">Catalogue</a>
      <a href="./about.php" class="text-gray-800 text-xl font-semibold hover:text-blue-600 transition-all duration-300">About Us</a>
      <a href="./contact.php" class="text-gray-800 text-xl font-semibold hover:text-blue-600 transition-all duration-300">Contact</a>
    </nav>
  </div>
</div>

<div class="container mx-auto p-4">
  <div class="text-center mb-8">
    <h1 class="text-3xl font-semibold">My Courses</h1>
  </div>
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
    <?php foreach ($courses as $course): ?>
      <div class="bg-white rounded-lg shadow-lg p-6">
        <h2 class="text-xl font-semibold text-blue-600 mb-4">Course Status: <?= htmlspecialchars($course['course_statu']) ?></h2>
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
      </div>
    <?php endforeach; ?>
  </div>

  <div class="mt-8 flex justify-center">
    <nav>
      <ul class="flex space-x-2">
        <?php if ($currentPage > 1): ?>
          <li>
            <a href="?page=<?= $currentPage - 1 ?>" class="px-4 py-2 bg-gray-200 rounded hover:bg-blue-500 hover:text-white">Previous</a>
          </li>
        <?php endif; ?>
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
          <li>
            <a href="?page=<?= $i ?>" class="px-4 py-2 <?= $i == $currentPage ? 'bg-blue-500 text-white' : 'bg-gray-200' ?> rounded hover:bg-blue-500 hover:text-white"><?= $i ?></a>
          </li>
        <?php endfor; ?>
        <?php if ($currentPage < $totalPages): ?>
          <li>
            <a href="?page=<?= $currentPage + 1 ?>" class="px-4 py-2 bg-gray-200 rounded hover:bg-blue-500 hover:text-white">Next</a>
          </li>
        <?php endif; ?>
      </ul>
    </nav>
  </div>
</div>

<script src="../../scripts/menu.js"></script>

</body>
</html>
