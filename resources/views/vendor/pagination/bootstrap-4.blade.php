@if ($paginator->hasPages())
    <div class="row  ">

        <div class="col-md-12 text-center">
            <div class="site-pagination">



                @foreach ($elements as $element)
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <a class="active"><span>{{ $page }}</span></a>
                            @else
                                <a href="{{ $url }}">{{ $page }}</a>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endif
