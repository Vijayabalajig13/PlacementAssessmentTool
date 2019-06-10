window.onload = function() {
  document.addEventListener("contextmenu",function(e){
    e.preventDefault();
  },false);
  document.addEventListener("keydown",function(e){
    if(e.ctrlKey && e.shiftKey && e.keycode == 73){
      disabledEvent(e);
   }
   if(e.ctrlKey && e.shiftKey && e.keycode == 74){
     disabledEvent(e);
   }
 if(e.keycode==83 && (navigator.platform.match("Mac")?e.metaKey:e.ctrlKey)){
  disabledEvent(e);
 }
    if(e.ctrlKey && e.keycode == 85){
      disabledEvent(e);
    }
    if(event.keycode==123){
      disabledEvent(e);
    }
  },false);
  function disabledEvent(e){
    if(e.stopPropagation){
      e.stopPropagation();
    }
    else if(window.event){
      window.event.cancelBubble =true;
    }
    e.preventDefault();
    return false;
  }
};
