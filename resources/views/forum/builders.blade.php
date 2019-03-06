@extends('forum.layouts.inner')
@include('forum.modules.header')
@section('content')
  <main class="page-content builders container">
    <section id="app" class="builders__intro">
      <h1 data-title="{{$category->id}}" class="page-title builders__intro-title">{{$category->title}}</h1>
      <b class="page-subtitle builders__intro-subtitle">Нас уже более <span>500</span>
      </b>

      <button class="btn builders__join-btn">Присоединиться</button>

      <autocomplete></autocomplete>
    </section>

    <section class="builders__content">
      <h2 class="visually-hidden">Основной контент на странице</h2>

      <section class="builders__quotes quotes active">
        <h3 class="quotes__title">Братство - это...</h3>

        <ul class="quotes__list">
          @foreach($posts as $post)
            <li class="quotes__item quote">
              <blockquote>
                <p>
                  {{$post->text}}
                </p>
                <cite>
                  {{$post->user->name}}
                </cite>
              </blockquote>
            </li>
          @endforeach
        </ul>
      </section>

      <section class="builders__join join">
        <h3 class="join__title visually-hidden">Форма отправки сообщения</h3>

        <div class="join__form">
          <form class="join-form">
            <p class="join-form__block">
              <label aria-label="Поле ввода имени, обязательно для заполнения">
                <input class="join-form__field" name="name" type="text" placeholder="Имя*:" required>
              </label>
            </p>
            <p class="join-form__block">
              <label aria-label="Поле ввода страны, обязательно для заполнения">
                <input class="join-form__field" name="country" type="text" placeholder="Страна*:" required>
                </input>
              </label>
            </p>
            <p class="join-form__block">
              <label aria-label="Поле ввода емэйла">
                <input class="join-form__field" name="email" type="email" placeholder="E-mail:">
              </label>
            </p>
            <p class="join-form__block">
              <label aria-label="Поле ввода номера телефона">
                <input class="join-form__field" name="phone" type="tel" placeholder="Телефон:">
              </label>
            </p>
            <p class="join-form__block">
              <label aria-label="Поле ввода сообщения, обязательно для заполнения">
                <textarea class="join-form__field" name="text" placeholder="Братство - это*:" required></textarea>
              </label>
            </p>
            <p class="join-form__block">
              <span class="join-form__info">* - поля, обязательные для заполнения.</span>
            </p>
            <p class="join-form__block join-form__block--confirm">
              <label aria-label="Согласие с условиями обработки личных данных">
                <input class="join-form__check" name="confirm" type="checkbox">
                <span>Согласие с условиями обработки личных данных</span>
              </label>
            </p>
            <p class="join-form__block join-form__block--recaptcha">

            </p>
            <p class="join-form__block">
              <button class="btn join-form__submit" type="submit">Отправить</button>
            </p>
          </form>

          <button class="join__form-close" type="button" aria-label="Закрыть форму отправки сообщения"></button>
        </div>
      </section>

    </section>

    <section class="builders__search search">
      <h2 class="visually-hidden">Поиск по странице</h2>

      <div class="search__form">
        <form class="search-form">
          <p class="search-form__block">
            <label aria-label="Искать на странице">
              <input class="search-form__field" name="search" type="search" placeholder="Поиск">
            </label>
            <button class="search-form__submit" aria-label="Поиск">
              <svg class="search-form__submit-img" role="img" xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" viewBox="0 0 30.239 30.239">
                <path d="M20.194,3.46c-4.613-4.613-12.121-4.613-16.734,0c-4.612,4.614-4.612,12.121,0,16.735   c4.108,4.107,10.506,4.547,15.116,1.34c0.097,0.459,0.319,0.897,0.676,1.254l6.718,6.718c0.979,0.977,2.561,0.977,3.535,0   c0.978-0.978,0.978-2.56,0-3.535l-6.718-6.72c-0.355-0.354-0.794-0.577-1.253-0.674C24.743,13.967,24.303,7.57,20.194,3.46z    M18.073,18.074c-3.444,3.444-9.049,3.444-12.492,0c-3.442-3.444-3.442-9.048,0-12.492c3.443-3.443,9.048-3.443,12.492,0   C21.517,9.026,21.517,14.63,18.073,18.074z"></path>
              </svg>
            </button>
          </p>
        </form>
      </div>
    </section>

  </main>

  <div id="quake-info">
    <span></span>
  </div>

  <canvas id="globe-canvas" width="1024" height="1024"></canvas>

@endsection