<style>
    .inner_page_banner{
        background-color: #fbca0c;
        padding: 30px 0;
        text-align: center;
    }
    .inner_page_banner .page_title{
        color: #000;
    }
</style>
{{-- single page title --}}
<section class="inner_page_banner">
    <div class="container">
        <h3 class="page_title"><a style="color: black" href="{{ route('index') }}">হোম</a> / {{ $title }}</h3>
    </div>
</section>
