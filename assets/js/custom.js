function loadPage(x){
  $('#content').empty();
  $('#loading').addClass('loading');
  $('#content').load(x);
}
