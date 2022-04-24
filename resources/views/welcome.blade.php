@include('links')
<body style="background: rgb(225, 234, 234);">
@include('navbar')
@php 
    $cardsData = $dataa['cards'];
    $carouselData = $dataa['carousel'];
@endphp
@include('homeCarousel')
@include('homeCards')
</body>

@include('script')
