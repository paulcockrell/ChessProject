<?php

namespace LogicNow\Chess;

interface ChessBoardInterface
{
    public function add(PieceInterface $piece, int $_xCoordinate, int $_yCoordinate) : bool;
    public function isLegalBoardPosition(int $_xCoordinate, int $_yCoordinate) : bool;
    public function isVacantBoardPosition(int $_xCoordinate, int $_yCoordinate) : bool;
}

?>
