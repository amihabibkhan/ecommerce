<div>
    <a href="{{ route('frontend.singleWriter', $writer->slug) }}" class="d-block">
        <div class="writer_pubs">
            <div class="section_logo">
                @if($writer->image)
                    <img src="{{ asset('storage') }}/{{ $writer->image }}" style="width: 100%" alt="{{ $writer->name }}">
                @else
                    <div class="not_image_writer">
                        <img src="{{ asset('images/default.jpg') }}" style="width: 100%" alt="{{ $writer->name }}">
                    </div>
                @endif
            </div>
            <div class="section_title">
                <h3 style="font-size: 16px; font-weight: bold; margin: 0">{{ $writer->name }}</h3>
            </div>
        </div>
    </a>
</div>
