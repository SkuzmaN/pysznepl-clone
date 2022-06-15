<?php 
include('utils/db.php');
include('layout/header.php'); 

$searchParam = isset($_POST['name'])?trim($_POST['name']): '';
$restaurantId = isset($_GET['restaurant_id'])?intval($_GET['restaurant_id']): 0;
?>
<main>
<div class="container-lg">
    <h1>Posiłki</h1>
    <hr/>
    <form class="row g-3" method="POST">
  <div class="col-auto">
    <label for="name" class="visually-hidden">Nazwa posiłku</label>
    <input class="form-control" id="name" value="<?php echo $searchParam ?>" name="name" placeholder="Nazwa posiłku">
  </div>
  <div class="col-auto">
    <button type="submit" class="btn btn-primary mb-3">Szukaj</button>
  </div>
</form>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nazwa</th>
      <th scope="col">Opis</th>
      <th scope="col">Cena</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  <?php
  $sql = "SELECT * FROM meals";
  if($searchParam){
    $sql.=" WHERE name LIKE '$searchParam%'";
    if($restaurantId){
        $sql.="AND restaurants_id=$restaurantId";
    }
  } else if($restaurantId){
    $sql.=" WHERE restaurants_id=$restaurantId";
  }
            $qrows = $dbConnection->query($sql);
            while ($row = $qrows->fetch_assoc()) { 
                $id = $row['id'];
                $name = $row['name'];
                $description = $row['description'];
                $price = $row['price']
                ?>
                <tr>
                    <td><?php echo $id ?></td>
                    <td><?php echo $name ?> </td>
                    <td><?php echo $description ?> </td>
                    <td><?php echo $price ?> </td>
                    <td><a href="#">Zamów (brak implementacji)</a></td>
            </tr>
            <?php } ?>
</tbody>
</table>
</div>
</main>

<?php
include('layout/footer.php');
?>