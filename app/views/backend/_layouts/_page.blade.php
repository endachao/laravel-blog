
<?php
$presenter = new Illuminate\Pagination\BootstrapPresenter($paginator);
?>

共 {{$paginator->getCurrentPage()}}  条记录


<div class="am-fr">

    <ul class="am-pagination">
        <?php echo $presenter->render(); ?>
    </ul>
</div>