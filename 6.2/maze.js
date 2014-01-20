function youlose() {
  $$(".boundary").forEach(
    function(boundary) {
      boundary.addClassName("youlose");
    }
  );
}

function start() {
  $$(".boundary").forEach(
    function(boundary) {
      boundary.removeClassName("youlose");
    }
  );
}

function end() {
  if ($$(".youlose").length === 0 ) {
    alert("you win");
  }
}

window.onload = function() {
  $$(".boundary").forEach(
    function(boundary) {
      boundary.onmouseover = youlose;
    }
  );

  $("start").onclick = start;
  $("end").onmouseover = end;
};
