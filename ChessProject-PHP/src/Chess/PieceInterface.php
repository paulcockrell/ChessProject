<?php

namespace LogicNow\Chess;

interface PieceInterface {
    public function getChessBoard() : ChessBoardInterface;
    public function setChessBoard(ChessBoardInterface $chessBoard);
    public function getXCoordinate() : int;
    public function setXCoordinate(int $_xCoordinate);
    public function getYCoordinate() : int;
    public function setYCoordinate(int $_yCoordinate);
    public function getCoordinates() : array;
    public function setCoordinates(int $_xCoordinate, int $_yCoordinate);
    public function getPieceColor() : PieceColorEnum;
    public function setPieceColor(PieceColorEnum $value);
    public function move(MovementTypeEnum $movementTypeEnum, int $newX, int $newY) : bool;
}

?>
