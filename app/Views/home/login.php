<!DOCTYPE html>
<html lang="en">
<?= view('shared/head') ?>

<body class="text-center" style="background: url(https://images.unsplash.com/photo-1444723121867-7a241cacace9?ixlib=rb-1.2.1&auto=format&fit=crop&w=1953&q=80) center/cover #004494; position: relative">
    <?= view('home/styling') ?>
    <div class="justify-content-center container d-flex flex-column" style="min-height: 100vh; max-width: 476px">
        <p class="mt-5"><a href="/"><img src="/logo_dark.png" alt="Logo" width="150px"></a></p>
        <form method="POST" name="loginForm" class="container shadow d-flex flex-column justify-content-center pb-1 pt-3 text-white">
            <h1 class="mb-4">Enter to Portal</h1>
            <input type="text" name="email" placeholder="Email" class="form-control mb-2">
            <input type="password" name="password" autocomplete="current-password" placeholder="Password" class="form-control mb-2">
            <input type="submit" value="Sign In" class="btn-primary btn btn-block mb-3">
            <div class="separator mb-3">Or</div>
            <a href="/register" class="btn d-flex align-items-center btn-light border-secondary mb-2">
                <span class="mx-auto">Register with Email</span>
            </a>
            <a href="/" class="btn d-flex align-items-center btn-light border-secondary mb-2">
                <span class="mx-auto">Back</span>
            </a>
        </form>
        <div class="floating">
            <small>
                <a href="https://unsplash.com/photos/ukvgqriuOgo" target="_blank" rel="noopener noreferrer">Background by Henning Witzel</a>
            </small>
        </div>
    </div>
</body>

</html>