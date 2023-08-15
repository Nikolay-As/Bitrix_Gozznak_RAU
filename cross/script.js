var currentCross = {};

function showErrorPopup(str)
{
    $('.popup_error p').empty().html(str);
    $('.popupovererror').show();
    $('.popup_error').show();
}

function getCrossSize()
{
    var res = [0, 0], word = {};
    if(currentCross.words != undefined && currentCross.words.length > 0)
    {
        for(var i = 0; i < currentCross.words.length; i++)
        {
            word = currentCross.words[i];
            if(word.hORv == 'V')
            {
                if(res[0] < word.positionX)
                {
                    res[0] = word.positionX;
                }
                if(res[1] < (word.positionY+word.word.length))
                {
                    res[1] = word.positionY+word.word.length;
                }
            }
            else
            {
                if(res[1] < word.positionY)
                {
                    res[1] = word.positionY;
                }
                if(res[0] < (word.positionX+word.word.length))
                {
                    res[0] = word.positionX+word.word.length;
                }
            }
        }				
    }
    return res;
}

function openEnterWord(word_number)
{
    $('.popup_enter_word input[name="word_number"]').val(word_number);
    $('.popup_enter_word input[name="word"]').val('');
    $('.popupover').show();
    $('.popup_enter_word').show();
}

function isAllWordsSuccess()
{
    var res = true;
    for(var i = 0; i < currentCross.words.length; i++)
    {
        if(currentCross.words[i].success != 'Y')
        {
            res = false;
            break;
        }
    }
    return res;
}

function paintWord(number, word)
{
    word = word.toLowerCase();
    var real = {}, i = 0, j = 0, x = 0, y = 0, real_index = 0;
    for(i = 0; i < currentCross.words.length; i++)
    {
        if(currentCross.words[i].number == number*1)
        {
            real_index = i;
            real = currentCross.words[i];
            break;
        }
    }
    if(real.word != word)
    {
        showErrorPopup('Введено неверное слово!');
        return false;
    }
    for(j = 0; j < real.word.length; j++)
    {
        x = (real.hORv == 'H')? real.positionX+j: real.positionX;
        y = (real.hORv == 'H')? real.positionY: real.positionY+j;
        if(j == 0)
        {
            $('#cell-'+x+'-'+y).empty().html('<span>'+real.number+'</span>'+real.word[j]);
        }
        else
        {
            $('#cell-'+x+'-'+y).empty().html(real.word[j]);
        }
        $('#cell-'+x+'-'+y).removeClass('empty').addClass('success');
    }
    if(real.images != undefined)
    {
        $('.word-'+real.number+' .word_photo').show();
    }
    currentCross.words[real_index].success = 'Y';

    $('.popupover').click();

    if(isAllWordsSuccess())
    {
        setTimeout(function(){
            $('.popupover').show();
            $('.popup_cross_end').show();
        }, 1200);
    }
}

function paintWords()
{
    if(currentCross.words == undefined)
    {
        return false;
    }
    var word = {}, i = 0, j = 0, x = 0, y = 0, n = 0;
    currentCross.words.sort((prev, next) => prev.number - next.number);
    $('.cross_words ul').empty();
    for(i = 0; i < currentCross.words.length; i++)
    {
        word = currentCross.words[i];
        for(j = 0; j < word.word.length; j++)
        {
            x = (word.hORv == 'H')? word.positionX+j: word.positionX;
            y = (word.hORv == 'H')? word.positionY: word.positionY+j;
            if(j == 0)
            {
                //$('#cell-'+x+'-'+y).empty().html('<span>'+word.number+'</span><input type="text" name="cell-'+x+'-'+y+'" value="">').attr('data-id', word.number);
                $('#cell-'+x+'-'+y).empty().html('<span>'+word.number+'</span>').attr('data-id', word.number);
            }
            else
            {
                //$('#cell-'+x+'-'+y).empty().html('<input type="text" name="cell-'+x+'-'+y+'" value="">').attr('data-id', word.number);
                $('#cell-'+x+'-'+y).empty().attr('data-id', word.number);
            }
            $('#cell-'+x+'-'+y).removeClass('empty').addClass('full').addClass('crossWord-'+word.number);
        }
        var links = '<li class="word-'+word.number+'" data-id="'+word.number+'" onclick="openEnterWord(\''+word.number+'\');">'+word.number+'. '+word.text;
        links += '<div class="word_photo">';
        if(word.images != undefined)
        {
            for(n = 0; n < word.images.length; n++)
            {
                links += '<div class="img_block"><img src="/upload/cross/'+word.images[n]+'"></div>';
            }
        }
        links += '</div></li>';
        $('.cross_words ul').append(links);
    }

    //события на обработку слов
    $('.cross_words ul li').mouseleave(function(){
        $('.cross_fields table td').removeClass('selected');
        $('.cross_words ul li').removeClass('selected');
    });
    $('.cross_words ul li').mouseenter(function(){
        var id = $(this).attr('data-id');
        $('.cross_fields table td').removeClass('selected');
        $('.crossWord-'+id).addClass('selected');

        $('.cross_words ul li').removeClass('selected');
        $('.cross_words ul li.word-'+id).addClass('selected');
    });

    $('.cross_fields table td.full').mouseleave(function(){
        $('.cross_fields table td.full').removeClass('selected');
        $('.cross_words ul li').removeClass('selected');
    });
    $('.cross_fields table td.full').mouseenter(function(){
        var id = $(this).attr('data-id');
        $('.cross_fields table td.full').removeClass('selected');
        $('.crossWord-'+id).addClass('selected');
        $('.cross_words ul li').removeClass('selected');
        $('.cross_words ul li.word-'+id).addClass('selected');
    });
    $('.cross_fields table td.full').click(function(){
        var id = $(this).attr('data-id');
        openEnterWord(id);
    });
}


function generateCrossFields(x, y)
{
    var i = 0, j = 0;
    var html = '<table class="cross-table">';
    for(i = 1; i <= y; i++)
    {
        html += '<tr>';
        for(j = 1; j <= x; j++)
        {
            html += '<td id="cell-'+j+'-'+i+'" width="28" height="28" align="center" valign="middle" class="empty"></td>';
        }
        html += '</tr>';
    }
    html += '</table></div>';
    $('.cross_fields').empty().html(html);
}

function updateCrossBlock()
{
    if(currentCross.words == undefined)
    {
        return false;
    }
    
    var len = getCrossSize(), x = 10, y = 10;
    x = (len[0] < 10)? x: len[0];
    y = (len[1] < 10)? y: len[1];
    generateCrossFields(x, y);
    paintWords();
    $('.popup_cross_end .btn_next').attr('href', currentCross.link);
}

function loadCross()
{
    var code = $('#crossCode').val();
    $.ajax({
        url: '/local/modules/labsu.cross/ajax/loadCross.php',
        method: 'post',
        dataType: 'json',
        data: {
            code: code
        },
        success: function(data){
            currentCross = data;
            updateCrossBlock();
        },
        error: function( jqXHR, textStatus, errorThrown ){
        }
    });		
}


$(document).ready(function(){
    loadCross();

    $('.popupovererror').click(function(){
        $('.popupovererror').hide();
        $('.popup_error').hide();
    });

    $('.popupover').click(function(){
        $('.popupover').hide();
        $('.popup_enter_word').hide();
        $('.popup_cross_end').hide();
    });

    $('.popup_cross_end .btn_restart').click(function(){
        $('.popupover').click();
        loadCross();
    });

    $('.enter_word_btn').click(function(){
        var number = $(this).closest('.popup_enter_word').find('input[name="word_number"]').val(), word = $(this).closest('.popup_enter_word').find('input[name="word"]').val();
        paintWord(number, word);
    });

});