$(document).on('submit','.form',function(){
  
  if( $(this).attr("action") ){

    //$('body').addClass("loading");
    //$(this).find('button').addClass('disabled');

    var arr = $(this).attr("action").split('/');
    arr = $.grep(arr, function(n){ return (n); });
    var callback = arr.join('_');

    $.ajax({
      type: 'post',
      url: $(this).attr('action'),
      data: $(this).serialize(),
      success:function(json){
        if(json.redirect){
          location.href = json.redirect;
        }
        if(typeof forms[callback] == 'function') {
          forms[callback].call(this,json);
        }
        $('body').removeClass("loading");
      }
    });

    return false;
  } 

  if(typeof forms[callback] == 'function') {
    forms[callback].call(this,null);
  }

  return false;
});

var forms = {
  login : function(response){
    if( ! response.result){
      $('.alert-danger')
        .html("Username and/or password are incorrect")
        .removeClass("hide")
        .hide()
        .slideDown();
    }
  }
}

$(function(){
  if($('.slick-dotted').length){
    $('.slick-dotted').slick({    
      dots: true,
      infinite: true,
      speed: 450,
      pauseOnHover: false,
      autoplaySpeed: 8000,
      autoplay:true,
      arrows: false,
      fade: true
    });
  }
  $("a,span").tooltip({container: 'body'});
});