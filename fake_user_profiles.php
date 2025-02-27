<?php
require __DIR__ . '/vendor/autoload.php';

$faker = Faker\Factory::create('en_ph');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fake Filipino User Profiles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Fake Filipino User Profiles</h2>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                    <th>Birthdate</th>
                    <th>Job Title</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < 5; $i++): ?>
                    <tr>
                        <td><?= $faker->name ?></td>
                        <td><?= $faker->email ?></td>
                        <td>+63 <?= $faker->numerify('9## ### ####') ?></td>
                        <td><?= $faker->address ?></td>
                        <td><?= $faker->date('Y-m-d') ?></td>
                        <td><?= $faker->jobTitle ?></td>
                    </tr>
                <?php endfor ?>
            </tbody>
        </table>
    </div>
</body>
</html>