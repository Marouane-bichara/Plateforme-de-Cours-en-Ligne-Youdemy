<?php

  require_once "../../../vendor/autoload.php";

use App\Controllers\AuthUsers\AuthUsers;

session_start();
if(isset($_SESSION["user_idStudent"]))
{
  header("Location:../student/home.php");
}
if(isset($_SESSION["user_idTeacher"]))
{
  header("Location:../teacher/home.php");
}
if(isset($_SESSION["user_idAdmin"]))
{
  header("Location:../admin/home.php");
}


if(isset($_POST["submitSignIn"]))
{
  $email = $_POST["email"];
  $password = $_POST["password"];

  $authController = new AuthUsers();
  $authController->login($email, $password);
}
  if(isset($_POST["registeruser"]))
  {
    $nomeregister = $_POST["nomeRegister"];
    $prenomeregister = $_POST["prenomeRegister"];
    $emailRegister = $_POST["emailRegister"];
    $roleRegister = $_POST["roleRegister"];
    $passwordRegister = $_POST["passwordRegister"];
    $confirmpasswordRegister = $_POST["confirm-passwordRegister"];

    $registerController = new AuthUsers();
    $registerController->Register($nomeregister ,$prenomeregister,$emailRegister,$roleRegister,$passwordRegister,$confirmpasswordRegister);
  }

?>



<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../../output.css" rel="stylesheet">
  <title>Login - CareerLink</title>
</head>
<body class="bg-gray-100 font-sans antialiased">

  <header class="bg-white shadow-md sticky top-0 z-50 px-6 py-4 flex justify-between items-center">
    <a href="../home/index.php" class="text-gray-700 text-2xl font-semibold flex items-center">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
      </svg>
    </a>
    <h1 class="text-2xl font-semibold text-gray-800">Youdemy</h1>
    <div></div> 
  </header>

  <div class="min-h-screen bg-gray-200 flex items-center justify-center py-6 px-4 sm:px-6 lg:px-8">

    <div class="w-full max-w-md bg-white rounded-lg shadow-xl p-8 space-y-6">
      <h2 class="tite text-3xl font-semibold text-center text-gray-800">Welcome Back!</h2>
      <p class="signuptext text-center text-gray-600">Please sign in to continue.</p>

      <form id="login-form" action="" method="POST" class="space-y-6">
        <div>
          <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
          <input type="email" id="email" name="email" required
            class="mt-2 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 placeholder-gray-500 text-gray-900 focus:outline-none">
        </div>

        <div>
          <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
          <input type="password" id="password" name="password" required
            class="mt-2 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 placeholder-gray-500 text-gray-900 focus:outline-none">
        </div>

        <div class="flex justify-end">
          <a href="#" class="text-sm text-blue-600 hover:text-blue-500">Forgot Password?</a>
        </div>

        <div>
          <button type="submit" name="submitSignIn"
            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
            Sign In
          </button>
        </div>
      </form>

      <form id="register-form" action="" method="POST" class="space-y-6 hidden">
        <div>
          <label for="name" class="block text-sm font-medium text-gray-700">nome</label>
          <input type="text" id="name" name="nomeRegister" required
            class="mt-2 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 placeholder-gray-500 text-gray-900 focus:outline-none">
        </div>
        <div>
          <label for="name" class="block text-sm font-medium text-gray-700">prenome</label>
          <input type="text" id="name" name="prenomeRegister" required
            class="mt-2 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 placeholder-gray-500 text-gray-900 focus:outline-none">
        </div>

        <div>
          <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
          <input type="email" id="email" name="emailRegister" required
            class="mt-2 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 placeholder-gray-500 text-gray-900 focus:outline-none">
        </div>
 
        <div>
            <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
            <select id="role" name="roleRegister" required
              class="mt-2 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 placeholder-gray-500 text-gray-900 focus:outline-none">
              <option value="student">student</option>
              <option value="teacher">teacher</option>
            </select>
            </div>

        <div>
          <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
          <input type="password" id="password" name="passwordRegister" required
            class="mt-2 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 placeholder-gray-500 text-gray-900 focus:outline-none">
        </div>

        <div>
          <label for="confirm-password" class="block text-sm font-medium text-gray-700">Confirm Password</label>
          <input type="password" id="confirm-password" name="confirm-passwordRegister" required
            class="mt-2 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 placeholder-gray-500 text-gray-900 focus:outline-none">
        </div>

        <div>
          <button type="submitSignUp" name="registeruser" id="buttonRegister"
            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
            Sign Up
          </button>
        </div>
      </form>

      <div class="text-center">
        <p class="text-sm text-gray-600">
          <a href="#" id="toggle-link" onclick="toggleForm()"  class="text-blue-600 hover:text-blue-500 font-semibold">Don't have an account? Sign Up</a>
        </p>
      </div>
    </div>
  </div>

  <script src="../../scripts/register.js"></script>

</body>
</html>