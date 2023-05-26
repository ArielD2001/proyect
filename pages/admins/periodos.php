<?php 
    if(isset($_GET['periodos'])){
?>

<?php
    }else{
        ?>
<div class="row">
    <div class="co-12 d-flex justify-content-end">
        <button class="btn btn-success">
            <i class="mdi mdi-plus"></i> Crear
        </button>
    </div>
    <div class="col-12">
        <?php include('elements/periodostable.php'); ?>
    </div>
</div>
<?php
    }
?>