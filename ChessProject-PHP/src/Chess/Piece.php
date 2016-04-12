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
     * Get piece reference to chessboard
     * 
     * @return ChessBoardInterface
     */
    public final function getChessBoard() : ChessBoardInterface
    {
        return $this->_chessBoard;
    }

    /**
     * Set piece reference to chessboard
     * 
     * @param ChessBoardInterface $chessBoard
     */
    public final function setChessBoard(ChessBoardInterface $chessBoard)
    {
        $this->_chessBoard = $chessBoard;
    }

    /**
     * Get X coordinate
     * 
     * @return int
     */
    public final function getXCoordinate() : int
    {
        return $this->_xCoordinate;
    }

    /**
     * Set X coordinate
     * 
     * @param int $_xCoordinate
     */
    public final function setXCoordinate(int $_xCoordinate)
    {
        $this->_xCoordinate = $_xCoordinate;
    }

    /**
     * Get piece Y coordinate
     * 
     * @return int
     */
    public final function getYCoordinate() : int
    {
        return $this->_yCoordinate;
    }

    /**
     * Set piece Y coordinate
     * 
     * @param int $_yCoordinate
     */
    public final function setYCoordinate(int $_yCoordinate)
    {
        $this->_yCoordinate = $_yCoordinate;
    }

    /**
     * Set piece X and Y coordinates
     * 
     * @param int $_xCoordinate
     * @param int $_yCoordinate
     */
    public final function setCoordinates(int $_xCoordinate, int $_yCoordinate)
    {
        $this->setXCoordinate($_xCoordinate);
        $this->setYCoordinate($_yCoordinate);
    }

    /**
     * Get piece coordinates
     * 
     * @return array
     */
    public final function getCoordinates() : array
    {
        return [
            $this->getXCoordinate(),
            $this->getYCoordinate()
        ];
    }

    /**
     * Get piece color
     * 
     * @return PieceColorEnum
     */
    public final function getPieceColor() : PieceColorEnum
    {
        return $this->_pieceColorEnum;
    }

    /**
     * Set piece color
     * 
     * @param PieceColorEnum $value
     */
    public final function setPieceColor(PieceColorEnum $value)
    {
        $this->_pieceColorEnum = $value;
    }

    /**
     * Move functionality for piece, to be implemented in subclass
     * 
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
     * Generate string based on instance parameters
     * 
     * @return string
     */
    public function __toString() : string
    {
        return <<<EOT
Current X: $this->_xCoordinate
Current Y: $this->_yCoordinate
Color: $this->_pieceColorEnum
EOT;
    }
}
