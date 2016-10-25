$("form").submit(function(e){
            e.preventDefault();
            loadURLPost($(this).attr("action"),container,$(this).serialize());
       });
