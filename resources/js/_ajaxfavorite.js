$(function () {
    let favorite = $('.js-favorite-toggle');

    favorite.on('click', function () {
        let $this = $(this);
        let favoriteShopId = $this.data('shopid');
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '/ajax_favorite',
            type: 'POST',
            data: {
                'shop_id': favoriteShopId
            },
        })

        .done(function (_data) {
            $this.toggleClass('love');
        })

        .fail(function (_data, xhr, err) {
            console.log('エラー');
            console.log(err);
            console.log(xhr);
        });

    });
});
