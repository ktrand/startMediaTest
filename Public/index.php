<?php

use App\Controllers\RaceController;

require($_SERVER['DOCUMENT_ROOT'] . '/../vendor/autoload.php');

$controller = new RaceController();
$table = $controller->getTournamentTable();
$mainTable = $table['main'];
$raceSortedTable = $table['best_race_sorted'];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Турнирная таблица</title>
</head>
<style>
    .hide-element{
        display: none !important;
    }
</style>
<body style="margin: 50px 0; display: flex; justify-content: center; align-items: center">
    <div style="width: 1200px ">
        <div class="main-sorted">
            <h2>Турнирная таблица</h2>
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ФИdО</th>
                    <th scope="col">Город</th>
                    <th scope="col">Машина</th>
                    <th scope="col">Заезд 1</th>
                    <th scope="col">Заезд 2</th>
                    <th scope="col">Заезд 3</th>
                    <th scope="col">Заезд 4</th>
                    <th scope="col">Очки</th>
                    <th scope="col">Лучший Заезд</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($mainTable as $i => $data): ?>
                    <tr>
                        <th scope="row"><?=$i + 1?></th>
                        <td><?php echo $data['name'] ?></td>
                        <td><?php echo $data['city'] ?></td>
                        <td><?php echo $data['car'] ?></td>
                        <td><?php echo $data['races'][0] ?></td>
                        <td><?php echo $data['races'][1] ?></td>
                        <td><?php echo $data['races'][2] ?></td>
                        <td><?php echo $data['races'][3] ?></td>
                        <td><?php echo $data['total_points'] ?></td>
                        <td><?php echo $data['best_race'] ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
       <div class="race-sorted">
           <h2>Таблица лучший заездов</h2>
           <table class="table">
               <thead class="thead-dark">
               <tr>
                   <th scope="col">#</th>
                   <th scope="col">ФИdО</th>
                   <th scope="col">Город</th>
                   <th scope="col">Машина</th>
                   <th scope="col">Заезд 1</th>
                   <th scope="col">Заезд 2</th>
                   <th scope="col">Заезд 3</th>
                   <th scope="col">Заезд 4</th>
                   <th scope="col">Очки</th>
                   <th scope="col">Лучший Заезд</th>
               </tr>
               </thead>
               <tbody>
               <?php foreach ($raceSortedTable as $i => $data): ?>
                   <tr>
                       <th scope="row"><?=$i + 1?></th>
                       <td><?php echo $data['name'] ?></td>
                       <td><?php echo $data['city'] ?></td>
                       <td><?php echo $data['car'] ?></td>
                       <td><?php echo $data['races'][0] ?></td>
                       <td><?php echo $data['races'][1] ?></td>
                       <td><?php echo $data['races'][2] ?></td>
                       <td><?php echo $data['races'][3] ?></td>
                       <td><?php echo $data['total_points'] ?></td>
                       <td><?php echo $data['best_race'] ?></td>
                   </tr>
               <?php endforeach; ?>
               </tbody>
           </table>
       </div>
        <button type="button" class="race-sorted race-sorted-btn btn btn-success">Показать турнирную таблицу</button>
        <button type="button" class="main-sorted main-sorted-btn btn btn-success">Показать таблицу лучших заездов</button>
    </div>
</body>
</html>
<script>
    $('.race-sorted').addClass("hide-element");

    $('.race-sorted-btn').on('click', function (){
        $('.race-sorted').addClass("hide-element");
        $('.main-sorted').removeClass('hide-element');

    })

    $('.main-sorted-btn').on('click', function (){
        $('.main-sorted').addClass('hide-element');
        $('.race-sorted').removeClass("hide-element");
    })
</script>

