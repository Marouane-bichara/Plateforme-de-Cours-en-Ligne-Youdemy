<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../../output.css" rel="stylesheet">
  <title>Youdemy - Home</title>
  <style>
    #mobile-menu {
      transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
    }
    #mobile-menu.open {
      transform: scale(1);
      opacity: 1;
    }
    #mobile-menu.closed {
      transform: scale(0);
      opacity: 0;
    }
  </style>
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

  <section class="bg-cover bg-center py-20" style="background-image: url('../../images/imagesSiteweb/jobPictre.png');">
    <div class="container mx-auto px-4 text-center">
      <h2 class="text-5xl font-bold mb-4 text-white inline-block px-2"><span class="text-blue-600">Revolutionize</span> Learning with Youdemy</h2>
      <p class="text-lg mb-8 text-white">Your gateway to interactive and personalized learning experiences.</p>
      <div>
        <a href="../auth/login.php" class="px-8 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 font-medium">Log In</a>
        <a href="../auth/login.php" class="px-8 py-3 bg-gray-500 text-white rounded-lg hover:bg-gray-600 font-medium ml-4">Register</a>
      </div>
    </div>
  </section>

  <section id="why-youdemy" class="py-16 bg-gray-100">
    <div class="container mx-auto px-4 text-center">
      <h3 class="text-3xl font-bold text-gray-800 mb-12">Why Choose Youdemy</h3>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-white shadow-lg rounded-lg p-6 text-center cursor-pointer">
          <div class="bg-gray-200 h-48 flex items-center justify-center rounded-lg mb-6">
            <img src="../../images/imagesSiteweb/courseHappy.png" alt="Course Creation" class="h-full w-full object-cover rounded-lg">
          </div>
          <h4 class="font-bold text-gray-800">Create Your Own Courses</h4>
          <p class="text-gray-600 mt-2">Teach anything you are passionate about with our easy-to-use tools.</p>
        </div>
        <div class="bg-white shadow-lg rounded-lg p-6 text-center cursor-pointer">
          <div class="bg-gray-200 h-48 flex items-center justify-center rounded-lg mb-6">
            <img src="../../images/imagesSiteweb/searchCourse.png" alt="Dynamic Search" class="h-full w-full object-cover rounded-lg">
          </div>
          <h4 class="font-bold text-gray-800">Dynamic Course Search</h4>
          <p class="text-gray-600 mt-2">Easily find the course that suits your needs with filters.</p>
        </div>
        <div class="bg-white shadow-lg rounded-lg p-6 text-center cursor-pointer">
          <div class="bg-gray-200 h-48 flex items-center justify-center rounded-lg mb-6">
            <img src="../../images/imagesSiteweb/trackProgress.png" alt="Track Progress" class="h-full w-full object-cover rounded-lg">
          </div>
          <h4 class="font-bold text-gray-800">Track Your Learning</h4>
          <p class="text-gray-600 mt-2">Monitor your progress and keep track of the courses you've completed.</p>
        </div>
      </div>
    </div>
  </section>

  <section id="featured-courses" class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 text-center">
      <h3 class="text-4xl font-extrabold text-gray-800 text-center mb-12">Featured Courses</h3>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

        <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300 cursor-pointer">
          <img src="../../images/imagesSiteweb/webdev.png" alt="Web Development" class="h-56 w-full object-cover">
          <div class="p-6">
            <h4 class="text-2xl font-semibold text-gray-800">Web Development for Beginners</h4>
            <p class="text-gray-600 mt-4">Learn the basics of HTML, CSS, and JavaScript with interactive exercises.</p>
            <div class="flex items-center mt-4">
              <img src="../../images/imagesSiteweb/Said-Aabilla.jpg" alt="Said Aabilla" class="h-12 w-12 object-cover rounded-full border">
              <div class="ml-4">
                <p class="text-gray-800 font-medium">Said Aabilla</p>
                <p class="text-gray-500 text-sm">Instructor</p>
              </div>
            </div>
          </div>
          <div class="bg-gray-100 px-6 py-4 flex items-center justify-between">
            <a href="#" class="text-blue-500 text-sm font-medium hover:underline">Start Learning</a>
          </div>
        </div>

        <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300 cursor-pointer">
          <img src="../../images/imagesSiteweb/graphicdesigner.png" alt="Tayeb Souini" class="h-56 w-full object-cover">
          <div class="p-6">
            <h4 class="text-2xl font-semibold text-gray-800">Mastering Graphic Design</h4>
            <p class="text-gray-600 mt-4">Create stunning designs using tools like Adobe Photoshop and Illustrator.</p>
            <div class="flex items-center mt-4">
              <img src="../../images/imagesSiteweb/Tayeb-Souini.jpg" alt="Jane Smith" class="h-12 w-12 object-cover rounded-full border">
              <div class="ml-4">
                <p class="text-gray-800 font-medium">Tayeb Souini</p>
                <p class="text-gray-500 text-sm">Instructor</p>
              </div>
            </div>
          </div>
          <div class="bg-gray-100 px-6 py-4 flex items-center justify-between">
            <a href="#" class="text-blue-500 text-sm font-medium hover:underline">Start Learning</a>
          </div>
        </div>

        <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300 cursor-pointer">
          <img src="../../images/imagesSiteweb/datas.png" alt="Aymane Benhima" class="h-56 w-full object-cover">
          <div class="p-6">
            <h4 class="text-2xl font-semibold text-gray-800">Data Science Bootcamp</h4>
            <p class="text-gray-600 mt-4">Learn data analysis, machine learning, and AI with real-world projects.</p>
            <div class="flex items-center mt-4">
              <img src="../../images/imagesSiteweb/Aymane-Benhima.jpg" alt="Aymane Benhima" class="h-12 w-12 object-cover rounded-full border">
              <div class="ml-4">
                <p class="text-gray-800 font-medium">Aymane Benhima</p>
                <p class="text-gray-500 text-sm">Instructor</p>
              </div>
            </div>
          </div>
          <div class="bg-gray-100 px-6 py-4 flex items-center justify-between">
            <a href="../auth/login.php" class="text-blue-500 text-sm font-medium hover:underline">Start Learning</a>
          </div>
        </div>

      </div>
    </div>
  </section>


  <footer class="bg-gray-800 text-gray-200 py-8">
    <div class="container mx-auto text-center">
      <h5 class="text-lg font-bold mb-2">Stay Connected</h5>
      <div class="flex justify-center gap-8 mb-4">
        <a href="#" class="text-gray-200 hover:text-white">Facebook</a>
        <a href="#" class="text-gray-200 hover:text-white">Twitter</a>
        <a href="#" class="text-gray-200 hover:text-white">LinkedIn</a>
      </div>
      <p>&copy; 2024 Youdemy. All rights reserved.</p>
    </div>
  </footer>

  <script src="../../scripts/menu.js"></script>
</body>
</html>
