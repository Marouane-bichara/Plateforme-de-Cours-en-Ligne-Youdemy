<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../../output.css" rel="stylesheet">
  <title>Contact Us - Youdemy</title>
  <style>
    .contact-card {
      transition: transform 0.3s ease-in-out, box-shadow 0.3s ease;
    }
    .contact-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    }
    .form-icon {
      font-size: 2rem;
      color: #4A90E2;
    }
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
<body class="bg-gray-100 font-sans antialiased">

<header class="bg-white shadow-lg sticky top-0 z-50">
  <div class="container mx-auto px-4 py-4 flex justify-between items-center">
    <h1 class="text-2xl font-bold text-blue-600 cursor-pointer">Youdemy</h1>
    <nav class="hidden md:flex gap-8">
      <a href="./index.php" class="text-gray-700 hover:text-blue-600 font-medium">Home</a>
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

<!-- Mobile Menu -->
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
      <a href="./about.php" class="text-gray-800 text-xl font-semibold hover:text-blue-600 transition-all duration-300">About Us</a>
      <a href="./contact.php" class="text-gray-800 text-xl font-semibold hover:text-blue-600 transition-all duration-300">Contact</a>
    </nav>
  </div>
</div>

<section class="py-20 bg-gradient-to-r from-blue-100 to-blue-50">
  <div class="container mx-auto px-6 text-center">
    <h2 class="text-4xl font-extrabold text-gray-800 mb-8">Get In Touch With Us</h2>
    <p class="text-lg text-gray-600 mb-12 max-w-4xl mx-auto">
      Whether you're a student eager to learn or an instructor ready to teach, Youdemy is here to help you achieve your learning goals. Reach out to us for any inquiries, support, or feedback.
    </p>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
      <div class="contact-card bg-white p-8 rounded-lg shadow-xl">
        <h3 class="text-3xl font-extrabold text-gray-800 mb-6">Send Us a Message</h3>
        <form action="#" method="POST" class="space-y-6">
          <div>
            <label for="name" class="block text-left text-lg text-gray-700 font-semibold mb-2">Full Name</label>
            <input type="text" id="name" name="name" class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" placeholder="Your Full Name" required>
          </div>
          <div>
            <label for="email" class="block text-left text-lg text-gray-700 font-semibold mb-2">Email Address</label>
            <input type="email" id="email" name="email" class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" placeholder="Your Email Address" required>
          </div>
          <div>
            <label for="message" class="block text-left text-lg text-gray-700 font-semibold mb-2">Your Message</label>
            <textarea id="message" name="message" rows="6" class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" placeholder="Write your message here..." required></textarea>
          </div>
          <button type="submit" class="w-full py-3 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 transition-colors duration-300">
            Send Message
          </button>
        </form>
      </div>

      <div class="contact-card bg-white p-8 rounded-lg shadow-xl">
        <h3 class="text-3xl font-extrabold text-gray-800 mb-6">Our Contact Information</h3>
        <div class="mb-6">
          <div class="flex items-center space-x-4">
            <div class="form-icon">
              <i class="fas fa-phone-alt"></i>
            </div>
            <p class="text-lg text-gray-700">Phone: +212 653356205</p>
          </div>
        </div>
        <div class="mb-6">
          <div class="flex items-center space-x-4">
            <div class="form-icon">
              <i class="fas fa-envelope"></i>
            </div>
            <p class="text-lg text-gray-700">Email: support@youdemy.com</p>
          </div>
        </div>
        <div class="mb-6">
          <div class="flex items-center space-x-4">
            <div class="form-icon">
              <i class="fas fa-map-marker-alt"></i>
            </div>
            <p class="text-lg text-gray-700">Address: 456 Youdemy Ave, San Francisco, CA 94105</p>
          </div>
        </div>
        
        <div class="mb-6">
          <h4 class="text-2xl font-bold text-gray-800 mb-4">Follow Us</h4>
          <div class="flex gap-6">
            <a href="#" class="text-blue-600 hover:text-blue-700">
              <i class="fab fa-facebook-f text-3xl"></i>
            </a>
            <a href="#" class="text-blue-400 hover:text-blue-500">
              <i class="fab fa-twitter text-3xl"></i>
            </a>
            <a href="#" class="text-blue-700 hover:text-blue-800">
              <i class="fab fa-linkedin-in text-3xl"></i>
            </a>
          </div>
        </div>
        
        <div>
          <h4 class="text-2xl font-bold text-gray-800 mb-4">Find Us</h4>
          <div class="aspect-w-16 aspect-h-9 mb-4">
            <iframe src="https://www.google.com/maps/embed?pb=..." width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<footer class="bg-gray-800 text-white py-6">
  <div class="container mx-auto px-6 text-center">
    <p>&copy; 2025 Youdemy. All Rights Reserved.</p>
  </div>
</footer>

<script src="../../scripts/menu.js"></script>

</body>
</html>
