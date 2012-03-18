<?php foreach ($publishers as $publisher): ?>

    <h2><?php echo $publisher['PubID'] ?></h2>
    <div id="main">
        <?php echo $publisher['PubName'] ?>
    </div>

<?php endforeach ?>