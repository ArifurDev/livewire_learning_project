<div class="col-md-4">
    <div class="searchbox">
        <a class="search-link"><i class="ri-search-line"></i></a>
        <input type="text" class="text search-input" placeholder="Search here..."
            wire:model.live.debounce.500ms="routeSearching">
    </div>

    <div class="">
        @if ($routeSearching != '')
        @if ($routes != null)
            @foreach ($routes as $route)
                <table>
                    <tr>
                        <td>
                            <a href="{{ route($route->url) }}" class="text-black font-size-8">{{ $route->name }}</a>
                        </td>
                    </tr>
                </table>
            @endforeach
        @endif
    @endif
    </div>

</div>
