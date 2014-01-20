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
		// ### For each puzzle piece make sure that
		// ### - it is at the correct position
		// ### - the background is correct
	}
}

function setMovablePieces() {
	for(var i=0; i<pieces.length; i++) {	
		var curX = undefined; // ### Get the x of the current piece
		var curY = undefined; // ### Get the y of the current piece
		
		if(isMovable(curX,curY)) {
			// ### piece has the style of a movable piece
			// ### piece can be clicked to move it
		} else {
			// ### piece no longer has the style of a movable piece
			// ### piece can no longer be clicked to move it
		}
	}
}

function isMovable(x,y) {
	// ### returns true if te piece at (x,y) is next to the empty square at (emptyX,emptyY)
	return undefined;
}

function moveThis() {
	move(this);
}

function move(piece) {
	var curX = undefined; // ### Get the x of the current piece (almost the same as in setMovablePieces)
	var curY = undefined; // ### Get the y of the current piece (almost the same as in setMovablePieces)
	
	// ### move the piece to the empty location
	
	setMovablePieces(); 
}

function shuffle() {
	// ### Implementation of the shuffle algorithm
}