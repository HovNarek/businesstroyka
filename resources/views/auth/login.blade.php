<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Авторизация</title>
    <link rel="stylesheet" href="{{ asset('front/login/css/style.min.css') }}" />
</head>
<body>
<!-- HEADER -->
<header class="header">
    <div class="container">
        <div class="header__inner">
            <a class="header__logo">
                <img src="{{ asset('front/login/icons/logo.png') }}" alt="logo" />
            </a>
        </div>
    </div>
</header>

<!-- Authorization -->
<section class="authorization">
    <div class="container">
        <h1 class="authorization__title">Авторизация</h1>
        <div class="login-box">
            <form class="login-form" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="email">
                    <label class="email-label">Электронная почта или Логин:</label>
                    <input class="email-input" type="text" name="email_or_login" value="{{ old('email_or_login') }}" required />
                </div>

                <div class="password">
                    <label class="password-label">Пароль:</label>
                    <input type="password" class="password-input" name="password" required />
                </div>

                <div class="remember-me">
                    <input type="checkbox" class="remember-input" name="remember" {{ old('remember') ? 'checked' : '' }} />
                    <label class="remember-label"> Запомнить меня</label>
                </div>
                <button class="login-btn">Войти в личный кабинет</button>
            </form>
            <div class="login-or">
                <p class="login-or_link">или продолжить через:</p>
                <div class="login-social">
                    <a href="{{ route('login.vk') }}" class="vk">
                        <img src="{{ asset('front/login/icons/vk.svg') }}" alt="" />
                    </a>
                    <a href="{{ route('login.ok') }}" class="ok">
                        <img src="{{ asset('front/login/icons/ok.svg') }}" alt="" />
                    </a>
                    <a href="{{ route('login.facebook') }}" class="fb">
                        <img src="{{ asset('front/login/icons/fb.svg') }}" alt="" />
                    </a>
                    <a href="{{ route('login.google') }}" class="google">
                        <img src="{{ asset('front/login/icons/google.svg') }}" alt="" />
                    </a>
                </div>
                <div class="login-bottom">
                    <a href="{{ route('register') }}" class="registr">Зарегистрироваться</a>
                    <a href="{{ route('password.request') }}" class="forgot"
                    >забыли пароль ?</a
                    >
                </div>
            </div>
        </div>
    </div>
</section>
<!-- FOOTER -->
<footer class="footer">
    <div class="footer__inner">
        <div class="footer-item">
            <p class="footer-item__title">Зарегистрироваться</p>
            <ul class="footer-list">
                <li class="footer-list__link"><a href="#">Забыли пароль?</a></li>
            </ul>
        </div>
        <div class="footer-item">
            <p class="footer-item__title">О проекте</p>
            <ul class="footer-list">
                <li class="footer-list__link">
                    <a href="#">Для кого этот сайт</a>
                </li>
                <li class="footer-list__link">
                    <a href="#">Сообщить об ошибке</a>
                </li>
                <li class="footer-list__link"><a href="#">Контакты</a></li>
            </ul>
        </div>
        <div class="footer-item">
            <p class="footer-item__title">Заказы</p>
            <ul class="footer-list">
                <li class="footer-list__link"><a href="#">Разместить заказ</a></li>
            </ul>
        </div>
        <div class="footer-item">
            <p class="footer-item__title">Сервисы</p>
            <ul class="footer-list">
                <li class="footer-list__link"><a href="#">Для заказчиков</a></li>
                <li class="footer-list__link"><a href="#">Для исполнителей</a></li>
                <li class="footer-list__link"><a href="#">Способы оплаты</a></li>
                <li class="footer-list__link"><a href="#">Реклама</a></li>
            </ul>
        </div>
    </div>
</footer>
<script src="{{ asset('front/login/js/jquery.min.js') }}"></script>
<script src="{{ asset('front/login/js/slick.min.js') }}"></script>
<script src="{{ asset('front/login/js/script.js') }}"></script>
</body>
</html>

<!-- <ul class="top__region">
  <li><a href="#" class="other__region">Другой регион</a></li>
  <li><a href="#" class="this__region">Ленинградская область</a></li>
</ul> -->
