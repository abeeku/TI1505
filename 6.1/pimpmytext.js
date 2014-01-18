window.onload = function() {
  $("big").onclick = bigger;
  $("bling").onclick = bling;
  $("snoopify").onclick = snoopify;
};

function bigger() {
  $("text").style.fontSize = "20pt";
}

function bling() {
  if($("bling").checked) {
    $("text").className = "bling";
  } else {
    $("text").className = "";
  }
}

function snoopify() {
  var text = $("text").value.toUpperCase();
  var parts = text.split(".");
  $("text").value = parts.join("-izzle.");
}
