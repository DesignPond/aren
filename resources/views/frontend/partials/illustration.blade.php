<div id="illustrations">
    @if(!$page->images->isEmpty())
        @foreach($page->images as $image)
            <div class="item-image {{ $image->style }}">
                <p>
                    @if($image->image)

                        <?php list($width, $height, $type, $attr) = getimagesize('files/'.$image->image); ?>
                        <img width="{{ $width }}px" height="{{ $height }}px" src="{{ asset('files/'.$image->image) }}" alt="itinéraires équestres" />
                        <span class="title">{{ $image->titre }}</span>

                    @elseif($image->titre)
                        {{ $image->titre }}
                    @endif

                    <span class="tape"></span>
                </p>
            </div>
        @endforeach
    @endif
</div>