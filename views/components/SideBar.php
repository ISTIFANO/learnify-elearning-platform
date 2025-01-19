<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Add Tailwind CSS via CDN for convenience -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-ubuntu bg-gray-100">

    <!-- Navigation Sidebar -->
    <div class="navigation fixed top-0 left-0 h-full bg-blue-900 text-white w-72 p-6 transition-all duration-300 ease-in-out">
        <ul>
            <!-- Brand Name -->
            <li class="mb-10">
                <a href="#" class="flex items-center space-x-4 hover:bg-white hover:text-blue-900 rounded-lg p-2">
                    <span class="icon text-2xl">
                        <ion-icon name="logo-apple"></ion-icon>
                    </span>
                    <span class="title text-xl">Brand Name</span>
                </a>
            </li>

         

            <!-- Users -->
            <li class="mb-4">
                <a href="/Statistic" class="flex items-center space-x-4 hover:bg-white hover:text-blue-900 rounded-lg p-2">
                    <span class="icon text-2xl">
                        <ion-icon name="people-outline"></ion-icon>
                    </span>
                    <span class="title text-lg">statistics</span>
                </a>
            </li>

            <!-- Tags -->
            <li class="mb-4">
                <a href="/Tags" class="flex items-center space-x-4 hover:bg-white hover:text-blue-900 rounded-lg p-2">
                    <span class="icon text-2xl">
                        <ion-icon name="chatbubble-outline"></ion-icon>
                    </span>
                    <span class="title text-lg">Tags</span>
                </a>
            </li>

            <!-- Categories -->
            <li class="mb-4">
                <a href="/Categories" class="flex items-center space-x-4 hover:bg-white hover:text-blue-900 rounded-lg p-2">
                    <span class="icon text-2xl">
                        <ion-icon name="help-outline"></ion-icon>
                    </span>
                    <span class="title text-lg">Categories</span>
                </a>
            </li>

            <!-- Settings -->
            <li class="mb-4">
                <a href="/Utilisateurs" class="flex items-center space-x-4 hover:bg-white hover:text-blue-900 rounded-lg p-2">
                    <span class="icon text-2xl">
                        <ion-icon name="settings-outline"></ion-icon>
                    </span>
                    <span class="title text-lg">Utilisateurs</span>
                </a>
            </li>

            <!-- Logout -->
            <li>
                <a href="/Logout" class="flex items-center space-x-4 hover:bg-white hover:text-blue-900 rounded-lg p-2">
                    <span class="icon text-2xl">
                        <ion-icon name="settings-outline"></ion-icon>
                    </span>
                    <span class="title text-lg">Logout</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- Scripts -->
    <script src="../../public/js/main.js"></script>

    <!-- ====== Ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>
</html>
