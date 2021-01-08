<!DOCTYPE html>
<html lang="<?= lang('Interface.code') ?>">

<?= view('shared/head') ?>

<body class="text-center" style="background: url(https://images.unsplash.com/photo-1608501078713-8e445a709b39?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1953&q=80) center/cover #7452bf; position: relative">
    <style>
        form {
            border-radius: 10px;
            -webkit-backdrop-filter: blur(10px);
            backdrop-filter: blur(10px);
            box-sizing: content-box;
            width: calc(100% - 30px) !important;
            border: 2px solid whitesmoke;
            background: #0003;
        }

        form a {
            font-weight: bold;
            color: var(--light);
        }

        .signin-group>button {
            width: 100%;
            margin-bottom: .5em;
            background: white;
        }


        .text-shadow {
            text-shadow: 0px 0px 2px black;
        }

        .floating {
            position: absolute;
            left: 10px;
            bottom: 10px;
        }

        .floating a {
            color: #fff6;
            transition: color 0.2s;
        }

        .floating a:hover {
            color: white;
        }

        .separator {
            display: flex;
            align-items: center;
            text-align: center;
            opacity: .8;
        }

        .separator::before,
        .separator::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid white;
        }

        .separator::before {
            margin-right: .5em;
        }

        .separator::after {
            margin-left: .5em;
        }
    </style>
    <div class="justify-content-center container d-flex flex-column" style="min-height: 100vh; max-width: 476px">
        <p class="my-5"><a href="/"><img src="/logo_dark.png" alt="Logo" width="150px"></a></p>
        <form method="POST" name="loginForm" class="container shadow d-flex flex-column justify-content-center pb-1 pt-3 text-white">

            <?= csrf_field() ?>
            <h1 class="mb-4">Become a Member</h1>
            <?= $errors ?>

            <input type="text" name="name" placeholder="Full Name" value="<?= old('name') ?>" class="form-control mb-2">
            <input type="text" name="email" placeholder="Active Email" value="<?= old('email') ?>" class="form-control mb-2">
            <input type="password" name="password" placeholder="Password" class="form-control mb-2" autocomplete="new-password">
            <div class="g-recaptcha mb-2 mx-auto" data-sitekey="<?= $recapthaSite ?>"></div>
            <p><small>By continuing you're agreeing with our service and privacy terms</small></p>
            <input type="submit" value="Register" class="btn bg-indigo btn mb-3">

        </form>
        <div class="d-flex mb-5 text-shadow">
            <a href="/login" class="btn btn-link text-white mr-auto">Sign In Instead</a>
        </div>

        <div class="floating">
            <small>
                <a href="https://unsplash.com/photos/2FiXtdnVhjQ" target="_blank" rel="noopener noreferrer">Background by Jezael Melgoza</a>
            </small>
        </div>
    </div>

</body>

</html>