<?php
session_start();

if (!isset($_SESSION["idTeacher"]) || !isset($_SESSION["nameTeacher"])) {
    header("Location: ../../auth/login.php");
    exit();
}

$teacherName = htmlspecialchars($_SESSION["nameTeacher"]);
$profilePicture = ""; // Placeholder for teacher's profile picture
$recentActivities = ""; // Placeholder for recent activities
$featuredCourseTitle = ""; // Placeholder for featured course title
$featuredCourseDescription = ""; // Placeholder for featured course description
$featuredCourseLink = ""; // Placeholder for featured course link
$totalEarnings = ""; // Placeholder for total earnings
$totalStudents = ""; // Placeholder for total number of students
$totalCourses = ""; // Placeholder for total number of courses

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Teacher Home</title>
  <link href="../../output.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <style>
    .hero-bg {
      background-image: url('path/to/placeholder-image.jpg'); /* Replace with a dynamic background image */
      background-size: cover;
      background-position: center;
    }
  </style>
</head>
<body class="bg-gray-100 font-sans">
  <div class="hero-bg p-6 text-white">
    <div class="flex items-center">
      <img src="<?php echo $profilePicture; ?>" alt="Profile Picture" class="w-16 h-16 rounded-full">
      <div class="ml-4">
        <h1 class="text-3xl font-semibold">Welcome back, <?php echo $teacherName; ?>!</h1>
        <p class="text-gray-300">Ready to inspire your students today?</p>
      </div>
    </div>
  </div>

  <div class="p-6">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
      <div class="bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold text-gray-700 mb-4">Your Statistics</h2>
        <p class="text-gray-600"><i class="fas fa-book mr-2"></i>Courses: <span class="font-semibold"><?php echo $totalCourses; ?></span></p>
        <p class="text-gray-600"><i class="fas fa-users mr-2"></i>Students: <span class="font-semibold"><?php echo $totalStudents; ?></span></p>
        <p class="text-gray-600"><i class="fas fa-dollar-sign mr-2"></i>Earnings: <span class="font-semibold">$<?php echo $totalEarnings; ?></span></p>
      </div>

      <div class="bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold text-gray-700 mb-4">Recent Activities</h2>
        <ul class="text-gray-600">
          <?php echo $recentActivities; ?>
        </ul>
      </div>

      <div class="bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold text-gray-700 mb-4">Featured Course</h2>
        <h3 class="text-xl font-semibold text-gray-800"><?php echo $featuredCourseTitle; ?></h3>
        <p class="text-gray-600 mt-2"><?php echo $featuredCourseDescription; ?></p>
        <a href="<?php echo $featuredCourseLink; ?>" class="text-blue-600 hover:underline mt-4 block">View Course</a>
      </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <div class="bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold text-gray-700 mb-4">Manage Courses</h2>
        <p class="text-gray-600">Add, update, or delete your courses.</p>
        <a href="./courses.php" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 mt-4 inline-block">Go to Courses</a>
      </div>

      <div class="bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold text-gray-700 mb-4">Manage Students</h2>
        <p class="text-gray-600">View and interact with your students.</p>
        <a href="./students.php" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 mt-4 inline-block">Go to Students</a>
      </div>
    </div>
  </div>
</body>
</html>
