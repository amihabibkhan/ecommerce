<div>
    <a href="{{ route('frontend.singlePublication', $publication->slug) }}" class="d-block">
        <div class="writer_pubs">
            <div class="section_logo">
                @if($publication->logo)
                    <img src="{{ asset('storage') }}/{{ $publication->logo }}" style="width: 100%; border: 1px solid #e4e4e4" alt="{{ $publication->name }}">
                @else
                    <div class="not_image_writer">
                        <img src="{{ asset('images/default.jpg') }}" style="width: 100%" alt="{{ $publication->name }}">
                    </div>
                @endif
            </div>
            <div class="section_title">
                <h3 style="font-size: 16px; font-weight: bold; margin: 0">{{ $publication->name }}</h3>
            </div>
        </div>
    </a>
</div>
