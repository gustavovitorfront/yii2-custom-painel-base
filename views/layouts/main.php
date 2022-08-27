<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title>Mybetter ~ <?= Html::encode($this->title) ?></title>
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <?php $this->head() ?>
</head>

<body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>

    <!-- <header>
        <?php
        if (!Yii::$app->user->isGuest) {
            NavBar::begin([
                'brandLabel' => Yii::$app->name,
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav'],
                'items' => [
                    ['label' => 'Home', 'url' => ['/site/index']],
                    Yii::$app->user->isGuest ? (['label' => 'Login', 'url' => ['/site/login']]
                    ) : ('<li>'
                        . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
                        . Html::submitButton(
                            'Logout (' . Yii::$app->user->identity->nome . ')',
                            ['class' => 'btn btn-link logout']
                        )
                        . Html::endForm()
                        . '</li>'
                    )
                ],
            ]);
            NavBar::end();
        }
        ?>
    </header> -->

    <?php
    if (!Yii::$app->user->isGuest) {
    ?>
        <nav class="sidebar">
            <header>
                <div class="image-text">
                    <div class="text logo-text">
                        <span class="name"><?= Yii::$app->user->identity->nome ?></span>
                        <span class="profession"><?= Yii::$app->user->identity->email ?></span>
                    </div>
                </div>

                <i class='bx bx-chevron-right toggle'></i>
            </header>

            <div class="menu-bar">
                <div class="menu">

                    <ul class="menu-links">
                        <li class="linkmenu">
                            <a href="<?php echo Url::toRoute('site/home', true); ?>" title="Dashboard">
                                <i class='bx bx-home-alt icon'></i>
                                <span class="text nav-text">Home</span>
                            </a>
                        </li>

                        <li class="linkmenu">
                            <a href="#" title="Usuários">
                                <i class='bx bx-group icon'></i>
                                <span class="text nav-text">Usuários</span>
                            </a>
                        </li>

                        <li class="linkmenu">
                            <a href="#" title="Grupos de áudios">
                                <i class='bx bx-folder icon'></i>
                                <span class="text nav-text">Grupos de áudios</span>
                            </a>
                        </li>

                        <li class="linkmenu">
                            <a href="#" title="Áudios">
                                <i class='bx bx-music icon'></i>
                                <span class="text nav-text">Áudios</span>
                            </a>
                        </li>

                        <li class="linkmenu">
                            <a href="#" title="Estatísticas Noites">
                                <i class='bx bx-moon icon'></i>
                                <span class="text nav-text">Estatísticas Noites</span>
                            </a>
                        </li>

                        <li class="linkmenu">
                            <a href="#" title="Pagamentos">
                                <i class='bx bx-wallet icon'></i>
                                <span class="text nav-text">Pagamentos</span>
                            </a>
                        </li>

                    </ul>
                </div>

                <div class="bottom-content">
                    <li class="">
                        <a href="<?php echo Url::toRoute('site/logout', true); ?>" title="Deslogar">
                            <i class='bx bx-log-out icon'></i>
                            <span class="text nav-text">Deslogar</span>
                        </a>
                    </li>

                    <li class="mode">
                        <div class="sun-moon">
                            <i class='bx bx-moon icon moon'></i>
                            <i class='bx bx-sun icon sun'></i>
                        </div>
                        <span class="mode-text text">Dark mode</span>

                        <div class="toggle-switch">
                            <span class="switch"></span>
                        </div>
                    </li>

                </div>
            </div>

        </nav>
    <?php } ?>

    <section class="<?= !Yii::$app->user->isGuest ? 'home' : '' ?>">
        <div class="container pt-5">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>

        <footer class="footer mt-auto py-3 text-muted">
            <div class="container">
                <p class="float-left">&copy; Mybetter <?= date('Y') ?></p>
                <!-- <p class="float-right"><?= Yii::powered() ?></p> -->
            </div>
        </footer>
    </section>

    <?php $this->endBody() ?>

    <script>
        const body = document.querySelector('body'),
            sidebar = body.querySelector('nav'),
            toggle = body.querySelector(".toggle"),
            modeSwitch = body.querySelector(".toggle-switch"),
            modeText = body.querySelector(".mode-text");


        toggle.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        })

        modeSwitch.addEventListener("click", () => {
            body.classList.toggle("dark");

            if (body.classList.contains("dark")) {
                modeText.innerText = "Light mode";
            } else {
                modeText.innerText = "Dark mode";

            }
        });
    </script>
</body>

</html>
<?php $this->endPage() ?>