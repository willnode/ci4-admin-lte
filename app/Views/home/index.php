<!DOCTYPE html>
<html lang="en">
<?= view('shared/head') ?>

<body>
  <div class="wrapper">
    <?= view('home/navbar') ?>
    <div class="content-wrapper p-4 text-navy">
      <div class="card my-3">
        <div class="row gutter-0">
          <div class="col-lg-4 p-4 d-flex flex-column justify-content-center">
            <h2>CodeIgniter 4 - Admin LTE 3 Template</h2>
            <p>With many scriptlets to boost your web development</p>
            <div><a href="/login/" class="btn btn-primary">Sign In Here</a></div>
          </div>
          <div class="col-lg-8 d-none d-lg-block">
            <div style="background: url(https://images.unsplash.com/photo-1591686224641-2e07b13c0b51?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1834&q=80) center/cover;
        min-height: 400px;"></div>
          </div>
        </div>
      </div>
      <div class="row">
        <?php foreach (['news', 'info'] as $cat) : ?>
          <div class="col-md-6">
            <div class="card">
              <div class="card-body">
                <h3><?= ucfirst($cat) ?></h3>
                <?php foreach ($$cat as $item) : ?>
                  <a href="/article/<?= $item->id ?>" class="btn btn-lg btn-link text-left"><?= $item->title ?></a>
                  <div class="text-gray ml-4"><?= $item->updated_at->toDateString() ?></div>
                  <hr>
                <?php endforeach ?>
                <div class="mt-3"><a href="/category/<?= $cat ?>/" class="btn btn-primary">More <?= ucfirst($cat) ?></a></div>
              </div>
            </div>
          </div>
        <?php endforeach ?>
      </div>
      <div class="card mb-3">
        <div class="card-body">
          <h2>Template Colors</h2>
          <p>Admin LTE provides many colors to get your website theme looks great</p>
          <div class="d-flex flex-wrap mb-3">
            <?php foreach ([
              'blue', 'indigo', 'purple', 'pink', 'red', 'orange', 'yellow', 'navy', 'green',
              'teal', 'cyan', 'white', 'gray', 'gray-dark'
            ] as $color) : ?>
              <div class="m-2"><button class="btn bg-<?= $color ?>"><?= ucfirst($color) ?></button></div>
            <?php endforeach ?>
          </div>
          <p>Applied color in this theme (you can customize this in public/style.css)</p>
          <div class="d-flex flex-wrap">
            <?php foreach ([
              'primary', 'secondary', 'success', 'info',
              'warning', 'danger', 'light', 'dark'
            ] as $color) : ?>
              <div class="m-2"><button class="btn bg-<?= $color ?>"><?= ucfirst($color) ?></button></div>
            <?php endforeach ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>