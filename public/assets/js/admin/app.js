Dropzone.options.myAwesomeDropzone = false;
Dropzone.autoDiscover = false;

$(document).on('click','.btn-tag-included',function(){
  tags_exclude([$(this).text()],this);
});

$(document).on('click','.btn-tag-excluded',function(){
  tags_include([$(this).text()],this);
});

$(document).on('click','.btn-tags-add',function(){
  tags_add();
});

$(document).on('submit','.form',function(){
  
  if( $(this).attr("action") ){

    $('body').addClass("loading");
    $(this).find('button').addClass('disabled');

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
  admin_posts_update : function(){
    location.href = '/admin/posts';
    //location.reload();
  }
}

/* Tags */

function tags_add(){
  var tags_str = $.trim($( "#tags-add" ).val());

  if(tags_str == ""){
    alert("No string!");
    return false;
  }

  var tags = tags_str.split(",");

  for(var i in tags){
    tags[i] = $.trim(tags[i]);
  }
  $( "#tags-add" ).val( "" );
  tags_include(tags);
}

function tags(){
  var post_id = $( 'input[name="id"]' ).val();
  $('body').addClass("loading");
  $.ajax({
    type:"GET",
    url: "/admin/tags/post/" + post_id,
    success : function(json){
      if(json){
        if(json.included){
          $(json.included).each(function(i,tag){
            $( ".tags-included" ).append( '<a href="#" class="label label-success label-badge btn-tag-included">' + tag + '</a>' );
          });
        }
        if(json.excluded){
          $(json.excluded).each(function(i,tag){
            $( ".tags-excluded" ).append( '<a href="#" class="label label-info label-badge btn-tag-excluded">' + tag + '</a>' );
          });
        }
      }
      $('body').removeClass("loading");
    }
  });
}

function tags_exclude(tags,btn){
  var post_id = $( 'input[name="id"]' ).val();
  $('body').addClass("loading");
  $.ajax({
    type:"POST",
    url: "/admin/tags/relation/remove/" + post_id,
    data: {
      tags : tags
    },
    success : function(json){
      if(json){
        if(json.excluded){
          $(json.excluded).each(function(i,tag){
            $( ".tags-excluded" ).append( '<a href="#" class="label label-info label-badge btn-tag-excluded">' + tag + '</a>' );
          });
        }
        if($(btn).length){
          $(btn).remove();
        }
      }
      $('body').removeClass("loading");
    }
  });
}

function tags_include(tags,btn){
  var post_id = $( 'input[name="id"]' ).val();
  $('body').addClass("loading");
  $.ajax({
    type:"POST",
    url: "/admin/tags/relation/add/" + post_id,
    data: {
      tags : tags
    },
    success : function(json){
      if(json){
        if(json.included){
          $(json.included).each(function(i,tag){
          $( ".tags-included" ).append( '<a href="#" class="label label-success label-badge btn-tag-included">' + tag + '</a>' );
          });
        }
        if($(btn).length){
          $(btn).remove();
        }
      }
      $('body').removeClass("loading");
    }
  });
}


function sendImage(file, editor, welEditable) {
    data = new FormData();
    data.append("file", file);
    $('.summernote-progress').removeClass('hide').hide().fadeIn();
    $.ajax({
        data: data,
        type: "POST",
        xhr: function() {
            var myXhr = $.ajaxSettings.xhr();
            if (myXhr.upload) myXhr.upload.addEventListener('progress',progressHandlingFunction, false);
            return myXhr;
        },        
        url: "/file/upload",
        cache: false,
        contentType: false,
        processData: false,
        success: function(url) {
            $('.summernote-progress').fadeOut();
            editor.insertImage(welEditable, url);
        }
    });
}

function progressHandlingFunction(e){
    if(e.lengthComputable){
        var perc = Math.floor((e.loaded/e.total)*100);
        $('.progress-bar').attr({"aria-valuenow":perc}).width(perc+'%');
        // reset progress on complete
        if (e.loaded == e.total) {
            $('.progress-bar').attr('aria-valuenow','0.0');
        }
    }
}

$(function(){

  if($('.summernote').length){
      $('.summernote').summernote({
      height: 450,   
      minHeight: null,
      maxHeight: null,
      onImageUpload: function(files, editor, welEditable) {
        sendImage(files[0], editor, welEditable);
      }
    });
  }

  if($('.chosen').length){
    $('.chosen').each(function(){
      var width = "100%";
      if($(this).data('width')){
        width = $(this).data('width')+'px';
      }
      $(this).chosen({width:width}); 
    });
  }
  if($('.datetimepicker').length){
    $('.datetimepicker').datetimepicker();
  }

  if($('.dropzone').length){
    $('.dropzone').each(function(){

      if( ! $(this).hasClass('dz-clickable')){

        var target = $(this).data('target');
        var domain = $(this).data('domain');
        var index = $(this).data('index');
        var url = $(this).data('url')||"/api/upload";
        var id = $(this).data('id');
        var message = $(this).data('message')||Dropzone.prototype.defaultOptions.dictDefaultMessage;

        var myDropzone = new Dropzone(this, { 
          url: url,
          dictDefaultMessage:message,
          maxFilesize: 2,
          addRemoveLinks:true,
          dictCancelUpload:"Cancelar",
          dictCancelUploadConfirmation:"¿Seguro desea cancelar?",
          dictRemoveFile:"Eliminar",
          parallelUploads: 1,
          maxFiles: $(this).data('max')
        });
        
        /* DZ upload handlers */

        myDropzone.on("sending", function(file, xhr, formData) {
          formData.append("post_id", id );
        });

        myDropzone.on("success", function(file, xhr) {
          $(file.previewElement).data('id',xhr.id);
          $(file.previewElement).data('domain',domain);          
          if($('#'+target).find('input[name="id"]').val()==0){
            $('#'+target).find('input[name="id"]').val(xhr.post_id);
          }
        });

        myDropzone.on("removedfile", function(file, xhr) {
          $.ajax({
            type: 'post',
            url : "/admin/files/remove",
            data : {
              id : $(file.previewElement).data('id'),
              domain : $(file.previewElement).data('domain')
            }
          });
        });

        if($(this).data('hide')){
          $(this).hide();
        }

        $(this).sortable({
          update: function (event, ui) {

            var sorted=[];
            var id = "";
            var domain = "";

            $(this).find('.dz-preview').each(function(i,item){
              if(id==""){
                id = $(item).data('parent-id');
              }
              if(domain==""){
                domain = $(item).data('domain');
              }
              sorted[i] = $(item).data('id');
            });

            $.ajax({
              type:"POST",
              url: "/admin/files/order",
              data: {
                id : id,
                sorted : sorted,
                domain : domain
              },
              success : function(json){
                success('');
              }
            });
          }
        });

        if(index){
          setTimeout(function(){
            $.ajax({
              type: 'get',
              url : index,
              success : function(json){
                $(json).each(function(i,item){
                  var mockFile = { size: item.file_size, name: item.name };

                  myDropzone.emit("addedfile", mockFile);
                  myDropzone.emit("thumbnail", mockFile, '/upload/' + domain + '/thumb/' + item.name);
                  
                  $(mockFile.previewElement).data('id',item.id);
                  $(mockFile.previewElement).data('domain',domain);
                  $(mockFile.previewElement).find('.dz-progress').hide();
                });
              }
            });
          },100);
        }
      }
    });
  }

  $('[data-toggle="popover"]').popover({trigger:"hover"});
  $("a,span").not('[data-toggle="popover"]').tooltip({container: 'body'});
});