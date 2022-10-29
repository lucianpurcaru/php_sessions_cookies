<?php require 'inc/head.php';
require 'inc/data/products.php';
if (isset($_SESSION["name"])) {

    # + Quantité
    if (isset($_GET['add'])) {
        $id = $_GET['add'];
        $_SESSION['items'][$id]['Quantity'] += 1;
    }

    # - Quantité
    if (isset($_GET['min'])) {
        $id = $_GET['min'];
        if ($_SESSION['items'][$id]['Quantity'] > 1) {
            $_SESSION['items'][$id]['Quantity'] -= 1;
        } else {
            unset($_SESSION['items'][$id]);
        }
    }

    # Supprimer l'article
    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        unset($_SESSION['items'][$id]);
    }
?>
    <section class="cookies container-fluid">
        <div class="row">
            <?php foreach ($_SESSION['items'] as $id => $product) { ?>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <figure class="thumbnail text-center">
                        <img src="assets/img/product-<?= $product['ID']; ?>.jpg" alt="<?= $product['Name']; ?>" class="img-responsive">
                        <figcaption class="caption">
                            <h3><?= $product['Name']; ?></h3>
                            <p><?= $product['Desc']; ?></p>
                            <p>Quantité : <strong><?= $product['Quantity']; ?></strong> </p> <a href="?add=<?= $product['ID']; ?>" class="btn btn-primary">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></button>
                            </a>
                            <a href="?min=<?= $product['ID']; ?>" class="btn btn-primary">
                                <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                            </a>
                            <button type="button" class="btn btn-danger"><a href="?delete=<?= $product['ID']; ?>" style="color:white;">Supprimer l'article</a></button>
                        </figcaption>
                    </figure>

                </div>


            <?php
            } ?>
        </div>

    </section>
<?php
} else {
    header('Location:login.php');
}
require 'inc/foot.php'; ?>