<?php
namespace LogicNow;

interface iChessBoard
{
	public function add(iPiece $piece, int $_xCoordinate, int $_yCoordinate) : bool;
	public function isLegalBoardPosition($_xCoordinate, $_yCoordinate) : bool;
}

class ChessBoard implements iChessBoard
{
    const MAX_BOARD_WIDTH = 7;
    const MAX_BOARD_HEIGHT = 7;

    private $_pieces;

    public function __construct()
    {
        $this->_pieces = array_fill(0, self::MAX_BOARD_WIDTH, array_fill(0, self::MAX_BOARD_HEIGHT, 0));
    }

	/**
	 * Add a chess piece to the board
	 *
	 * Add a chess piece to the board if a valid board position is given, and the space is not already occupied
	 *
	 * @param \LogicNow\iPiece $piece
	 * @param int $_xCoordinate
	 * @param int $_yCoordinate
	 *
	 * @return bool $added
	 */
    public function add(iPiece $piece, int $_xCoordinate, int $_yCoordinate) : bool
    {
		$added = false;

		if ($this->isLegalBoardPosition($_xCoordinate, $_yCoordinate)
			&& !$this->isDuplicateBoardPosition($_xCoordinate, $_yCoordinate)
		) {
    		$piece->setXCoordinate($_xCoordinate);
		    $piece->setYCoordinate($_yCoordinate);
		    $this->_pieces[$_xCoordinate][$_yCoordinate] = $piece;

			$added = true;
		}
		else {
    		$piece->setXCoordinate(-1);
		    $piece->setYCoordinate(-1);
		}

		return $added;
    }

    /** @return: boolean */
    public function isLegalBoardPosition($_xCoordinate, $_yCoordinate) : bool
    {
    	$isLegal = false;

    	if (($_xCoordinate >= 0 && $_xCoordinate < self::MAX_BOARD_WIDTH)
			&& ($_yCoordinate >= 0 && $_yCoordinate < self::MAX_BOARD_HEIGHT)
		) {
			$isLegal = true;
		}

		return $isLegal;
    }

    /** @return: boolean */
    private function isDuplicateBoardPosition($_xCoordinate, $_yCoordinate) : bool {
		$currentPiece = $this->_pieces[$_xCoordinate][$_yCoordinate];

		return $currentPiece instanceof Piece;
    }
}
