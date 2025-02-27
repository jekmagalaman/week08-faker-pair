<?php
require __DIR__ . '/vendor/autoload.php';

$faker = Faker\Factory::create();
$users = [];

for ($i = 0; $i < 10; $i++) {
    $fullName = $faker->name;
    $email = $faker->email;

    $usernameParts = explode('@', $email);
    $username = strtolower($usernameParts[0]);

    $rawPassword = $faker->password;
    $encryptedPassword = hash('sha256', $rawPassword);

    $accountCreated = $faker->dateTimeBetween('-2 years', 'now')->format('Y-m-d H:i:s');
    
    $users[] = [
        'user_id'         => $faker->uuid,
        'full_name'       => $fullName,
        'email'           => $email,
        'username'        => $username,
        'password'        => $encryptedPassword,
        'account_created' => $accountCreated
    ];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Fake User Accounts</title>
  <!-- Bootstrap CSS CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <h2 class="text-center mb-4">Fake User Accounts</h2>
    <table class="table table-bordered table-striped">
      <thead class="table-dark">
        <tr>
          <th>User ID (UUID)</th>
          <th>Full Name</th>
          <th>Email Address</th>
          <th>Username</th>
          <th>Password (SHA-256)</th>
          <th>Account Created</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($users as $user): ?>
          <tr>
            <td><?= htmlspecialchars($user['user_id']) ?></td>
            <td><?= htmlspecialchars($user['full_name']) ?></td>
            <td><?= htmlspecialchars($user['email']) ?></td>
            <td><?= htmlspecialchars($user['username']) ?></td>
            <td><?= htmlspecialchars($user['password']) ?></td>
            <td><?= htmlspecialchars($user['account_created']) ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</body>
</html>