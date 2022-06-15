<?php 
include('utils/db.php');
include('layout/header.php'); 

$searchParam = isset($_POST['name'])?trim($_POST['name']): '';
?>
<main>
<div class="container-lg">
    <h1>Restauracje</h1>
    <hr/>
    <form class="row g-3" method="POST">
  <div class="col-auto">
    <label for="name" class="visually-hidden">Nazwa restauracji</label>
    <input class="form-control" id="name" value="<?php echo $searchParam ?>" name="name" placeholder="Nazwa restauracji">
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
      <th scope="col">Typ</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  <?php
  $sql = "SELECT * FROM restaurants";
  if($searchParam){
    $sql.=" WHERE name LIKE '$searchParam%'";
  }
            $qrows = $dbConnection->query($sql);
            while ($row = $qrows->fetch_assoc()) { 
                $id = $row['id'];
                $name = $row['name'];
                $restaurant_types = $row['restaurant_types'];
                ?>
                <tr>
                    <td><?php echo $id ?></td>
                    <td><?php echo $name ?> </td>
                    <td><?php echo $restaurant_types ?> </td>
                    <td><a href="meals.php?restaurant_id=<?php echo $id ?>">Pokaż menu</a></td>
            </tr>
            <?php } ?>
</tbody>
</table>
</div>
</main>

<?php
include('layout/footer.php');
?>