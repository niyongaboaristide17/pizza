<?php

session_start();

if (!$_SESSION['name']) {
    # code...
    header('Location: sandbox.php');
}

include('config/db_connect.php');

if (isset($_POST['delete'])) {
    $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

    $sql = "DELETE FROM pizzas WHERE id=$id_to_delete";

    if (mysqli_query($conn, $sql)) {
        # code...
        header('Location: index.php');
    } else {
        echo 'query error: ' . mysqli_error($conn);
    }
}

//check GET request id param
if (isset($_GET['id'])) {
    # code...
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $sql = "SELECT * FROM pizzas WHERE id = $id";

    //GET the query result
    $result = mysqli_query($conn, $sql);

    // fetch result in array format
    $pizza = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    mysqli_close($conn);

    // print_r($pizza);

}
?>

<!DOCTYPE html>
<html lang="en">
<?php include('templates/header.php') ?>

<h2>DETAILS</h2>
<div class="container center">
    <?php if ($pizza) : ?>
        <h4><?php echo htmlspecialchars($pizza['title']) ?></h4>
        <p>Created By: <?php echo htmlspecialchars($pizza['email']) ?></p>
        <p><?php echo htmlspecialchars($pizza['created_at']) ?></p>
        <h5>Ingredients:</h5>
        <p><?php echo htmlspecialchars($pizza['ingredients']) ?></p>
        <!-- DETETE PIZZA -->
        <form action="details.php" method="POST">
            <input type="hidden" name="id_to_delete" value="<?php echo $pizza['id'] ?>">
            <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
        </form>

    <?php else : ?>
        <h5>No such PIZZA exist</h5>
    <?php endif ?>

</div>
<?php include('templates/footer.php') ?>

</html>