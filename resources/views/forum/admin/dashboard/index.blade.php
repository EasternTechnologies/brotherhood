

<table>
    @foreach($category as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->title}}</td>
        </tr>
    @endforeach
</table>
z