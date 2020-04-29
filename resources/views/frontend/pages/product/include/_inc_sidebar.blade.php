<div class="filter-sidebar">
    @if(isset ($attributes))
        @foreach ($attributes as $key=> $attribute )
        <div class="item">
        <div class="item__title">{{ $key}}</div>
            <div class="item__content">
                <ul>
                    @foreach ($attribute as $item)
                    <li>
                        <label>
                        <input type="checkbox" value="{{ $item['id']}}">
                        <h2><span>{{ $item['atb_name'] }}</span></h2>
                        </label>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endforeach
    @endif

</div>
