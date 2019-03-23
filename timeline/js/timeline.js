function Highlight(name, color) {
  var img = document.getElementsByClassName(name);
  var parent = document.getElementById(name);
  var border;

  if (name == "Melioo") border = "2px solid " + color;
  if (name == "Syraleaf") border = "2px solid " + color;

  for (var i = 0; i < img.length; i++) {
    if (img[i].style.border != border) {
      parent.style.boxShadow = "2px 2px 16px 4px rgba(0,0,0,0.5)";
      parent.style.transition = "box-shadow 100ms linear";

      img[i].style.border = border;
      img[i].style.boxShadow =
        "4px 4px 4px rgba(0, 0, 0, 0.25), 0 0 4px rgba(0, 0, 0, 0.25)";
      img[i].style.transition = "border 100ms linear";
      img[i].style.transition = "box-shadow 100ms linear";
    } else {
      parent.style.boxShadow = "none";
      parent.style.transition = "box-shadow 100ms linear";

      img[i].style.border = "none";
      img[i].style.boxShadow =
        "2px 2px 2px rgba(0, 0, 0, 0.15), 0 0 1px rgba(0, 0, 0, 0.15)";
      img[i].style.transition = "border 100ms linear";
      img[i].style.transition = "box-shadow 100ms linear";
    }
  }
}
