<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../public/css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<?php
require_once PROJECT_ROOT . '\src\controllers\UserController.php';

$userr = new UserController();
$showall = $userr->getAllUsers();
?>

<body class="bg-gray-100">

    <!-- Order Details List -->
    <div class="flex h-screen">

        <!-- Include Sidebar -->
        <?php include('../views/components/SideBar.php'); ?>

        <!-- Main Content -->
        <div class="ml-72 flex-1 p-6">
            <div class="recentOrders bg-white rounded-lg shadow">
                <div class="cardHeader flex justify-between items-center p-4 border-b border-gray-200">
                    <h2 class="text-xl font-semibold text-gray-800">Recent Orders</h2>
                    <a href="#" class="btn bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">View All</a>
                </div>

                <table class="w-full min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Photo</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">First Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Last Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>

                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>

                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php foreach ($showall as $key): ?>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">
                                    <div class="imgBx">
                                        <img src="<?= htmlspecialchars($key->getPhoto()) ?>" alt="Photo" class="w-10 h-10 rounded-full">
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-medium text-gray-900"><?= htmlspecialchars($key->getFirstname()) ?></div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-medium text-gray-900"><?= htmlspecialchars($key->getLastname()) ?></div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-500"><?= htmlspecialchars($key->getEmail()) ?></div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="status delivered text-sm text-green-600"><?= htmlspecialchars($key->getIsValide() ? 'Valid' : 'Invalid') ?><form method="POST" action="update_user_status.php">
                                            <input type="hidden" name="user_id" value="<?= $key->getId() ?>">
                                            <select name="status" class="text-sm text-gray-500 bg-white border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                                <option value="Pending" <?= $key->getIsValide() == 'Pending' ? 'selected' : '' ?>>Pending</option>
                                                <option value="Active" <?= $key->getIsValide() == 'Active' ? 'selected' : '' ?>>Active</option>
                                                <option value="Rejected" <?= $key->getIsValide() == 'Rejected' ? 'selected' : '' ?>>Rejected</option>
                                            </select>
                                            <button type="submit" class="ml-2 bg-blue-600 text-white px-2 py-1 rounded-lg hover:bg-blue-700 transition">Update</button>
                                        </form></span>
                             
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-500"><?= htmlspecialchars($key->getRole()->getRoleName()) ?>
                                   


                                    </div>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-500"><?= htmlspecialchars($key->getPhone()) ?>
                                   


                                    </div>
                                </td>
                                <td> <div class="flex justify-center space-x-2">
                                    <!-- Edit Button -->
                                    <a href="edit_user.php?id=<?= $key->getId() ?>" class="text-blue-600 hover:text-blue-800 rounded-full hover:bg-blue-100 p-2 transition">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                        </svg>
                                    </a>
                                    <!-- Delete Button -->
                                    <form action="/deletedUser" method="POST" class="inline">
                                        <input type="hidden" name="user_id" value="<?= $key->getId() ?>">
                                        <button type="submit" class="text-red-600 hover:text-red-800 rounded-full hover:bg-red-100 p-2 transition" onclick="return confirm('Are you sure you want to delete this user?')">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script src="../../public/js/main.js"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>