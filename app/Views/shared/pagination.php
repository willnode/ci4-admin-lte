<div class="pagination">
    <?php if (($_SERVER['pagination']['max'] ?? 0) > 1) : ?>
        <?php
            $p = $_GET;
            unset($p['page']);
            $p = '?'.http_build_query($p).'&page=';
        ?>
        <?php if ($_SERVER['pagination']['page'] > 2) : ?>
            <div class="page-item"><a class="page-link" href="<?= $p ?>1">1</a></div>
            <?php if ($_SERVER['pagination']['page'] > 3) : ?>
                <div class="page-item">...</div>
            <?php endif ?>
        <?php endif ?>
        <?php if ($_SERVER['pagination']['page'] > 1) : ?>
            <div class="page-item"><a class="page-link" href="<?= $p . ($_SERVER['pagination']['page'] - 1) ?>">
                    <?= $_SERVER['pagination']['page'] - 1 ?>
                </a></div>
        <?php endif ?>

        <div class="page-item active"><a class="page-link" href="#">
                <?= $_SERVER['pagination']['page'] ?>
            </a></div>

        <?php if ($_SERVER['pagination']['page'] <= $_SERVER['pagination']['max'] - 1) : ?>
            <div class="page-item"><a class="page-link" href="<?= $p . ($_SERVER['pagination']['page'] + 1) ?>">
                    <?= $_SERVER['pagination']['page'] + 1 ?>
                </a></div>
        <?php endif ?>
        <?php if ($_SERVER['pagination']['page'] <= $_SERVER['pagination']['max'] - 2) : ?>
            <?php if ($_SERVER['pagination']['page'] <= $_SERVER['pagination']['max'] - 3) : ?>
                <div class="page-item">...</div>
            <?php endif ?>
            <div class="page-item"><a class="page-link" href="<?= $p . ($_SERVER['pagination']['max']) ?>">
                    <?= $_SERVER['pagination']['max'] ?>
                </a></div>
        <?php endif ?>

    <?php endif ?>
</div>