@extends('frontend.layouts.inner')
  @include('frontend.modules.header') 
@section('content')
<main class="page-content builders">
  <section class="builders__intro">
    <h1 class="page-title">Строители</h1>
    <b class="page-subtitle">Нас уже более  <span>500</span>
    </b>

    <button class="builders__join">Присоединиться</button>
  </section>

  <section class="builders__content">
    <h2 class="visually-hidden">Основной контент на странице</h2>

    <section class="builders__quotes quotes">
      <h3 class="quotes__title">Братство - это...</h3>
      <ul class="quotes__list">
        <li class="quotes__item quote">
          <blockquote>

            <table>
              @foreach($posts as $post)

                <tr>
                  <td>{{$post->id}}</td>
                  <td>{{$post->title}}</td>
                  <td>{{$post->category->title}}</td>
                </tr>
                <cite>
                  <td>{{$post->user->name}}</td>
                </cite>
              @endforeach
            </table>




          </blockquote>
        </li>
      </ul>
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
            <svg class="search-form__submit-img" role="img" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 30.239 30.239">
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