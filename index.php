<?php
require 'inc/data/products.php';
require 'inc/head.php';

if (isset($_GET['add_to_cart'])) {
    $id = $_GET['add_to_cart'];

    $quantity = $_SESSION['items'][$id]['Quantity'] + 1;
    $_SESSION['items'][$id] = array('ID' => $id, 'Quantity' => $quantity, 'Name' => $catalog[$id]['name'], 'Desc' => $catalog[$id]['description']);
}
?>
<section class="cookies container-fluid">
    <div class="row">
        <?php foreach ($catalog as $id => $cookie) { ?>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <figure class="thumbnail text-center">
                    <img src="assets/img/product-<?= $id; ?>.jpg" alt="<?= $cookie['name']; ?>" class="img-responsive">
                    <figcaption class="caption">
                        <h3><?= $cookie['name']; ?></h3>
                        <p><?= $cookie['description']; ?></p>
                        <a href="?add_to_cart=<?= $id; ?>" class="btn btn-primary">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add to cart
                        </a>
                    </figcaption>
                </figure>
            </div>
        <?php } ?>
    </div>
</section>
<?php require 'inc/foot.php'; ?>