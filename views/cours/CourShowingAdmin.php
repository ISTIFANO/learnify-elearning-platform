<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<div class="flex h-screen">

        <!-- Include Sidebar -->
        <?php include('../views/components/SideBar.php'); ?>

        <div class="ml-72 flex-1 p-6">
        <div class="p-4 border-b border-gray-200">
            <h2 class="text-xl font-semibold text-gray-800">Liste des cours</h2>
        </div>

        <table class="w-full min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Créateur</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Catégorie</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <?php
                // C:\wamp64\www\learnify-elearning-platform\src\controllers\CoursController.php
                require_once PROJECT_ROOT . '\src\controllers\CoursController.php';
                $courses = new CoursController();

                //    $courses->read();


                foreach ($courses->read() as $course): ?>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">
                                <?= htmlspecialchars($course->getTitre()) ?>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-500 line-clamp-2">
                                <?= htmlspecialchars($course->getDescription()) ?>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <?php if ($course->getTeacher()->getPhoto()): ?>
                                    <img class="h-8 w-8 rounded-full mr-2"
                                        src="<?= htmlspecialchars($course->getTeacher()->getPhoto()) ?>"
                                        alt="Photo de <?= htmlspecialchars($course->getTeacher()->getFirstname()) ?>">
                                <?php endif; ?>
                                <div class="text-sm font-medium text-gray-900">
                                    <?= htmlspecialchars($course->getTeacher()->getFirstname()) ?>
                                    <?= htmlspecialchars($course->getTeacher()->getLastname()) ?>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                <?= htmlspecialchars($course->getCategorie()->getName()) ?>
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            <div class="flex justify-center space-x-2">
                                <!-- Update Button -->
                                <a href="update_course.php?id=<?= $course->getId() ?>"
                                    class="p-2 text-blue-600 hover:text-blue-800 rounded-full hover:bg-blue-100 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </a>
                                <!-- Delete Button -->

                                <form action="/users" method="POST" class="inline">
                                    <input type="hidden" name="course_id" value="<?= $course->getId() ?>">
                                    <?php
                                    //if($_POST['course_id']){  $courses->deleteCourse($_POST['course_id']); }

                                    ?>

                                    <button type="submit"
                                        class="p-2 text-red-600 hover:text-red-800 rounded-full hover:bg-red-100 transition-colors"
                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce cours ?')">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>

                <?php if (empty($courses)): ?>
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                            Aucun cours trouvé
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    </div>

</body>

</html>