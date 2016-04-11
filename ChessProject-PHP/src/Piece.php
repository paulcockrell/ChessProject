<?php

namespace LogicNow;

interface iPiece {
    public function getChessBoard() : iChessBoard;
    public function setChessBoard(ChessBoard $chessBoard);
    public function getXCoordinate() : int;
    public function setXCoordinate(int $value);
    public function getYCoordinate() : int;
    public function setYCoordinate(int $value);
    public function getPieceColor() : PieceColorEnum;
    public function setPieceColor(PieceColorEnum $value);
    public function move(MovementTypeEnum $movementTypeEnum, int $newX, int $newY) : bool;
    public function toString() : string;
}

abstract class Piece implements iPiece
{
    /** @var PieceColorEnum */
    private $_pieceColorEnum;
    /** @var  ChessBoard */
    private $_chessBoard;
    /** @var  int */
    private $_xCoordinate = -1;
    /** @var  int */
    private $_yCoordinate = -1;

    public function __construct(PieceColorEnum $pieceColorEnum)
    {
        $this->_pieceColorEnum = $pieceColorEnum;
    }

    public function getChessBoard() : iChessBoard
    {
        return $this->_chessBoard;
    }

    public function setChessBoard(ChessBoard $chessBoard)
    {
        $this->_chessBoard = $chessBoard;
    }

    public function getXCoordinate() : int
    {
        return $this->_xCoordinate;
    }

    public function setXCoordinate(int $value)
    {
        $this->_xCoordinate = $value;
    }

    public function getYCoordinate() : int
    {
        return $this->_yCoordinate;
    }

    public function setYCoordinate(int $value)
    {
        $this->_yCoordinate = $value;
    }

    public function getPieceColor() : PieceColorEnum
    {
        return $this->_pieceColorEnum;
    }

    public function setPieceColor(PieceColorEnum $value)
    {
        $this->_pieceColorEnum = $value;
    }

    public function move(MovementTypeEnum $movementTypeEnum, int $newX, int $newY) : bool
    {
        \throwException("Move not implemented");
    }

    public function toString() : string
    {
        return $this->currentPositionAsString();
    }

    private function currentPositionAsString() : string
    {
        return <<<EOT
Current X: $this->_xCoordinate
Current Y: $this->_yCoordinate
Piece Color: $this->_pieceColorEnum
EOT;
    }
}
