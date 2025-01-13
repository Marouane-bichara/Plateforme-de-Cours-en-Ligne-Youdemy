<?php
  require_once "../../../../vendor/autoload.php";

  session_start();
  use App\Controllers\Logout\LogoutController;
  use App\Controllers\Users\GetUsersController;

  if ((!isset($_SESSION["idAdmin"]) && !isset($_SESSION["nameAdmin"]) && $_SESSION["nameAdmin"] != "admin")) {
    header("Location: ../../auth/login.php");
    exit();
  }

  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout'])) {
      $logoutController = new LogoutController();
      $logoutController->logoutController();
  }

  $countUsers = new GetUsersController();
  $users = $countUsers->getUsersController();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Youdemy Admin Dashboard - Users</title>
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
        <a href="./courses/index.php" class="block py-2.5 px-4 rounded hover:bg-gray-700"><i class="fas fa-book mr-2"></i>Courses</a>
        <a href="../category/category.php" class="block py-2.5 px-4 rounded hover:bg-gray-700"><i class="fas fa-list-alt mr-2"></i>Categories</a>
        <a href="../tags/tags.php" class="block py-2.5 px-4 rounded hover:bg-gray-700"><i class="fas fa-tags mr-2"></i>Tags</a>
        <a href="./users.php" class="block py-2.5 px-4 rounded hover:bg-gray-700"><i class="fas fa-users mr-2"></i>Users</a>
      </nav>
    </div>

    <div class="md:hidden bg-gray-800 text-white p-4">
      <button id="menuToggle" class="block focus:outline-none" onclick="toggleSidebar()">
        <i class="fas fa-bars"></i>
      </button>
    </div>

    <div id="mobileSidebar" class="bg-gray-800 text-white w-64 p-4 hidden">
      <nav>
        <a href="../home.php" class="block py-2.5 px-4 rounded hover:bg-gray-700"><i class="fas fa-tachometer-alt mr-2"></i>Dashboard</a>
        <a href="./courses/index.php" class="block py-2.5 px-4 rounded hover:bg-gray-700"><i class="fas fa-book mr-2"></i>Courses</a>
        <a href="../category/category.php" class="block py-2.5 px-4 rounded hover:bg-gray-700"><i class="fas fa-list-alt mr-2"></i>Categories</a>
        <a href="../tags/tags.php" class="block py-2.5 px-4 rounded hover:bg-gray-700"><i class="fas fa-tags mr-2"></i>Tags</a>
        <a href="./users.php" class="block py-2.5 px-4 rounded hover:bg-gray-700"><i class="fas fa-users mr-2"></i>Users</a>
      </nav>
    </div>

    <div class="flex-1 p-6">
      <h1 class="text-2xl font-semibold text-gray-700"><i class="fas fa-users mr-2"></i>Users</h1>
      
      <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php
          if (empty($users)) {
            echo '<div class="col-span-full text-center text-lg text-gray-600">No users available.</div>';
          } else {
            foreach ($users as $user) {
        ?>
          <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col items-start space-y-4">
            <div class="flex items-center space-x-4">
              <h3 class="text-xl font-semibold text-gray-800"><?php echo $user["name"]; ?></h3>
              <div class="text-sm text-gray-500"><?php echo $user["role"]; ?></div>
            </div>
            <div class="text-sm text-gray-500">Status: <?php echo $user["validation"]; ?></div>
            <div class="mt-4 space-x-2 flex">

            <form method="POST" action="./update.php">
                <input type="hidden" name="action" value="active">
                <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                <button type="submit" name="active" class="text-white bg-green-600 hover:bg-green-700 px-4 py-2 rounded">Active</button>
              </form>


              <form method="POST" action="./update.php">
                <input type="hidden" name="action" value="suspended">
                <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                <button type="submit" name="suspended" class="text-white bg-orange-600 hover:bg-orange-700 px-4 py-2 rounded">Suspended</button>
              </form>


              <form method="POST" action="./update.php">
                <input type="hidden" name="action" value="deleted">
                <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                <button type="submit" name="deleted" class="text-white bg-red-600 hover:bg-red-700 px-4 py-2 rounded">Delete</button>
              </form>
            </div>
          </div>
        <?php
            }
          }
        ?>
      </div>
    </div>
  </div>
</body>
</html>
