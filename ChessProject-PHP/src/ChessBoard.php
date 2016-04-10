<?php

namespace LogicNow;

use LogicNow\Pawn;

class ChessBoard
{

    const MAX_BOARD_WIDTH = 7;
    const MAX_BOARD_HEIGHT = 7;

    private $_pieces;

    public function __construct()
    {
        $this->_pieces = array_fill(0, self::MAX_BOARD_WIDTH, array_fill(0, self::MAX_BOARD_HEIGHT, 0));
    }

    public function add(Pawn $pawn, $_xCoordinate, $_yCoordinate, PieceColorEnum $pieceColor)
    {
	if ($this->isLegalBoardPosition($_xCoordinate, $_yCoordinate) && 
	    !$this->isDuplicateBoardPosition($_xCoordinate, $_yCoordinate)) {
    	    $pawn->setXCoordinate($_xCoordinate);
	    $pawn->setYCoordinate($_yCoordinate);
	    $this->_pieces[$_xCoordinate][$_yCoordinate] = $pawn;
	}
	else {
    	    $pawn->setXCoordinate(-1);
	    $pawn->setYCoordinate(-1);
	}
    }

    /** @return: boolean */
    public function isLegalBoardPosition($_xCoordinate, $_yCoordinate)
    {
    	$isLegal = false;

    	if (($_xCoordinate >= 0 && $_xCoordinate < self::MAX_BOARD_WIDTH) &&
	    ($_yCoordinate >= 0 && $_yCoordinate < self::MAX_BOARD_HEIGHT))
	    $isLegal = true;

	return $isLegal;
    }

    /** @return: boolean */
    private function isDuplicateBoardPosition($_xCoordinate, $_yCoordinate) {
	$currentPiece = $this->_pieces[$_xCoordinate][$_yCoordinate];

	return $currentPiece instanceof Pawn;
    }
}
