$('.custom-input').on('input',function(){
    let text = $(this).val();
    let urlSearch = $(this).data('url');
    if (text != ''){
        $.ajax({
            type: 'GET',
            url: urlSearch,
            data: {search: text},
    
            success:function(data){  
                // $('.search-ajax-result').html(500);     
                $('.search-ajax-result').html(data);
            }
        })
    }else{
        $('.search-ajax-result').html('');
        // $('.search-ajax-result').hide();
    }
    
})