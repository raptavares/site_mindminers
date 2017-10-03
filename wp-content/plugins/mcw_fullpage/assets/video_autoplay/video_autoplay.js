function video_autoplay(){
  $('<?php echo $selector?> video, <?php echo $selector?> audio, <?php echo $selector?> iframe[src*="youtube.com/embed/"]').each(function(){
    var el = $(this).get(0);
    if (!el.hasAttribute('data-autoplay'))
      $(el).attr('data-autoplay', 'true');
  });
}