<!DOCTYPE html>
<html lang="en">
<?= view('shared/head') ?>

<body>
  <div class="wrapper">
    <?= view('home/navbar') ?>
    <div class="content-wrapper p-4">

      <div class="row justify-content-center">
        <div class="col-xl-8">
          <?php /** @var \App\Entities\Article $item */ ?>
          <div class="card">
            <div class="card-body">
              <main>
                <h1><?= $item->title ?></h1>
                <div class="text-gray mb-2"><?= $item->updated_at->toDateString() ?></div>
                <?= $item->content ?>
              </main>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>