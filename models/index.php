<?php
require_once('../templates/header.php');
require_once("post.php")
?>

<div class="container p-4">
    <div class="d-flex justify-content-end p-4">
        <a href="views/create_view.php" class="btn btn-primary">Add Item +</a>
    </div>
    <?php
   // TODO: Get all data from database and display it
   $items = getItems();
   foreach ( $items as $item) :
    ?>
        <div class="row">
            <div class="col-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-around">
                            <h1 class="display-3 text-capitalize"><?= $item['post_ID'] ?></h1>
                            <h1 class="display-3 text-capitalize"><?= $item['description'] ?></h1>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="views/edit_view.php?id= <?php echo $item['id']; ?>" class="btn btn-primary mr-1"><i class="fa fa-pencil"></i></a>
                            <a href="controllers/remove_controller.php?id= <?php echo $item['id']; ?>" class="btn btn-danger"><i class="fa fa-trash">
                            </i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php 
    endforeach;
    ?>
</div>

<?php
require_once('templates/footer.php');
?>