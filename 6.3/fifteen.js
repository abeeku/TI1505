var emptyX = 300;
var emptyY = 300;
var pieces;

document.observe("dom:loaded",function(){
	initialize();
	setMovablePieces();
	
	$("shufflebutton").observe("click",shuffle);
});

function initialize() {
	pieces = $$("#puzzlearea > div");
	
	for(var i=0; i<pieces.length; i++) {
		pieces[i].addClassName("puzzlepiece");
		var left = (i % 4) * 100;
		var top = Math.floor(i / 4) * 100;
		pieces[i].style.left = left + "px";
		pieces[i].style.top = top + "px";
		pieces[i].style.backgroundPosition = -left + "px " + -top + "px";
	}
}

function setMovablePieces() {
	for(var i=0; i<pieces.length; i++) {	
		var curX = parseInt(pieces[i].style.left); // ### Get the x of the current piece
		var curY = parseInt(pieces[i].style.top); // ### Get the y of the current piece
		
		if(isMovable(curX,curY)) {
			// ### piece has the style of a movable piece
			// ### piece can be clicked to move it
			pieces[i].addClassName("movablepiece");
			pieces[i].observe("click", moveThis);
		} else {
			// ### piece no longer has the style of a movable piece
			// ### piece can no longer be clicked to move it
			pieces[i].removeClassName("movablepiece");
			pieces[i].stopObserving("click", moveThis);
		}
	}
}

function isMovable(x,y) {
	// ### returns true if te piece at (x,y) is next to the empty square at (emptyX,emptyY)
	var isMovable = false;
	if ((Math.abs(emptyX - x) + Math.abs(emptyY - y)) == 100) {
		isMovable = true;
	}
	return isMovable;
}

function moveThis() {
	move(this, false);
}

function move(piece, shuffle) {
	var curX = parseInt(piece.style.left); // ### Get the x of the current piece (almost the same as in setMovablePieces)
	var curY = parseInt(piece.style.top); // ### Get the y of the current piece (almost the same as in setMovablePieces)
	
	if (shuffle) {
		piece.style.left = emptyX + "px";
		piece.style.top = emptyY + "px";
	} else {
		new Effect.Move(piece, { x: emptyX, y: emptyY, mode: 'absolute', afterFinish: setMovablePieces });
	}
	
	// ### move the piece to the empty location
	emptyX = curX;
	emptyY = curY;
	
	setMovablePieces(); 
}

function shuffle() {
	// ### Implementation of the shuffle algorithm
	for (var i = 0; i < 1000; i++) {
		var movable = $$(".movablepiece");
		var piece = movable[Math.floor(Math.random() * movable.length)];
		move(piece, true);
	}
}

