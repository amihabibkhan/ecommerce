<div class="single-course mb-md-0 mb-4">
    <div class="book_img" style="height: 350px; padding-top: 45px;">
        <a  class="book-container" href="{{ route('frontend.singleProduct', $offer->product->slug) }}" >
            <div class="book">
                <img src="{{ asset('storage') }}/{{ @$offer->product->main_image }}" />
            </div>
        </a>
    </div>
    <div class="course-content">
        <span class="price" style="width: unset; padding: 0 20px; color: black; border-radius: 0; right: 60px; top: 87px;transform: skew(32deg, -10deg); box-shadow: 0px 5px 10px 0px #00000069; "><sup>৳</sup> {{ $offer->offer_price }}</span>

        <a href="{{ route('frontend.singleProduct', $offer->product->slug) }}">
            <h3>{{ @$offer->product->title }}</h3>
            <h4>{{ @$offer->product->writer->name }}</h4>
            <h4>রেগুলার প্রাইজ: {{ @$offer->product->regular_price }}/-</h4>
        </a>
        <div id="timer{{ $offer->id }}" class="timer">
            <div class="timer_item" id="test_days{{ $offer->id }}"></div>
            <div class="timer_item" id="test_hours{{ $offer->id }}"></div>
            <div class="timer_item" id="test_minutes{{ $offer->id }}"></div>
            <div class="timer_item" id="test_seconds{{ $offer->id }}"></div>
        </div>
    </div>
</div>


<script>
    function test_Timer{{ $offer->id }}() {
        var endTime = new Date("{{ date_maker($offer->last_date, 'F d, Y')  }}, 23:59:59 GMT+6");
        var endTime = (Date.parse(endTime)) / 1000;
        var now = new Date();
        var now = (Date.parse(now) / 1000);
        var timeLeft = endTime - now;
        var days = Math.floor(timeLeft / 86400);
        var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
        var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600 )) / 60);
        var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));
        if (hours < "10") { hours = "0" + hours; }
        if (minutes < "10") { minutes = "0" + minutes; }
        if (seconds < "10") { seconds = "0" + seconds; }
        $("#test_days{{ $offer->id }}").html(days + "<span>Days</span>");
        $("#test_hours{{ $offer->id }}").html(hours + "<span>Hours</span>");
        $("#test_minutes{{ $offer->id }}").html(minutes + "<span>Minutes</span>");
        $("#test_seconds{{ $offer->id }}").html(seconds + "<span>Seconds</span>");
    }
    setInterval(function() { test_Timer{{ $offer->id }}(); }, 300);
</script>
