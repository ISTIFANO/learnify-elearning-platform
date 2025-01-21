<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>
        Video Page
    </title>
    <script src="https://cdn.tailwindcss.com">
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
</head>
<?php
// C:\wamp64\www\learnify-elearning-platform\src\controllers\CoursController.php
require_once PROJECT_ROOT . '\src\controllers\CoursController.php';
$courses = new CoursController();

foreach ($courses->getCourseById($_POST["idcourses"]) as $course): ?>

    <body class="bg-gray-100 flex justify-center items-center min-h-screen">
        <div class="bg-white rounded-lg shadow-lg p-4 max-w-3xl w-full">
            <div class="relative pb-56.25%">
                <iframe allowfullscreen="" class="absolute top-0 left-0 w-full h-full rounded-lg" frameborder="0"
                    src=<?= htmlspecialchars($course->getContenue()) ?>>
                </iframe>
            </div>
            <div class="mt-4">
                <h1 class="text-xl font-semibold">
                    <?= htmlspecialchars($course->getTitre()) ?> </h1>

                <div class="flex items-center mt-4 text-gray-600">
                    <p> <?= htmlspecialchars($course->getDescription()) ?></p>
                </div>
            </div>
        </div> 
        <?php endforeach; ?>
    </body>

</html>