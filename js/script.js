$("#con_modal").click(function(e){
  e.stopPropagation();
  e.preventDefault();
  $("#connexion").show();
  return false;
});
$("#signin").click(function(e){
  e.preventDefault();
  $('#signup_content').hide();
  $('#signin_content').show();
  return false;
});
$("#signup").click(function(e){
  e.preventDefault();
  $('#signin_content').hide();
  $('#signup_content').show();
  return false;
});
$('#content').click(function(e){
  e.preventDefault();
  $("#connexion").hide();
  return false;
});
