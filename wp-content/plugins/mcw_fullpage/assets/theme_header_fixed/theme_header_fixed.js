function mcw_header_padding(){
  /* Header Size */
  var hs = $('<?php echo $header?>').height();
  /* Get admin bar height */
  var ah = 0;
  if ($('#wpadminbar').length != 0)
    ah = $('#wpadminbar').height();
  
  /* Set selector padding */
  $('<?php echo $selector?>').css('padding-top', hs + 'px');
  
  $('.fp-controlArrow').each(function(){
    $(this).css('margin-top', ((hs - ah - $(this).outerHeight()) / 2) + 'px');
  });

  $('#fp-nav').css('padding-top', ( (hs + ah) / 2) + 'px');
}
var mcwPaddingTop = $('<?php echo $header?>').height();