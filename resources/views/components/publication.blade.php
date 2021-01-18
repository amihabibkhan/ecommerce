<div>
    <div class="single-teachers get_writer_width">
        <a href="{{ route('frontend.singlePublication', $publication->slug) }}" class="d-block">
            @if($publication->image)
                <img src="{{ asset('storage') }}/{{ $publication->image }}" style="width: 100%" alt="{{ $publication->name }}">
            @else
                <div class="not_image_writer">
                    <img src="{{ asset('images/default.jpg') }}" style="width: 100%" alt="{{ $publication->name }}">
                </div>
            @endif
            <div class="teachers-content p-3">
                <h3 style="font-size: 16px; font-weight: bold; margin-top: 0">{{ $publication->name }}</h3>
            </div>
        </a>
    </div>
</div>
