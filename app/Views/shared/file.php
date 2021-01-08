<div class="input-group">
    <?php if ($disabled) : ?>
        <input type="text" value="<?= esc($value) ?>" name="<?= $name ?>" class="form-control" disabled>
    <?php else : ?>
        <input type="file" name="<?= $name ?>" id="<?= $name ?>" class="form-control h-auto">
    <?php endif ?>
    <?php if ($value) : ?>
        <div class="input-group-append">
            <?php if (!$disabled) : ?>
                <button type="button" class="btn btn-danger" onclick="this.form['<?= $name ?>'].parentElement.innerHTML = `<input type='hidden' name='_<?= $name ?>' value='delete'><i class='form-control'>Will be deleted</i>`"><i class="fa fa-trash"></i></button>
            <?php endif ?>
            <a href="<?= '/uploads/' . $path . '/' . $value ?>" download class="btn btn-success"><i class="fa fa-download"></i></a>
        </div>
    <?php endif ?>
</div>