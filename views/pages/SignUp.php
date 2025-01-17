<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Document</title>
</head>
<body>
<section class="signup-area overflow-hidden bg-gray-100 py-12 bg-cover bg-center bg-no-repeat" style="background-image: url('https://img.freepik.com/free-photo/dreamy-cute-smart-college-girl-female-student-hipster-red-beanie-yellow-hoodie-looking-thoughtful_1258-116823.jpg?t=st=1737039661~exp=1737043261~hmac=a039a93c9d30c18ded847e92ec0a2b092db2be21eb5e49ffff67c069bccb15f3&w=1380');">
  <div class="container mx-auto px-4">
    <div class="flex flex-col lg:flex-row items-center justify-center">
      <!-- Left Column: Signup Form -->
      <div class="lg:w-5/12 w-full order-2 lg:order-1 p-6 bg-white shadow-lg rounded-lg bg-opacity-80">
        <h2 class="text-2xl font-bold mb-2">Sign Up</h2>
        <p class="text-sm text-gray-600 mb-4">Already have an account? <a href="signin.html" class="text-blue-600 hover:underline">Sign In</a></p>

        <form action="#">
          <!-- Full Name -->
          <div class="form-element mb-4">
            <label for="name" class="block text-gray-700 mb-2">Name</label>
            <input type="text" placeholder="Arif Ahmed" id="name" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
          </div>
          <div class="form-element mb-4">
            <label for="name" class="block text-gray-700 mb-2">lastName</label>
            <input type="text" placeholder="Arif Ahmed" id="name" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
          </div>
          <!-- Email -->
          <div class="form-element mb-4">
            <label for="email" class="block text-gray-700 mb-2">Email</label>
            <span class="text-xs text-red-500">*please enter a valid email</span>
            <input type="email" placeholder="arifAhmed@gmail.com" id="email" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
          </div>

          <!-- Password -->
          <div class="form-element mb-4">
            <label for="password" class="block text-gray-700 mb-2">Telephone</label>
            <input type="text" placeholder="Type here..." id="password" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
            <div class="absolute right-3 top-1/2 transform -translate-y-1/2 cursor-pointer" onclick="togglePasswordVisibility('password')">
          
            </div>
          </div>

          <!-- Confirm Password -->
          <div class="form-element mb-4">
            <label for="confirm-password" class="block text-gray-700 mb-2"> Password</label>
            <input type="password" placeholder="Type here..." id="confirm-password" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
            <div class="absolute right-3 top-1/2 transform -translate-y-1/2 cursor-pointer" onclick="togglePasswordVisibility('confirm-password')">
             
            </div>
          </div>

          <!-- Terms and Conditions Checkbox -->
          <div class="form-element flex items-center mb-4">
            <input class="form-checkbox text-blue-600 mr-2" type="checkbox" id="agree" />
            <label for="agree" class="text-sm text-gray-700">Accept the <a href="#" class="text-blue-600 hover:underline">Terms</a> and <a href="#" class="text-blue-600 hover:underline">Privacy Policy</a></label>
          </div>

          <!-- Submit Button -->
          <div class="form-element mb-4">
            <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-md hover:bg-blue-700">Sign Up</button>
          </div>


         
        </form>
      </div>

      
    </div>
  </div>
</section>


</body>
</html>