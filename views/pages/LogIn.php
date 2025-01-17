<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Document</title>
</head>
<body>
<section class="signup-area h-screen overflow-hidden bg-gray-100 py-12 bg-cover flex content-center items-center bg-center bg-no-repeat" style="background-image: url('https://img.freepik.com/free-photo/tired-male-student-wiping-sweat-off-forehead-holding-laptop-backpack-standing-orange-sweater_1258-155435.jpg?t=st=1737040166~exp=1737043766~hmac=e17174c8aa243b75aff1e8a2420161321b94719d4f887d92f95b52cca9656924&w=1380');">
  <div class="container mx-auto px-4">
    <div class="flex flex-col lg:flex-row items-center justify-center">
      <!-- Left Column: Signup Form -->
      <div class="lg:w-5/12 w-full order-2 lg:order-1 p-6 bg-white shadow-lg rounded-lg bg-opacity-80">
        <h2 class="text-2xl font-bold mb-2">Sign Up</h2>
        <p class="text-sm text-gray-600 mb-4">Already have an account? <a href="signin.html" class="text-blue-600 hover:underline">Sign In</a></p>

        <form action="#">
         
          <div class="form-element mb-4">
            <label for="email" class="block text-gray-700 mb-2">Email</label>
            <span class="text-xs text-red-500">*please enter a valid email</span>
            <input type="email" placeholder="arifAhmed@gmail.com" id="email" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
          </div>

        

          <!-- Confirm Password -->
          <div class="form-element mb-4">
            <label for="confirm-password" class="block text-gray-700 mb-2"> Password</label>
            <input type="password" placeholder="Type here..." id="confirm-password" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
            <div class="absolute right-3 top-1/2 transform -translate-y-1/2 cursor-pointer" onclick="togglePasswordVisibility('confirm-password')">
             
            </div>
          </div>

        

          <!-- Submit Button -->
          <div class="form-element mb-4">
            <a href="./SignUp.php">
            <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-md hover:bg-blue-700">Sign Up</button>
            </a>  </div>


         
        </form>
      </div>

      
    </div>
  </div>
</section>


</body>
</html>