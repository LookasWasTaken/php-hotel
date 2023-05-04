<?php

$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];

$rating = $_GET["rating"];
$parking = $_GET["parking"];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- EXTERNAL BOOTSTRAP CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/style.css">

    <title>Hotels</title>
</head>

<body>
    <form action="index.php" method="get" class="mx-auto w-50 text-center my-5">
        <h1 class="text-center text-danger">Hotel Tracker Filter</h1>
        <div class="form-check p-0 text-center mb-3 d-flex gap-3 align-items-center">
            <label class="form-check-label m-0" for="parking">Has parking?</label>
            <input class="form-check-input m-0" name="parking" type="checkbox" id="parking">
        </div>
        <div class="mb-3 d-flex gap-3 align-items-center">
            <label for="rating" class="form-label">Rating</label>
            <input type="number" class="form-control inputNumber" min="0" max="5" name="rating" id="rating" aria-describedby="ratingHelper" placeholder="From 0 to 5">
            <div class="align-self-center">
                <button type="submit" class="btn btn-danger">FILTER!</button>
            </div>
        </div>
    </form>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Parking</th>
                <th>Rating</th>
                <th>Distance to center</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($hotels as $hotel) :
                if (($parking === null || $hotel["parking"] === true) && ($rating === null || $hotel["vote"] >= $rating)) : ?>
<!--                     <tr>
                        <?php // foreach ($hotel as $info) : ?>
                            <td class="text-center p-3 border">
                                <?php /* if ($info !== true && $info !== false) {
                                    echo $info;
                                } elseif ($info === true) {
                                    echo "Yes";
                                } else {
                                    echo "No";
                                }  */?>
                            </td>
                        <?php // endforeach; ?>
                    </tr> -->
                    <tr>
                        <td class="text-center p-3 border">
                            <?= $hotel["name"] ?>
                        </td>
                        <td class="text-center p-3 border">
                            <?= $hotel["description"] ?>
                        </td>
                        <td class="text-center p-3 border">
                            <?php if ($hotel["parking"] === true) {
                                echo "Yes";
                            } else {
                                echo "No";
                            } ?>
                        </td>
                        <td class="text-center p-3 border">
                            <?= $hotel["vote"] ?>
                        </td>
                        <td class="text-center p-3 border">
                            <?= $hotel["distance_to_center"] ?>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>