// onLeave event function
function mcw_vcanim_reset_ol(that){
  if ($(that).find('.fp-slides').length){
    $(that).find('.fp-slide.active .wpb_animate_when_almost_visible.wpb_start_animation').removeClass('wpb_start_animation');
  }
  else{
    $(that).find('.wpb_animate_when_almost_visible.wpb_start_animation').removeClass('wpb_start_animation');
  }
}
// onSlideLeave event function
function mcw_vcacnim_reset_osl(that){
  $(that).find('.wpb_animate_when_almost_visible.wpb_start_animation').removeClass('wpb_start_animation');
}
