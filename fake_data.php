<?php
require __DIR__ . '/vendor/autoload.php';

$faker = Faker\Factory::create('en_ph');

$offices = [];
for ($i = 1; $i <= 50; $i++) {
    $offices[] = [
        'id'         => $i,
        'name'       => $faker->company,
        'contactnum' => '+63 ' . $faker->numerify('9## ### ####'),
        'email'      => $faker->companyEmail,
        'address'    => $faker->streetAddress,
        'city'       => $faker->city,
        'country'    => 'Philippines',
        'postal'     => $faker->postcode,
    ];
}

$employees = [];
for ($i = 1; $i <= 200; $i++) {
    $employees[] = [
        'id'        => $i,
        'lastname'  => $faker->lastName,
        'firstname' => $faker->firstName,
        'office_id' => $offices[array_rand($offices)]['id'],
        'address'   => $faker->streetAddress,
    ];
}

$actions = ['Created', 'Updated', 'Deleted', 'Viewed'];

$transactions = [];
for ($i = 1; $i <= 500; $i++) {
    $transactions[] = [
        'id'           => $i,
        'employee_id'  => $employees[array_rand($employees)]['id'],
        'office_id'    => $offices[array_rand($offices)]['id'],
        'datelog'      => $faker->dateTimeBetween('-2 years', 'now')->format('Y-m-d H:i:s'),
        'action'       => $faker->randomElement($actions),
        'remarks'      => $faker->sentence,
        'documentcode' => $faker->bothify('DOC-####-??'),
    ];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Fake Data Generation</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container my-4">
    <h1 class="text-center mb-4">Fake Data Generation</h1>

    <h2>Offices</h2>
    <div class="table-responsive mb-5">
      <table class="table table-bordered table-striped table-hover">
        <thead class="table-dark">
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Contact Number</th>
            <th>Email</th>
            <th>Address</th>
            <th>City</th>
            <th>Country</th>
            <th>Postal</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($offices as $office): ?>
            <tr>
              <td><?= htmlspecialchars($office['id']) ?></td>
              <td><?= htmlspecialchars($office['name']) ?></td>
              <td><?= htmlspecialchars($office['contactnum']) ?></td>
              <td><?= htmlspecialchars($office['email']) ?></td>
              <td><?= htmlspecialchars($office['address']) ?></td>
              <td><?= htmlspecialchars($office['city']) ?></td>
              <td><?= htmlspecialchars($office['country']) ?></td>
              <td><?= htmlspecialchars($office['postal']) ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <h2>Employees</h2>
    <div class="table-responsive mb-5">
      <table class="table table-bordered table-striped table-hover">
        <thead class="table-dark">
          <tr>
            <th>ID</th>
            <th>Last Name</th>
            <th>First Name</th>
            <th>Office ID</th>
            <th>Address</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($employees as $emp): ?>
            <tr>
              <td><?= htmlspecialchars($emp['id']) ?></td>
              <td><?= htmlspecialchars($emp['lastname']) ?></td>
              <td><?= htmlspecialchars($emp['firstname']) ?></td>
              <td><?= htmlspecialchars($emp['office_id']) ?></td>
              <td><?= htmlspecialchars($emp['address']) ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <h2>Transactions</h2>
    <div class="table-responsive mb-5">
      <table class="table table-bordered table-striped table-hover">
        <thead class="table-dark">
          <tr>
            <th>ID</th>
            <th>Employee ID</th>
            <th>Office ID</th>
            <th>Date Log</th>
            <th>Action</th>
            <th>Remarks</th>
            <th>Document Code</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($transactions as $trans): ?>
            <tr>
              <td><?= htmlspecialchars($trans['id']) ?></td>
              <td><?= htmlspecialchars($trans['employee_id']) ?></td>
              <td><?= htmlspecialchars($trans['office_id']) ?></td>
              <td><?= htmlspecialchars($trans['datelog']) ?></td>
              <td><?= htmlspecialchars($trans['action']) ?></td>
              <td><?= htmlspecialchars($trans['remarks']) ?></td>
              <td><?= htmlspecialchars($trans['documentcode']) ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

  </div>
</body>
</html>
