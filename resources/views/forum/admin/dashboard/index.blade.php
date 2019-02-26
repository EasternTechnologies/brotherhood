<script src="jquery-2.1.4.js"></script>
<script src="jquery.autocomplite.min.js"></script>

@foreach($category as $item)

    <table>
        <tr>
            <td>{{$item->id_title}}</td>
        </tr>
    </table>

@endforeach
@foreach($post as $article)
    <table>
        <tr>
            <td>{{$article->id}} : </td>
            <td>{{$article->title}}</td>
            <td>{{$article->text}}</td>
        </tr>
    </table>
@endforeach
@auth
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
@endauth
<br>

<input type="text" name="country" id="autocomplete"/>



<script>
    $('#autocomplete').autocomplete({
        serviceUrl: '/admin/autocomplite',
        onSelect: function (suggestion) {
            alert('You selected: ' + suggestion.value + ', ' + suggestion.data);
        }
    });
</script>