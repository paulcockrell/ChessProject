<?php

namespace LogicNow;

class Pawn extends Piece
{
    public function __construct(PieceColorEnum $pieceColorEnum)
    {
        parent::__construct($pieceColorEnum);
    }

    public function move(MovementTypeEnum $movementTypeEnum, int $newX, int $newY) : bool
    {
        $moved = false;
        
    	if ($movementTypeEnum == MovementTypeEnum::MOVE() 
            && $newX == $this->getXCoordinate()
        ) {
	        $this->setXCoordinate($newX);
            $this->setYCoordinate($newY);
            $moved = true;
	    }
        
        return $moved;
    }
}
