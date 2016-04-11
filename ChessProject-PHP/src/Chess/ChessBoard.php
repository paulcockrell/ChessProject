<?php

namespace LogicNow\Chess;

class ChessBoard implements ChessBoardInterface
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
	 * @param \LogicNow\Chess\PieceInterface $piece
	 * @param int $_xCoordinate
	 * @param int $_yCoordinate
	 *
	 * @return bool $added
	 */
    public function add(PieceInterface $piece, int $_xCoordinate, int $_yCoordinate) : bool
    {
		$isAdded = false;

		if ($this->isVacantBoardPosition($_xCoordinate, $_yCoordinate)) {
    		$piece->setCoordinates($_xCoordinate, $_yCoordinate);
		    $this->_pieces[$_xCoordinate][$_yCoordinate] = $piece;

			$isAdded = true;
		}
		else {
            $piece->setCoordinates(-1, -1);
		}

		return $isAdded;
    }

	/**
	 * @param int $_xCoordinate
	 * @param int $_yCoordinate
	 * @return bool
	 */
    public function isLegalBoardPosition(int $_xCoordinate, int $_yCoordinate) : bool
    {
    	$isLegal = false;

    	if (($_xCoordinate >= 0 && $_xCoordinate < self::MAX_BOARD_WIDTH)
			&& ($_yCoordinate >= 0 && $_yCoordinate < self::MAX_BOARD_HEIGHT)
		) {
			$isLegal = true;
		}

		return $isLegal;
    }

    /**
     * @param int $_xCoordinate
     * @param int $_yCoordinate
     * @return bool
     */
    private function isVacantBoardPosition(int $_xCoordinate, int $_yCoordinate) : bool
    {
        $isVacant = false;

        if ($this->isLegalBoardPosition($_xCoordinate, $_yCoordinate)) {
            $currentPiece = $this->_pieces[$_xCoordinate][$_yCoordinate];
            $isVacant = !($currentPiece instanceof Piece);
        }

        return $isVacant;
    }
}
