/*$('.work__title').textillate({
    in: {
        // set the effect name
        effect: 'rotateInDownRight',
        minDisplayTime: 500,

        // set the delay factor applied to each consecutive character
        delayScale: 0.5,

        // set the delay between each character
        delay: 50,

        // set to true to animate all the characters at the same time
        sync: false,

        // randomize the character sequence
        // (note that shuffle doesn't make sense with sync = true)
        shuffle: true,

        // reverse the character sequence
        // (note that reverse doesn't make sense with sync = true)
        reverse: false

    }
});


$('.work').on('mouseenter',function(){
    $(this).find('.work__title').textillate('start');
});
*/

$('.work__button').on('click',function(ev){
    idwork = $(this).parent().parent().parent().parent().attr('id').replace('work','');
    ev.preventDefault();
    $.oc.stripeLoadIndicator.show();
    $(this).request('onWork',{
        update: {'Worklist::workdetail': '#workdetail'},
        data: {work_id: idwork },
        complete: function(){$.oc.stripeLoadIndicator.hide();$('#workdetail').fadeIn(500);$('.work-background').scrollTop(0);}

    });

});
$('body').on('click','.work-close',function(){
    $('#workdetail').fadeOut(500);
    $('.work-background').fadeOut(500,function(){this.remove()});
})

$('.work-category').on('click',function(){
    cat_id = parseInt(this.id.replace('cat-',''));
    console.log(cat_id);
    if(cat_id==0){
        //$('.work').css('display','inline-block');
        $('.work').each(function(){
           if($(this).css('display')=='none'){
               $(this).fadeIn(200);
           }
        });
    }else{
        //$('.work').css('display','none');
        //$('.cat-' + cat_id).css('display','inline-block');
        $('.work').each(function(){
            if(!$(this).hasClass('cat-'+cat_id)){
                $(this).fadeOut(200);
            }else{
                $(this).fadeIn(200);
            }
        });
    }
    $('.work-category').removeClass('selected');
    $(this).addClass('selected');
})