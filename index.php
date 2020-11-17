<?php 
    // connect DB
    include('config/db_connect.php');

    // write query for all pizzas
    $sql = 'SELECT title, ingredients, id FROM pizzas ORDER BY created_at';

    // make query & get result
    $result = mysqli_query($conn, $sql);

    // fetch the resulting rows as an array
    $pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // free result from memory
    mysqli_free_result($result);

    // close connection
    mysqli_close($conn);

    // explode(',', $pizzas[0]['ingredients']);

?>

<!DOCTYPE html>
<html lang="en">
    <?php include('templates/header.php'); ?>
    <main>
        <h4 class="center grey-text">Pizzas!</h4>
        <div class="container">
            <div class="row">
                <?php foreach($pizzas as $pizza): ?>
                    <div class="col s6 md3">
                        <article class="card z-depth-0">
                            <div class="card-content center">
                                <h6>
                                    <?php echo htmlspecialchars($pizza['title'] );?>
                                </h6>
                                <ul class="card-ingredients">
                                    <?php foreach(explode(',', $pizza['ingredients']) as $ing): ?>
                                        <li><?php echo htmlspecialchars($ing); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                                <div class="card-action right-align">
                                    <a href="#" class="brand-text">more info</a>
                                </div>
                            </div>
                        </article>
                    </div>
                <?php endforeach; ?>

                <?php if(count($pizzas) >=3 ): ?>
                    <p>ther are 3 or more pizzas</p>
                <?php else: ?>
                    <p>there are less than 3 pizzas</p>
                <?php endif; ?>

            </div>
        </div>
    </main>
    <?php include('templates/footer.php'); ?>

    

</html>