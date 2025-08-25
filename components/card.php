<div class="card">
    <h2><center><?=$title?></center></h2>
    <p><?=$description?></p>
    <?php
        if(isset($id)) {
             echo "<div>
            <a href='update.php?id=$id&title=$title&description=$description'>update</a>
            <a href='server/deleteArticle.php?id=$id'>delete</a>
        </div>";
        }
    ?>
</div>