<?php
require __DIR__ . '/vendor/autoload.php';

$faker = Faker\Factory::create('en_ph');

$genres = ['Fiction','Mystery','Science Fiction','Fantasy','Romance','Thriller','Historical','Horror'];

$books = [];
for ($i = 0; $i < 15; $i++) {
    $books[] = [
        'title'            => ucfirst($faker->words(3, true)),
        'author'           => $faker->name,
        'genre'            => $faker->randomElement($genres),
        'publication_year' => $faker->numberBetween(1900, 2024),
        'isbn'             => $faker->numerify(str_repeat('#', 13)),
        'summary'          => $faker->paragraph
    ];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fake Books Data</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <h2 class="text-center mb-4">Fake Books Data</h2>
    <table class="table table-striped table-bordered">
      <thead class="table-dark">
        <tr>
          <th>Title</th>
          <th>Author</th>
          <th>Genre</th>
          <th>Publication Year</th>
          <th>ISBN</th>
          <th>Summary</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($books as $book): ?>
          <tr>
            <td><?= htmlspecialchars($book['title']) ?></td>
            <td><?= htmlspecialchars($book['author']) ?></td>
            <td><?= htmlspecialchars($book['genre']) ?></td>
            <td><?= htmlspecialchars($book['publication_year']) ?></td>
            <td><?= htmlspecialchars($book['isbn']) ?></td>
            <td><?= htmlspecialchars($book['summary']) ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</body>
</html>