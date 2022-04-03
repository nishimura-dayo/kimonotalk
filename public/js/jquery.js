/*global $*/
$(function() {
    var view_box = $('.view_box');

    $(".input-photo").on('change', function() {
        var fileprop = $(this).prop('files')[0],
        find_img = $(this).next('img'),
        fileRdr = new FileReader();

        if(find_img.length){
            find_img.nextAll().remove();
            find_img.remove();
        }
        var img = '<img width="200" alt="" class="img_view"><div class="img_del"></div>';

        view_box.append(img);

        fileRdr.onload = function() {
            view_box.find('img').attr('src', fileRdr.result);
            img_del(view_box);
        }
        fileRdr.readAsDataURL(fileprop);
    });

    // 画像を削除する
    function img_del(target) {
        target.find(".img_del").on('click',function(){
            $(this).parent().find('input[type=file]').val('');
            $(this).parent().find('.img_view, br').remove();
            $(this).remove();
        });
    }
});