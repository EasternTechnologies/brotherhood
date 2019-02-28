<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>

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

<div>
    <input type="text" autocomplete="off" name="country" id="autocomplete" >
    <ul class="autocomplete">

    </ul>
</div>


<p></p>
<script type="text/javascript">
    $( "input#autocomplete" )
        .keyup(function() {
            let value = $( this ).val();
    if (value != null){
        $.ajax({
            url:'/admin/autocomplite',
            method:'get',
            data:'value='+value,
            success:function (result) {

                $('.autocomplete').empty();
                    var count_country = result.length;
                    if ( count_country >= 1 ) {

                        if ( count_country > 5) {
                            count_country = 5
                        }
                        for ( i = 0 ; i < count_country; i++)
                        {
                            addCountry ();
                        }
                    }

                function addCountry () {
                    $('.autocomplete').prepend('<li>',result[i],'</li>');
                    console.log(result[i]);
                }
            }
        })}
    })
</script>