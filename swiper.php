<style>
    .swiper {
        margin-top: 10px;
        width: 100%;
        height: 100%;
    }

    .swiper-slide {
        text-align: center;
        /* font-size: 18px; */
        /* background: #fff; */
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .swiper-slide img {
        /* display: block; */
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
</style>
<div class="swiper mySwiper">
    <div class="swiper-wrapper">
        <div class="swiper-slide"><img src="image/Desktop - 15 (1).png"></div>
        <div class="swiper-slide"><img src="image/Desktop - kgsp (1).png"></div>
        <div class="swiper-slide"><img src="image/Desktop - TEDK.png"></div>
        <div class="swiper-slide"><img src="image/Desktop - tmpo.png"></div>
        <div class="swiper-slide"><img src="image/Desktop - ttl.png"></div>
        <div class="swiper-slide"><img src="image/Desktop - tflm.png"></div>
    </div>
    <div class="swiper-pagination"></div>
</div>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".mySwiper", {
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
</script>