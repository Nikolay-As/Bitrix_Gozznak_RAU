$(document).ready(function(){

  function showError(err)
  {
    $('.popupVoteError .errorText').empty().html(err);
    $('.popupoverVoteError').show();
    $('.popupVoteError').show();
  }

  $('.popupoverVoteError, .popupVoteError').click(function(){
    $('.popupoverVoteError').hide();
    $('.popupVoteError').hide();
  });

  $('#voteForm input[type="checkbox"]').change(function(){
    var maxCount = $('#voteForm').attr('data-max'), voted = 0;
    $('#voteForm input[type="checkbox"]').each(function(){
      if($(this).prop('checked'))
      {
        voted++;
      }
    });
    if(voted > maxCount)
    {
      showError('Выбрано максимальное количество возможных вариантов. Допустимо '+maxCount+'. ');
      $(this).prop('checked', false);
    }
  });

  $('.vote_button').click(function(){
    var voted = 0;
    $('#voteForm input[type="checkbox"]').each(function(){
      if($(this).prop('checked'))
      {
        voted++;
      }
    });
    if(voted < 1)
    {
      showError('Не выбраны варианты для голосования.');
      return false;
    }
    else 
    {
      $('#voteForm').submit();
    }
  });

});