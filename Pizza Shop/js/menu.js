
$(document).ready(function(){
  var title="";
  var price="";
  var description="";
  var image="";

    $(".like").click(function(){
        var clicked=$(this).val();
        if(clicked==0){
            $(this).html("<i class='bi bi-suit-heart'></i>");
            $(this).val("1");
        }
        else if(clicked==1){
            $(this).html("<i class='bi bi-suit-heart-fill'></i>");
            $(this).val("0");
        }
    });

    $("#dishes").hide();
    $(".pizza_btn").click(function(){
        $("#pizzas").show();
        $("#dishes").hide();
        $(this).css({"background-color":"rgb(122, 15, 15)","color":"white"});
        $(".dish_btn").css({"background-color":"white","color":"rgb(122, 15, 15)"});
    });

    $(".dish_btn").click(function(){
        $("#pizzas").hide();
        $("#dishes").show();
        $(this).css({"background-color":"rgb(122, 15, 15)","color":"white"});
        $(".pizza_btn").css({"background-color":"white","color":"rgb(122, 15, 15)"});
    });
    let ordersform = document.querySelector('.ordering-container');

    $(".order").click(function(){
      
      });

      $("#back").click(function(){
          document.querySelector(".confirm").classList.toggle("active");
      });
      $("#confirm-no").click(function(){
          document.querySelector(".confirm").classList.toggle("active");
      });
      $("#confirm-yes").click(function(){
          $(".confirm").hide();
          $(".yes").css("display","block");
      });
      $("#yes-back").click(function(){
          $(".yes").css("display","none");
          $(".confirm").show();

      });







});
