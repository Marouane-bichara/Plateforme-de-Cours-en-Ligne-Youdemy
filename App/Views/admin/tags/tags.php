<?php

use App\Controllers\Tags\TagsCrud;

require_once "../../../../vendor/autoload.php";

session_start();

if ((!isset($_SESSION["idAdmin"]) && !isset($_SESSION["nameAdmin"]) && $_SESSION["nameAdmin"] != "admin")) {
    header("Location: ../../auth/login.php");
    exit();
}

$getTags = new TagsCrud();
$tags = $getTags->getTagsController();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Tags</title>
  <link href="../../../output.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <script>
    function toggleSidebar() {
      const sidebar = document.getElementById("mobileSidebar");
      sidebar.classList.toggle("hidden");
    }

    function openAddModal() {
      document.getElementById("addTagModal").classList.remove("hidden");
    }

    function closeAddModal() {
      document.getElementById("addTagModal").classList.add("hidden");
    }

    function openEditModal(tagId, tagName) {
      document.getElementById("editTagId").value = tagId; // Set the tag ID
      document.getElementById("editTagName").value = tagName; // Set the tag name
      document.getElementById("editTagModal").classList.remove("hidden");
    }

    function closeEditModal() {
      document.getElementById("editTagModal").classList.add("hidden");
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
      <a href="../courses/courses.php" class="block py-2.5 px-4 rounded hover:bg-gray-700"><i class="fas fa-book mr-2"></i>Courses</a>
      <a href="../category/category.php" class="block py-2.5 px-4 rounded hover:bg-gray-700"><i class="fas fa-list-alt mr-2"></i>Categories</a>
      <a href="./tags.php" class="block py-2.5 px-4 rounded hover:bg-gray-700"><i class="fas fa-tags mr-2"></i>Tags</a>
      <a href="../users/users.php" class="block py-2.5 px-4 rounded hover:bg-gray-700"><i class="fas fa-users mr-2"></i>Users</a>
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
      <a href="../courses/courses.php" class="block py-2.5 px-4 rounded hover:bg-gray-700"><i class="fas fa-book mr-2"></i>Courses</a>
      <a href="../category/category.php" class="block py-2.5 px-4 rounded hover:bg-gray-700"><i class="fas fa-list-alt mr-2"></i>Categories</a>
      <a href="./tags/index.php" class="block py-2.5 px-4 rounded hover:bg-gray-700"><i class="fas fa-tags mr-2"></i>Tags</a>
      <a href="../users/users.php" class="block py-2.5 px-4 rounded hover:bg-gray-700"><i class="fas fa-users mr-2"></i>Users</a>
    </nav>
  </div>

  <div class="flex-1 p-6">
    <div class="flex justify-between items-center mb-6">
      <h1 class="text-2xl font-semibold text-gray-700"><i class="fas fa-tags mr-2"></i>Manage Tags</h1>
      <button onclick="openAddModal()" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
        <i class="fas fa-plus mr-2"></i>Add New
      </button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 max-h-[75vh] overflow-y-scroll">
      <?php if (!empty($tags)): ?>
        <?php foreach ($tags as $tag): ?>
          <div class="bg-white p-4 rounded shadow hover:shadow-lg transition">
            <div class="flex justify-between items-center">
              <h2 class="text-lg font-semibold text-gray-700"><?php echo htmlspecialchars($tag['name']); ?></h2>

              <div class="flex space-x-2">
                <!-- Edit Button -->
                <button onclick="openEditModal(<?php echo $tag['id']; ?>, '<?php echo addslashes($tag['name']); ?>')" class="text-blue-500 hover:text-blue-700">
                  <i class="fas fa-edit"></i>
                </button>

                <form method="POST" action="./delete.php" onsubmit="return confirm('Are you sure you want to delete this tag?');">
                  <input type="hidden" name="idTag" value="<?php echo htmlspecialchars($tag['id']); ?>">
                  <button type="submit" class="text-red-500 hover:text-red-700">
                    <i class="fas fa-trash"></i>
                  </button>
                </form>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p class="text-gray-600">No tags found.</p>
      <?php endif; ?>
    </div>

    <div id="addTagModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
      <div class="bg-white p-6 rounded shadow-lg w-96">
        <h2 class="text-xl font-bold text-gray-700 mb-4">Add New Tag</h2>
        <form action="./create.php" method="POST">
          <label class="block text-gray-700">Tag Name</label>
          <input type="text" name="addTag" class="w-full p-2 border rounded mt-2 mb-4" placeholder="Enter tag name">
          <div class="flex justify-end">
            <button type="button" onclick="closeAddModal()" class="bg-gray-300 px-4 py-2 rounded hover:bg-gray-400 mr-2">Cancel</button>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save</button>
          </div>
        </form>
      </div>
    </div>

    <div id="editTagModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
      <div class="bg-white p-6 rounded shadow-lg w-96">
        <h2 class="text-xl font-bold text-gray-700 mb-4">Edit Tag</h2>
        <form action="./edite.php" method="POST">
          <input type="hidden" id="editTagId" name="editTagId">
          <label class="block text-gray-700">Tag Name</label>
          <input type="text" id="editTagName" name="editTagName" class="w-full p-2 border rounded mt-2 mb-4" placeholder="Enter tag name">
          <div class="flex justify-end">
            <button type="button" onclick="closeEditModal()" class="bg-gray-300 px-4 py-2 rounded hover:bg-gray-400 mr-2">Cancel</button>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save</button>
          </div>
        </form>
      </div>
    </div>

  </div>
</div>
</body>
</html>
