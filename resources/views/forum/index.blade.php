<!DOCTYPE html>
<html lang="ru">

<head>
    <title>Братство</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ###BeginUncompressedCSS### -->
    <link href="{{ asset('css/static/desktop.css') }}" rel="stylesheet">
    <link href="{{ asset('css/static/mobile.css') }}" rel="stylesheet">
    <!-- ###EndUncompressedCSS### -->

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

    <!-- ###BeginUncompressedJS### -->

    <script src="{{ asset('js/static/Site.js') }}"></script>
    <script src="{{ asset('js/static/FormManager.js') }}"></script>
    <script src="{{ asset('js/static/DataManager.js') }}"></script>
    <script src="{{ asset('js/static/ModelManager.js') }}"></script>
    <script src="{{ asset('js/static/ScrollManager.js') }}"></script>
    <script src="{{ asset('js/static/CanvasManager.js') }}"></script>

    <script src="{{ asset('js/static/globe/third-party/gl-matrix.js') }}"></script>
    <script src="{{ asset('js/static/globe/rendering/Camera.js') }}"></script>
    <script src="{{ asset('js/static/globe/rendering/Program.js') }}"></script>
    <script src="{{ asset('js/static/globe/rendering/ProgramManager.js') }}"></script>
    <script src="{{ asset('js/static/globe/rendering/TextureManager.js') }}"></script>
    <script src="{{ asset('js/static/globe/drawables/PointGlobeDrawable.js') }}"></script>
    <script src="{{ asset('js/static/globe/drawables/NebulaDrawable.js') }}"></script>
    <script src="{{ asset('js/static/globe/drawables/BokehDrawable.js') }}"></script>
    <script src="{{ asset('js/static/globe/drawables/BackgroundDrawable.js') }}"></script>
    <script src="{{ asset('js/static/globe/drawables/RingDrawable.js') }}"></script>
    <script src="{{ asset('js/static/globe/drawables/EarthquakeDrawable.js') }}"></script>
    <script src="{{ asset('js/static/globe/drawables/BigQuakeDrawable.js') }}"></script>
    <script src="{{ asset('js/static/globe/geometry/Model.js') }}"></script>
    <script src="{{ asset('js/static/globe/utils/LatLng.js') }}"></script>
    <script src="{{ asset('js/static/globe/utils/ProjectionUtil.js') }}"></script>

    <script src="{{ asset('js/static/third-party/brandkit/Animation.js') }}"></script>
    <script src="{{ asset('js/static/third-party/brandkit/Ease.js') }}"></script>
    <script src="{{ asset('js/static/third-party/brandkit/Ajax.js') }}"></script>
    <script src="{{ asset('js/static/third-party/brandkit/Signal.js') }}"></script>
    <script src="{{ asset('js/static/third-party/greensock/SplitText.js') }}"></script>
    <script src="{{ asset('js/static/third-party/greensock/TweenMax.js') }}"></script>
    <!-- ###EndUncompressedJS### -->
</head>

<body>
<div id="quake-info">
    <div><span></span></div>
</div>

<div class="header">
    <div class="logo-mark">
        <a href="/index">
            <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="51px" height="51px" viewBox="0 0 1000 1000">
          <path class="fil0" d="M500 916c-114.872,0 -218.872,-46.564 -294.154,-121.846 -75.282,-75.282 -121.846,-179.282 -121.846,-294.154 0,-114.873 46.564,-218.872 121.846,-294.154 75.282,-75.283 179.282,-121.846 294.154,-121.846 114.872,0 218.872,46.564 294.154,121.846 75.282,75.282 121.846,179.282 121.846,294.154 0,114.872 -46.564,218.872 -121.846,294.154 -75.282,75.282 -179.282,121.846 -294.154,121.846zm-258.93 -157.07c66.263,66.264 157.81,107.249 258.93,107.249 101.12,0 192.667,-40.985 258.93,-107.249 66.264,-66.263 107.249,-157.81 107.249,-258.93 0,-101.121 -40.985,-192.667 -107.249,-258.93 -66.263,-66.264 -157.81,-107.249 -258.93,-107.249 -101.12,0 -192.667,40.985 -258.93,107.249 -66.264,66.263 -107.249,157.809 -107.249,258.93 0,101.12 40.985,192.667 107.249,258.93z"></path>

                <circle class="fil1" cx="500" cy="354.529" r="105.057"></circle>
                <circle class="fil1" cx="629.846" cy="583.769" r="105.057"></circle>
                <circle class="fil1" cx="370.154" cy="583.769" r="105.057"></circle>
        </svg>
        </a>
    </div>

    <div class="logo-text">
        <a href="/index">
            <h1>Братство</h1>
        </a>
    </div>

    <div class="social">
        <ul>
            <li class="instagram icon">
                <a href="#" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16">
                        <path d="M204.837,113a4.837,4.837,0,1,1-9.584-.93H192v6.43a2.5,2.5,0,0,0,2.5,2.5h11a2.5,2.5,0,0,0,2.5-2.5v-6.43h-3.253A4.832,4.832,0,0,1,204.837,113Zm0.663-8h-11a2.5,2.5,0,0,0-2.5,2.5v2.709h4.05a4.835,4.835,0,0,1,7.9,0H208V107.5A2.5,2.5,0,0,0,205.5,105Zm1.222,3.088a0.448,0.448,0,0,1-.446.447h-1.34a0.449,0.449,0,0,1-.447-0.447v-1.339a0.449,0.449,0,0,1,.447-0.447h1.34a0.448,0.448,0,0,1,.446.447v1.339ZM202.977,113A2.977,2.977,0,1,0,200,115.977,2.977,2.977,0,0,0,202.977,113Z" transform="translate(-192 -105)"></path>
                    </svg>
                </a>
            </li>
            <li class="facebook icon">
                <a href="#" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16">
                        <path d="M1738,68.012h-12a2.006,2.006,0,0,0-2,2V82a2.005,2.005,0,0,0,2,2h6.07V78.269h-1.92v-2.5h1.92V74.52a3.307,3.307,0,0,1,3.24-3.44h1.77V73.9h-1.58a0.487,0.487,0,0,0-.54.565v1.306h2.12v2.5h-2.12V84H1738a2.005,2.005,0,0,0,2-2V70.011A2.006,2.006,0,0,0,1738,68.012Z" transform="translate(-1724 -68)"></path>
                    </svg>
                </a>
            </li>
            <li class="vkontakte icon">
                <a href="#" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 14.171 14.171">
                        <path d="M13.268,0H0.905C0.405,0,0,0.405,0,0.904v12.363c0,0.499,0.405,0.904,0.905,0.904h12.362
              c0.499,0,0.904-0.405,0.904-0.904V0.904C14.172,0.404,13.767,0,13.268,0z M11.755,8.635c0.259,0.264,0.821,0.707,0.719,1.158 c-0.094,0.414-0.712,0.263-1.312,0.287c-0.685,0.029-1.091,0.044-1.503-0.287C9.465,9.636,9.351,9.45,9.165,9.242 C8.996,9.054,8.783,8.717,8.493,8.73C7.972,8.756,8.135,9.482,7.95,9.977c-2.896,0.456-4.059-1.333-5.085-3.069 C2.368,6.067,1.65,4.261,1.65,4.261l2.048-0.007c0,0,0.657,1.195,0.831,1.503c0.148,0.262,0.311,0.47,0.479,0.704 c0.141,0.194,0.364,0.574,0.608,0.543c0.397-0.051,0.469-1.591,0.223-2.107C5.741,4.688,5.506,4.615,5.263,4.544
              C5.345,4.026,7.56,3.918,7.918,4.32c0.52,0.584-0.36,2.21,0.352,2.684c1-0.524,1.854-2.718,1.854-2.718l2.398,0.015 c0,0-0.375,1.186-0.768,1.712c-0.229,0.308-0.989,0.994-0.959,1.503C10.819,7.919,11.437,8.311,11.755,8.635z"></path>
                    </svg>
                </a>
            </li>
        </ul>
    </div>
</div>

<canvas id="globe-canvas" width="1024" height="1024"></canvas>

<div id="scrolling-content">
    <div id="scrolling-area">

        <div class="copy-section topic-start">
            <div class="copy-content">
                <h1 class="animated-text">Начало</h1>
                <ul class="animated-body content-list">
                    <li class="content-item">
                        <a class="content-link content-link--block" href="#">Слово</a>
                        <div class="content-block">
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ab atque dignissimos, blanditiis, ipsum mollitia quasi quidem provident hic quod, necessitatibus sed laudantium aut fuga numquam.</p>
                        </div>
                    </li>
                    <li class="content-item">
                        <a class="content-link content-link--block" href="#">Миссия</a>
                        <div class="content-block">
                            <p>«В часы великого земного ожесточения, вернуть миру понятие, которое венчает человеческие отношения»</p>
                        </div>
                    </li>
                    <li class="content-item">
                        <a class="content-link content-link--block" href="#">Цель</a>
                        <div class="content-block">
                            <p>«Зажечь сердца народов красотою значения Братства, объединив прогрессивные силы и умы человечества в нерушимый союз доверия»</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="copy-section topic-guardian">
            <div class="copy-content">
                <h1 class="animated-text">Хранители</h1>
                <ul class="animated-body">
                    <li class="content-item content-list">
                        <a class="content-link content-link--block" href="#">Нельсон Мандела</a>
                        <div class="content-block">
                            <div class="content-img">
                                <img src="{{ asset('svg/img/content/Mandela.jpg') }}" alt="Нельсон Мандела">
                            </div>
                            <p>
                                «Я обращаюсь к тем, кто участвует в сражении <span>братьев</span> с <span>братьями</span>. Возьмите ваши ружья, ваши ножи и копья, и бросьте их в море. Давайте вместе работать, чтобы построить мирное и здоровое общество нашей мечты».
                            </p>
                        </div>
                    </li>
                    <li class="content-item">
                        <a class="content-link content-link--block" href="#">Махатма Ганди</a>
                        <div class="content-block">
                            <div class="content-img">
                                <img src="{{ asset('svg/img/content/Gandhi.jpg') }}" alt="Махатма Ганди">
                            </div>
                            <p>
                                «Да, история в самом деле свидетельствует о бесконечных войнах, но мы стремимся создать новую историю человечества, теперь уже без войн и насилия, и я говорю об этом как выразитель чаяний моего народа. Человеку суждено заменить закон джунглей законом осознанного <span>Братства</span>».
                            </p>
                        </div>
                    </li>
                    <li class="content-item">
                        <a class="content-link content-link--block" href="#">Николай Рерих</a>
                        <div class="content-block">
                            <div class="content-img">
                                <img src="{{ asset('svg/img/content/Roerich.jpg') }}" alt="Николай Рерих">
                            </div>
                            <p>
                                «Для невежд единение, сердечность, дружба — всё это абстракции, но познающие понимают всё непреложное и неотложное значение этих великих понятий. За ними высятся и любовь, и <span>Братство</span>».
                            </p>
                        </div>
                    </li>
                    <li class="content-item">
                        <a class="content-link content-link--block" href="#">Константин Циолковский</a>
                        <div class="content-block">
                            <div class="content-img">
                                <img src="{{ asset('svg/img/content/Tsiolkovsky.jpg') }}" alt="Константин Циолковский">
                            </div>
                            <p>
                                «Каждый человек должен быть проникнут высшими идеями, ведущими всех людей к счастью и совершенству. Таковы мысли о единении и <span>братстве</span> всех народов».
                            </p>
                        </div>
                    </li>
                    <li class="content-item">
                        <a class="content-link content-link--block" href="#">Евгений Евтушенко</a>
                        <div class="content-block">
                            <div class="content-img">
                                <img src="{{ asset('svg/img/content/Evtushenko.jpg') }}" alt="Евгений Евтушенко">
                            </div>
                            <p>
                                «…..самая великая идея на земле. Идея <span>братства</span>. Выше нет».
                            </p>
                        </div>
                    </li>
                    <li class="content-item">
                        <a class="content-link content-link--block" href="#">Лев Толстой</a>
                        <div class="content-block">
                            <div class="content-img">
                                <img src="{{ asset('svg/img/content/Tolstoy.jpg') }}" alt="Лев Толстой">
                            </div>
                            <p>
                                «Придет время и приходит уже, когда христианские основы жизни - равенства, <span>братства</span> людей, общности имуществ, непротивления злу насилием - сделаются столь же естественными и простыми, какими теперь нам кажутся основы жизни семейной, общественной, государственной».
                            </p>
                        </div>
                    </li>
                    <li class="content-item">
                        <a class="content-link content-link--block" href="#">Мартин Лютер Кинг</a>
                        <div class="content-block">
                            <div class="content-img">
                                <img src="{{ asset('svg/img/content/King.jpg') }}" alt="Мартин Лютер Кинг">
                            </div>
                            <p>
                                «Мы научились летать как птицы и плавать как рыбы, но нам все еще надо учиться просто ходить по земле как <span>братья</span>».
                            </p>
                        </div>
                    </li>
                    <li class="content-item">
                        <a class="content-link content-link--block" href="#">Фёдор Достоевский</a>
                        <div class="content-block">
                            <div class="content-img">
                                <img src="{{ asset('svg/img/content/Dostoevsky.jpg') }}" alt="Фёдор Достоевский">
                            </div>
                            <p>
                                «<span>Братство</span> различных национальностей есть великая, прекрасная, самая русская вещь, то есть самая русская цель. Это впоследствии все поймут, что это одна из главных русских целей».
                            </p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="copy-section topic-projects">
            <div class="copy-content">
                <h1 class="animated-text">Проекты</h1>
                <ul class="animated-body content-list">
                    <li class="content-item">
                        <a class="content-link" href="#">Строители</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="copy-section topic-ways">
            <div class="copy-content">
                <h1 class="animated-text">Пути</h1>
                <ul class="animated-body content-list">
                    <li class="content-item">
                        <a class="content-link" href="#">Искусства</a>
                    </li>
                    <li class="content-item">
                        <a class="content-link" href="#">Науки</a>
                    </li>
                    <li class="content-item">
                        <a class="content-link" href="#">Веры</a>
                    </li>
                    <li class="content-item">
                        <a class="content-link" href="#">Народной мудрости</a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- <div class="copy-section topic-quote">
        <div class="copy-content">
            <h1 class="animated-text">Братство<span class="emdash"><span></span>Мартин Лютер Кинг</span></h1>
            <p class="animated-body">«Мы научились летать как птицы и плавать как рыбы, но нам все еще надо
              учиться просто ходить по земле как братья».</p>
          </div>
        </div> -->

        <div class="copy-section topic-form">
            <div class="copy-content">
                <h1 class="animated-text"><span>&ldquo;</span>Братство<span>&rdquo;</span><span class="emdash"><span></span>Международное общество</span></h1>
                <div class="contacts">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore dolor iste quod assumenda.</p>
                    <p>Totam, nesciunt sint. Atque natus recusandae autem ab illo. Laudantium autem molestiae dignissimos.</p>
                    <p>Repellendus minima consectetur odit nemo quo voluptatum ipsam quisquam molestiae, natus quidem, sapiente tempore!</p>
                </div>
                <div class="animated-body" id="form-section">

                    <form id="request-form" action method="POST" target="no-target">
                        @csrf
                        <div class="input-block" id="block-one">
                            <label for="NAME">ФИО <span>*</span></label>
                            <input id="NAME" name="NAME" type="text" value required>
                        </div>
                        <div class="input-block" id="block-two">
                            <label for="COMPANY">Организация</label>
                            <input id="COMPANY" name="COMPANY" type="text" value>
                        </div>
                        <div class="input-block" id="block-three">
                            <label for="COUNTRY">Страна <span>*</span></label>
                            <input id="COUNTRY" name="COUNTRY" type="text" value required>
                        </div>
                        <div class="input-block" id="block-four">
                            <label for="EMAIL">Email/Tel.</label>
                            <input id="EMAIL" name="EMAIL" type="email" value>
                        </div>
                        <div class="textarea-block" id="block-five">
                            <label for="NEEDS">Задайте Ваш вопрос или оставьте сообщение</label>
                            <textarea id="NEEDS" name="NEEDS"></textarea>
                        </div>
                        <!-- <input id="request" type="submit" value="Request a Quote" name="SUBMIT"> -->
                    </form>

                    <span id="error-message">* - поля, обязательные для заполнения.</span>
                    <iframe id="no-target" name="no-target" src="about:blank" style="visibility:hidden; display:none"></iframe>
                </div>
                <h2 id="success-message">Ваше сообщение<span class="emdash"><span></span>успешно отправлено!</span></h2>
                <a class="callback" href="/index">Вернуться назад</a>
            </div>
        </div>
    </div>
</div>

<div id="pagination">
    <div id="pagination-text">
        <div id="page-count-tens">
            <div class="page-numbers">
                <div class="page-number">0</div>
            </div>
        </div>

        <div id="page-count-ones">
            <div class="page-numbers">
                <div class="page-number">1</div>
                <div class="page-number">2</div>
                <div class="page-number">3</div>
                <div class="page-number">4</div>
                <div class="page-number">5</div>
            </div>
        </div>
        <span id="page-count-total">/ 5</span>
    </div>

    <ul id="pagination-dots"></ul>
</div>

<div id="mouse-indicator">
    <div id="mouse-wheel">
        <div class="mouse-outline">
            <svg width="18px" height="30px">
                <path fill="#fff" d="M729,903.789v9.419a9.009,9.009,0,1,0,18,0v-9.419A9.009,9.009,0,1,0,729,903.789Zm9-7.327a7.19,7.19,0,0,1,7,7.327v9.419a7.007,7.007,0,1,1-14,0v-9.419A7.19,7.19,0,0,1,738,896.462Z" transform="translate(-729 -894.375)"></path>
            </svg>
        </div>
        <div class="wheel animate">
            <svg width="2px" height="6px">
                <path fill="#fff" d="M738,905.358a1.027,1.027,0,0,0,1-1.046v-3.14a1,1,0,1,0-2,0v3.14A1.027,1.027,0,0,0,738,905.358Z" transform="translate(-737 -900.125)"></path>
            </svg>
        </div>
    </div>
</div>

<a id="request" href="mailto:lorem"><span>Напишите ваш вопрос</span>
    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="15" viewBox="0 0 17 15">
        <path d="M450.622,782.89l-1.648-6.087,13.846,7.249Zm-2.309,3.644-2.094-2.128,2.094-1.879,0.937,1.942Zm14.318-1.316-13.609,6.789,1.619-5.7Z" transform="translate(-446.219 -776.812)"></path>
    </svg>
</a>

<script src="{{ asset('js/static/WebFontConfig.js') }}"></script>

<!-- Self hosting this part, for Ghostery's sake -->
<script src="{{ asset('js/static/third-party/google/WebFontLoader.js') }}"></script>
</body>

</html>
