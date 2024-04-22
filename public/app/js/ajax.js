$('.like').click(function(e){
    e.preventDefault();

    $.ajax({
        url: '/like',
        type: 'POST',
        data: {
            product_id: $(this).data('product-id')
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data){
            if(data.success){
                alert('Product liked successfully!');
            }
        },
        error: function(error){
            console.log(error);
        }
    });
});
