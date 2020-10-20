<?php
//MySQLi or PDO
//connect to database
session_start();

if (!$_SESSION['name']) {
    # code...
    header('Location: sandbox.php');
}

include('config/db_connect.php');

$sql = 'SELECT title, ingredients, id FROM pizzas ORDER BY created_at';

$result = mysqli_query($conn, $sql);

$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);
mysqli_close($conn);

//print_r (explode(',',$pizzas[0]['ingredients']));



?>
<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php') ?>
<div class="container">
    <div class="row">
        <?php foreach ($pizzas as $pizza): ?>
            <div class="col s4 md3">
                <div class="card z-depth-0">
                <img src="img/pizza.svg" class="pizza">
                    <div class="car-content center">
                        <h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
                        <div>
                            <!-- <?php echo htmlspecialchars($pizza['ingredients']); ?> -->
                            <ul>
                                <?php foreach (explode(',', $pizza['ingredients']) as $ingredient): ?>
                                    <li><?php echo htmlspecialchars($ingredient) ?></li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    </div>
                    <div class="card-action right-align">
                        <a href="details.php?id=<?php echo $pizza['id'] ?>" class="brand-text">more infos</a>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
        <?php if(count($pizzas) >=2): ?>
            <p>There are 2 or more pizzas</p>
        <?php else : ?>
            <p>There are less than 2 pizzas</p>
        <?php endif; ?>
    </div>
</div>
<?php include('templates/footer.php') ?>

</html>