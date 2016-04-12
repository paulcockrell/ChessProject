<?php

namespace LogicNow\Chess;

class ChessBoard implements ChessBoardInterface
{
    const MAX_BOARD_WIDTH = 7;
    const MAX_BOARD_HEIGHT = 7;

    private $_pieces;

    public function __construct()
    {
        $this->_pieces = array_fill(0, self::MAX_BOARD_WIDTH, array_fill(0, self::MAX_BOARD_HEIGHT, null));
    }

    /**
     * Add a chess piece to the board
     *
     * Add a chess piece to the board if vacant board position
     *
     * @param \LogicNow\Chess\PieceInterface $piece
     * @param int $_xCoordinate
     * @param int $_yCoordinate
     *
     * @return bool $added
     */
    public function add(PieceInterface $piece, int $_xCoordinate, int $_yCoordinate) : bool
    {
        if ($this->isVacantBoardPosition($_xCoordinate, $_yCoordinate)) {
            $piece->setChessBoard($this);
            $piece->setCoordinates($_xCoordinate, $_yCoordinate);
            $this->_pieces[$_xCoordinate][$_yCoordinate] = $piece;
        
            $isAdded = true;
        }
        else {
            $piece->setCoordinates(-1, -1);
    
            $isAdded = false;
	}

	return $isAdded;
    }

    /**
     * Check if legal board position is vacant
     * 
     * @param int $_xCoordinate
     * @param int $_yCoordinate
     * @return bool
     */
    public function isVacantBoardPosition(int $_xCoordinate, int $_yCoordinate) : bool
    {
        return $this->getPieceAtBoardPosition($_xCoordinate, $_yCoordinate);
    }

    /**
     * Get piece if present at legal board position
     * 
     * @param int $_xCoordinate
     * @param int $_yCoordinate
     * @param null &$piece (optional)
     * @return bool
     */
    public function getPieceAtBoardPosition(int $_xCoordinate, int $_yCoordinate, &$piece = null) : bool
    {
        if ($this->isLegalBoardPosition($_xCoordinate, $_yCoordinate)) {
    	    $piece = $this->_pieces[$_xCoordinate][$_yCoordinate];
            $gotPiece = is_null($piece);
        }
        else {
            $gotPiece = false;
        }
    
    	return $gotPiece;
    }

    /**
     * Check if coordinates are legal board position
     *
     * @param int $_xCoordinate
     * @param int $_yCoordinate
     * @return bool
     */
    public function isLegalBoardPosition(int $_xCoordinate, int $_yCoordinate) : bool
    {
        if (($_xCoordinate >= 0 && $_xCoordinate < self::MAX_BOARD_WIDTH)
            && ($_yCoordinate >= 0 && $_yCoordinate < self::MAX_BOARD_HEIGHT)
        ) {
            $isLegal = true;
        }
        else {
            $isLegal = false;
        }

        return $isLegal;
    }
}
