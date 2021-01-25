$(document).ready(function(){
    $('.btn-edt-cat').on('click',function(){
        const id = $(this).data('id');
        const name = $(this).data('name');
        $('.cat_id').val(id);
        $('.cat_name').val(name);
    });

    $('.btn-del-cat').on('click',function(){
        const id = $(this).data('id');
        $('.cat_id').val(id);
    });

    $('.btn-det-prod').on('click',function(){
        const name = $(this).data('name');
        const category = $(this).data('cat');
        const description = $(this).data('desc');
        const quantity = $(this).data('quant');
        const price = $(this).data('price');
        const img1 = $(this).data('img1');
        const img2 = $(this).data('img2');
        const img3 = $(this).data('img3');
        $('.prod_name').text(name);
        $('.prod_cat').text(category);
        $('.prod_desc').after(description);
        $('.prod_quant').text(quantity);
        $('.prod_price').text(price);
        $('.prod_img_1').attr('src', BASE_URL+'theme/images/prod_img/'+img1);
        $('.prod_img_2').attr('src', BASE_URL+'theme/images/prod_img/'+img2);
        $('.prod_img_3').attr('src', BASE_URL+'theme/images/prod_img/'+img3);
    });

    $('.btn-del-prod').on('click',function(){
        const id = $(this).data('id');
        $('.prod_id').val(id);
    });

    $('.btn-del-dotw').on('click',function(){
        const id = $(this).data('id');
        $('.dotw_id').val(id);
    });

    $(".btn-edt-dotw").on('click',function() {
        const id = $(this).data('id');
        const prod = $(this).data('prod');
        const expired = $(this).data('expired');
        const price = $(this).data('price');
        $('.dotw_id').val(id);
        $('.dropdown-search').val(prod);
        $('.dropdown-search').trigger('change');
        $('.dotw_expired').val(expired);
        $('.dotw_price').val(price);
    });

    $(".btn-edt-usr").on('click',function() {
        const id = $(this).data('id');
        const name = $(this).data('name');
        const role = $(this).data('role');
        const active = $(this).data('active');
        $('.usr_id').val(id);
        $('.usr_name').val(name);
        $('.usr_role').val(role);
        $('.usr_role').trigger('change');
        $('.usr_active').val(active);
        $('.usr_active').trigger('active');
    });

    $('.btn-del-usr').on('click',function(){
        const id = $(this).data('id');
        $('.usr_id').val(id);
    });

});
