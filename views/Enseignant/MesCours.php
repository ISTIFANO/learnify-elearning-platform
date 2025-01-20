<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tags Courses</title>
</head>

<body class="bg-gray-100">

    <div class="flex h-screen">

        <?php include('../views/components/SideBarEnseignant.php'); ?>

        <div class="ml-72 flex-1 p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php
                require_once PROJECT_ROOT . '\src\controllers\CoursController.php';

                $coursController = new CoursController;

                foreach ($coursController->getCoursesByTeacher(3) as $course): ?>
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <img src="<?= htmlspecialchars($course->getPhoto()) ?>" alt="Course Image" class="w-full h-48 object-cover">

                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-gray-800"><?= htmlspecialchars($course->getTitre()) ?></h3>
                            <p class="text-sm text-gray-600 mt-2"><?= htmlspecialchars($course->getDescription()) ?></p>
                        </div>

                        <div class="flex justify-between p-4 bg-gray-50">
                            <button class="px-4 py-2 bg-blue-500 text-white rounded-md">Edit</button>
                            <button class="px-4 py-2 bg-red-500 text-white rounded-md">Delete</button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
