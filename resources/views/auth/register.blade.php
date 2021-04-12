<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registration</title>
    <link rel="stylesheet" href="{{ asset('front/registration-main/css/style.min.css') }}" />
</head>
<body>
<!-- HEADER -->
<header class="header">
    <div class="container">
        <div class="header__inner">
            <a class="header__logo">
                <img src="{{ asset('front/registration-main/icons/logo.png') }}" alt="logo" />
            </a>
        </div>
    </div>
</header>

<!-- Authorization -->
<section class="registration">
    <div class="container">
        <h1 class="registration__title">
            Регистрация <span>(все поля обязательны для заполнения)</span>
        </h1>
        <div class="registration-box">
            <form method="POST" action="{{ route('register') }}" class="registration-form">
                @csrf
                <div class="user__type">
                    <label for="" class="type-label">Тип пользователя:</label>
                    <div class="radio-box">
                        <label
                        ><input
                                type="radio"
                                name="type"
                                class="type-input"
                                value="Заказчик"
                                required
                                @if(old('type') && old('type') == 'Заказчик') checked @endif
                            />Заказчик</label
                        >
                        <label
                        ><input
                                type="radio"
                                name="type"
                                class="type-input"
                                value="Исполнитель"
                                required
                                @if(old('type') && old('type') == 'Исполнитель') checked @endif
                            />Исполнитель</label
                        >
                    </div>
                </div>
                <div class="email">
                    <label class="email-label">Электронная почта:</label>
                    <input type="email" name="email" class="email-input" value="{{ old('email') }}" required />
                </div>
                <div class="password">
                    <label class="password-label">Пароль:</label>
                    <input type="password" class="password-input" name="password" required />
                    <button class="btn-password">
                        <img src="{{ asset('front/registration-main/icons/eye.svg') }}" alt="" />
                    </button>
                </div>
                <div class="phone">
                    <label class="phone-label">Телефон:</label>
                    <input
                        name="phone"
                        placeholder="+7(___) ___-____"
                        required
                        class="phone-input"
                        value="{{ old('phone') }}"
                    />
                </div>
                <div class="gender">
                    <label for="" class="gender-label">Пол:</label>
                    <div class="radio-box">
                        <label
                        ><input
                                type="radio"
                                name="gender"
                                class="gender-input"
                                value="Мужчина"
                                required
                                @if(old('gender') && old('gender') == 'Мужчина') checked @endif
                            />Мужчина
                        </label>
                        <label
                        ><input
                                type="radio"
                                name="gender"
                                class="gender-input"
                                value="Женщина"
                                required
                                @if(old('gender') && old('gender') == 'Женщина') checked @endif
                            />
                            Женщина</label
                        >
                    </div>
                </div>
                <div class="name">
                    <label class="name-label">Имя:</label>
                    <input type="text" class="name-input" name="name" value="{{ old('name') }}" required />
                </div>
                <div class="city">
                    <label class="city-label">Ваш город:</label>
                    <div class="select-box">
                        <a href="#" class="region-select">
                            @if(old('region')) {{ $regions[old('region')] }} @else {{ reset($regions) }} @endif </a>
                        <input type="hidden" name="region"
                               @if(old('region')) value="{{ old('region') }}" @else value="{{ key($regions) }}" @endif
                               required />
                        <div class="region-block">
                            <div class="region__wrapper">
                                <ul class="left__region">
                                @php
                                    $count = 0;
                                    $length = floor(count($regions)/2);
                                @endphp
                                @foreach($regions as $id => $region)
                                        @if($count++ < $length)
                                            <li>
                                                <a class="region__item" href="" data-id="{{ $id }}">
                                                    {{ $region }}</a>
                                            </li>
                                        @else
                                            @break
                                        @endif
                                    @endforeach
                                </ul>
                                <ul class="right__region">
                                @php
                                    $count = 0;
                                @endphp
                                @foreach($regions as $id => $region)
                                        @if($count++ >= $length)
                                            <li>
                                                <a class="region__item" href="" data-id="{{ $id }}">
                                                    {{ $region }}</a>
                                            </li>
                                        @else
                                            @continue
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <a href="#" class="city-select">Все города</a>
                        <input type="hidden" name="city" required />
                        <div class="city-block">
                            <div class="city__wrapper">
                                <ul class="left__city"></ul>
                                <ul class="right__city"></ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="agree">
                    <input type="checkbox" class="agree-input" name="checkbox" required />
                    <label class="agree-label">
                        Я согласен с
                        <a href="#">пользовательским соглашением </a>
                    </label>
                </div>
                <button class="registr-btn">Зарегистрироватся</button>
                <a href="" class="registr__info">Инструкция регистрации</a>
            </form>
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
<script src="{{ asset('front/registration-main/js/jquery.min.js') }}"></script>
<script src="{{ asset('front/registration-main/js/jquery.maskedinput.min.js') }}"></script>
<script src="{{ asset('front/registration-main/js/registration.js') }}"></script>

@include('user.js.js-get-cities')

</body>
</html>
