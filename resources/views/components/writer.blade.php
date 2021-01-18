<div>
    <div class="single-teachers get_writer_width">
        <a href="{{ route('frontend.singleWriter', $writer->slug) }}" class="d-block">
            @if($writer->image)
                <img src="{{ asset('storage') }}/{{ $writer->image }}" style="width: 100%" alt="{{ $writer->name }}">
            @else
                <div class="not_image_writer">
                    <img src="{{ asset('images/default.jpg') }}" style="width: 100%" alt="{{ $writer->name }}">
                </div>
            @endif
            <div class="teachers-content p-3">
                <h3 style="font-size: 16px; font-weight: bold; margin-top: 0">{{ $writer->name }}</h3>
            </div>
        </a>
    </div>
</div>
