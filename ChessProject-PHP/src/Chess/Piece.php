<?php

namespace LogicNow\Chess;

abstract class Piece implements PieceInterface
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

    /**
     * @return ChessBoardInterface
     */
    public final function getChessBoard() : ChessBoardInterface
    {
        return $this->_chessBoard;
    }

    /**
     * @param ChessBoardInterface $chessBoard
     */
    public final function setChessBoard(ChessBoardInterface $chessBoard)
    {
        $this->_chessBoard = $chessBoard;
    }

    /**
     * @return int
     */
    public final function getXCoordinate() : int
    {
        return $this->_xCoordinate;
    }

    /**
     * @param int $_xCoordinate
     */
    public final function setXCoordinate(int $_xCoordinate)
    {
        $this->_xCoordinate = $_xCoordinate;
    }

    /**
     * @return int
     */
    public final function getYCoordinate() : int
    {
        return $this->_yCoordinate;
    }

    /**
     * @param int $_yCoordinate
     */
    public final function setYCoordinate(int $_yCoordinate)
    {
        $this->_yCoordinate = $_yCoordinate;
    }
    
    public final function setCoordinates(int $_xCoordinate, int $_yCoordinate)
    {
        $this->setXCoordinate($_xCoordinate);
        $this->setYCoordinate($_yCoordinate);
    }
    
    public final function getCoordinates() : array
    {
        return [
            $this->getXCoordinate(),
            $this->getYCoordinate()
        ];
    }

    /**
     * @return PieceColorEnum
     */
    public final function getPieceColor() : PieceColorEnum
    {
        return $this->_pieceColorEnum;
    }

    /**
     * @param PieceColorEnum $value
     */
    public final function setPieceColor(PieceColorEnum $value)
    {
        $this->_pieceColorEnum = $value;
    }

    /**
     * @param MovementTypeEnum $movementTypeEnum
     * @param int $newX
     * @param int $newY
     * @return bool
     */
    public function move(MovementTypeEnum $movementTypeEnum, int $newX, int $newY) : bool
    {
        \throwException("Move not implemented");
    }

    /**
     * @return string
     */
    public function toString() : string
    {
        return $this->currentPositionAsString();
    }

    /**
     * @return string
     */
    private function currentPositionAsString() : string
    {
        return <<<EOT
Current X: $this->_xCoordinate
Current Y: $this->_yCoordinate
Pieces Color: $this->_pieceColorEnum
EOT;
    }
}
