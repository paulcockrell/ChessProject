<?php

namespace LogicNow\Chess\Pieces;

use LogicNow\Chess\{
    Piece,
    PieceColorEnum,
    MovementTypeEnum
};

class Pawn extends Piece
{
    public function __construct(PieceColorEnum $pieceColorEnum)
    {
        parent::__construct($pieceColorEnum);
    }

    /**
     * @param MovementTypeEnum $movementTypeEnum
     * @param int $newX
     * @param int $newY
     * @return bool
     */
    public function move(MovementTypeEnum $movementTypeEnum, int $newX, int $newY) : bool
    {
        $moved = false;
    	if ($movementTypeEnum == MovementTypeEnum::MOVE() 
            && $this->valid_move($newX, $newY)
        ) {
	        $this->setCoordinates($newX, $newY);
            $moved = true;
	    }
        
        return $moved;
    }

    /**
     * Check if the new coordinates is legal for this piece, and the position is vacant
     * 
     * @param int $newX
     * @param int $newY
     * @return bool
     */
    private function valid_move(int $newX, int $newY) : bool
    {
        return $this->getChessBoard()->isVacantBoardPosition($newX, $newY)
               && in_array([$newX, $newY], $this->valid_moves());
    }

    /**
     * Generate array of valid next moves x/y coordinates based on current piece color and position
     * 
     * @return array
     */
    private function valid_moves() : array
    {
        $moves = [];
        
        if ($this->getPieceColor() == PieceColorEnum::BLACK()) {
            array_push($moves, [$this->getXCoordinate(), $this->getYCoordinate() - 1]);
            
            if ($this->getYCoordinate() === 6) {
                array_push($moves, [$this->getXCoordinate(), $this->getYCoordinate() - 2]);
            }
        }
        else {
            array_push($moves, [$this->getXCoordinate(), $this->getYCoordinate() + 1]);

            if ($this->getYCoordinate() === 1) {
                array_push($moves, [$this->getXCoordinate(), $this->getYCoordinate() + 2]);
            }
        }
        
        return $moves;
    }
}
