<?php

use App\Controllers\Category\CategoryCrud;
use App\Controllers\Courses\CoursesCrud;
use App\Controllers\Tags\TagsCrud;

require_once "../../../../vendor/autoload.php";

session_start();
if ((!isset($_SESSION["idStudent"]) || !isset($_SESSION["nameStudent"]) || $_SESSION["nameStudent"] != "student" || $_SESSION["validationStudent"] != "active" )) {
  header("Location: ../auth/login.php");
  exit();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>All Courses | Youdemy</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

</body>
</html>
