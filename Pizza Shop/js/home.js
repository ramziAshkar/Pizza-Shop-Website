$(document).ready(function(){

    $("#img1").show();
    $("#img2").hide();
    $("#img3").hide();
    $("#img4").hide();
    var index=1;
    setInterval(function () {
        if(index==1){
            $("#img2").show();
            $("#img1").hide();
            $("#img3").hide();
            $("#img4").hide();
            index++;
        }
        else if(index==2){
            $("#img3").show();
            $("#img1").hide();
            $("#img2").hide();
            $("#img4").hide();
            index++;
        }
        else if(index==3){
            $("#img4").show();
            $("#img1").hide();
            $("#img2").hide();
            $("#img3").hide();
            index++;
        }
        else if(index==4){
            $("#img1").show();
            $("#img2").hide();
            $("#img3").hide();
            $("#img4").hide();
            index=1;
        }
    }, 5000);
    $("#right").click(function(){
        if(index==1){
            $("#img2").show();
            $("#img1").hide();
            $("#img3").hide();
            $("#img4").hide();
            index++;
        }
        else if(index==2){
            $("#img3").show();
            $("#img1").hide();
            $("#img2").hide();
            $("#img4").hide();
            index++;
        }
        else if(index==3){
            $("#img4").show();
            $("#img1").hide();
            $("#img2").hide();
            $("#img3").hide();
            index++;
        }
        else if(index==4){
            $("#img1").show();
            $("#img2").hide();
            $("#img3").hide();
            $("#img4").hide();
            index=1;
        }
    });
    $("#left").click(function(){
        if(index==1){
            $("#img4").show();
            $("#img1").hide();
            $("#img2").hide();
            $("#img3").hide();
            index=4;
        }
        else if(index==2){
            $("#img1").show();
            $("#img2").hide();
            $("#img3").hide();
            $("#img4").hide();
            index--;
        }
        else if(index==3){
            $("#img2").show();
            $("#img1").hide();
            $("#img3").hide();
            $("#img4").hide();
            index--;
        }
        else if(index==4){
            $("#img3").show();
            $("#img1").hide();
            $("#img2").hide();
            $("#img4").hide();
            index--;
        }
    });
    var swiper = new Swiper(".reviews-slider", {
    spaceBetween: 10,
    grabCursor: true,
    loop: true,
    centeredSlides: true,
    autoplay: {
        delay: 9500,
        disableOnInteraction: false,
    },
    breakpoints: {
    0: {
        slidesPerView: 1,
    },
    768: {
        slidesPerView: 2,
    },
    1024: {
        slidesPerView: 3,
    },
},
});
let reviewsform = document.querySelector('.reviews-container');

document.querySelector('#addreview').onclick = () =>{
    reviewsform.classList.toggle('active');
    $('#reviewadder').removeAttr('hidden');

}
document.querySelector('#close-review-btn').onclick = () =>{
    reviewsform.classList.remove('active');

}

});
