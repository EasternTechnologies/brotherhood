@extends('frontend.layouts.login')

@section('content')
<section class="login">
  <h1 class="visually-hidden">Страница авторизации пользователя</h1>
  <div class="login__form">
    <h2 class="login__form-title">Войти в систему</h2>

    <form class="login-form">
      <p class="login-form__block">
        <label>
          <span class="login-form__block-title">E-mail</span>
          <input type="email" name="email" required>
        </label>
      </p>
      <p class="login-form__block">
        <label>
          <span class="login-form__block-title">Пароль</span>
          <input type="password" name="password" required>
        </label>
      </p>
      <p class="login-form__block login-form__block--recaptcha">

      </p>
      <p class="login-form__block login-form__block--submit">

      </p>
      <p class="login-form__block login-form__block--forget">
        <a class="login-form__link" href="#">Забыли пароль?</a>
      </p>
    </form>
  </div>
</section>
@endsection
