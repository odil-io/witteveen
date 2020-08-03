<?php //https://github.com/fzaninotto/Faker
// require the Faker autoloader
require_once 'autoload.php';
// alternatively, use another PSR-0 compliant autoloader (like the Symfony2 ClassLoader for instance)

$faker = Faker\Factory::create('nl_NL');

// generate data by accessing properties
?>
<table>
  <tr>
    <td>Afbeelding:</td>
    <td><img src="https://thispersondoesnotexist.com/image" width="100"/></td>
  </tr>
  <tr>
    <td>Naam:</td>
    <td><?= $faker->firstname; ?> <?= $faker->lastname; ?></td>
  </tr>
  <tr>
    <td>E-mail:</td>
    <td><?= $faker->email; ?></td>
  </tr>
  <tr>
    <td>Adres:</td>
    <td><?= $faker->streetName;?> <?= $faker->buildingNumber; ?>, <?= $faker->postcode; ?> <?= $faker->city; ?></td>
  </tr>
  <tr>
    <td>Telefoon:</td>
    <td><?= $faker->phoneNumber; ?></td>
  </tr>
  <tr>
    <td>Bedrijf:</td>
    <td><?= $faker->company; ?></td>
  </tr>
  <tr>
    <td>Functie:</td>
    <td><?= $faker->jobTitle; ?></td>
  </tr>
  <tr>
    <td>Laatste Tweet:</td>
    <td><?= $faker->realText($maxNbChars = 150); ?></td>
  </tr>
</table>
