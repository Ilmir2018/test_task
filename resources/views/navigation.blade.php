<div class="menu classic">
    <ul id="nav" class="menu">
        @foreach($menu->roots() as $item)
            <li>
                <a href="{{$item->url()}}">{{ $item->title }}</a>
            </li>
        @endforeach
    </ul>
</div>
