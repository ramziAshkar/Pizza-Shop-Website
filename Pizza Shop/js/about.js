$(document).ready(function(){

    $("#img1").show();
    $("#img2").hide();
    $("#img3").hide();
    $("#img4").hide();
    $("#img5").hide();
    $("#img6").hide();
    $("#img7").hide();
    $("#img8").hide();
    var index=1;

    setInterval(function () {
        if(index==1){
            $("#img2").show();
            $("#img1").hide();
            $("#img3").hide();
            $("#img4").hide();
            $("#img5").hide();
            $("#img6").hide();
            $("#img7").hide();
            $("#img8").hide();
            index++;
        }
        else if(index==2){
            $("#img3").show();
            $("#img1").hide();
            $("#img2").hide();
            $("#img4").hide();
            $("#img5").hide();
            $("#img6").hide();
            $("#img7").hide();
            $("#img8").hide();
            index++;
        }
        else if(index==3){
            $("#img4").show();
            $("#img1").hide();
            $("#img2").hide();
            $("#img3").hide();
            $("#img5").hide();
            $("#img6").hide();
            $("#img7").hide();
            $("#img8").hide();
            index++;
        }
        else if(index==4){
            $("#img5").show();
            $("#img2").hide();
            $("#img3").hide();
            $("#img4").hide();
            $("#img1").hide();
            $("#img6").hide();
            $("#img7").hide();
            $("#img8").hide();
            index++;
        }
        else if(index==5){
            $("#img6").show();
            $("#img2").hide();
            $("#img3").hide();
            $("#img4").hide();
            $("#img1").hide();
            $("#img5").hide();
            $("#img7").hide();
            $("#img8").hide();
            index++;
        }
        else if(index==6){
            $("#img7").show();
            $("#img2").hide();
            $("#img3").hide();
            $("#img4").hide();
            $("#img1").hide();
            $("#img5").hide();
            $("#img6").hide();
            $("#img8").hide();
            index++;
        }
        else if(index==7){
            $("#img8").show();
            $("#img2").hide();
            $("#img3").hide();
            $("#img4").hide();
            $("#img1").hide();
            $("#img5").hide();
            $("#img6").hide();
            $("#img7").hide();
            index++;
        }
        else if(index==8){
            $("#img1").show();
            $("#img2").hide();
            $("#img3").hide();
            $("#img4").hide();
            $("#img8").hide();
            $("#img5").hide();
            $("#img6").hide();
            $("#img7").hide();
            index=1;
        }
    }, 3500);

});
