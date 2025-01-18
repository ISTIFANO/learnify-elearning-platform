<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <!-- <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold text-center mb-6">Détails de l'utilisateur</h1>
        
        <!-- Table des informations de l'utilisateur -->
        <table class="min-w-full bg-white shadow-lg rounded-lg overflow-hidden">
            <thead>
                <tr class="bg-gray-200 text-left">
                    <th class="py-3 px-4 text-sm font-semibold text-gray-600">Champ</th>
                    <th class="py-3 px-4 text-sm font-semibold text-gray-600">Valeur</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b">
                    <td class="py-3 px-4 text-sm text-gray-600">ID</td>
                    <td class="py-3 px-4 text-sm text-gray-800"><?php echo $id; ?></td>
                </tr>
                <tr class="border-b">
                    <td class="py-3 px-4 text-sm text-gray-600">Prénom</td>
                    <td class="py-3 px-4 text-sm text-gray-800"><?php echo $firstname; ?></td>
                </tr>
                <tr class="border-b">
                    <td class="py-3 px-4 text-sm text-gray-600">Nom</td>
                    <td class="py-3 px-4 text-sm text-gray-800"><?php echo $lastname; ?></td>
                </tr>
                <tr class="border-b">
                    <td class="py-3 px-4 text-sm text-gray-600">Email</td>
                    <td class="py-3 px-4 text-sm text-gray-800"><?php echo $email; ?></td>
                </tr>
                <tr class="border-b">
                    <td class="py-3 px-4 text-sm text-gray-600">Téléphone</td>
                    <td class="py-3 px-4 text-sm text-gray-800"><?php echo $phone; ?></td>
                </tr>
                <tr class="border-b">
                    <td class="py-3 px-4 text-sm text-gray-600">Photo</td>
                    <td class="py-3 px-4 text-sm text-gray-800">
                        <img src="<?php echo $photo; ?>" alt="Photo de l'utilisateur" class="w-24 h-24 rounded-full">
                    </td>
                </tr>
                <tr class="border-b">
                    <td class="py-3 px-4 text-sm text-gray-600">Statut</td>
                    <td class="py-3 px-4 text-sm text-gray-800"><?php echo $is_active === '1' ? 'Actif' : 'Inactif'; ?></td>
                </tr>
                <tr class="border-b">
                    <td class="py-3 px-4 text-sm text-gray-600">Role ID</td>
                    <td class="py-3 px-4 text-sm text-gray-800"><?php echo $roleId; ?></td>
                </tr>
            </tbody>
        </table>
</body>
</html>