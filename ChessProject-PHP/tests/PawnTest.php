<?php

namespace LogicNow\Chess\Test;

use LogicNow\Chess\{
    ChessBoard,
    MovementTypeEnum,
    PieceColorEnum,
    Pieces\Pawn
};

class PawnTest extends \PHPUnit_Framework_TestCase
{
    /** @var  ChessBoard */
    private $_chessBoard;
    /** @var  Pawn */
    private $_testSubject;
    private $_blackPawn;

    protected function setUp()
    {
        $this->_chessBoard = new ChessBoard();
        $this->_testSubject = new Pawn(PieceColorEnum::WHITE());
        $this->_blackPawn = new Pawn(PieceColorEnum::BLACK());
    }

    public function testChessBoard_Add_TestPawn_White_LegalCoordinates_Sets_Coordinates()
    {
        $added = $this->_chessBoard->add($this->_testSubject, 6, 6);

        $this->assertTrue($added);
        $this->assertEquals(6, $this->_testSubject->getXCoordinate());
        $this->assertEquals(6, $this->_testSubject->getYCoordinate());
    }

    public function testChessBoard_Add_TestPawn_White_InvalidCoordinates_DoesNotAdd()
    {
        $added = $this->_chessBoard->add($this->_testSubject, 7, 7);

        $this->assertFalse($added);
        $this->assertEquals(-1, $this->_testSubject->getXCoordinate());
        $this->assertEquals(-1, $this->_testSubject->getYCoordinate());
    }

    public function testChessBoard_Add_TestPawn_White_OccupiedCoordinates_DoesNotAdd()
    {
        $addedBlack = $this->_chessBoard->add($this->_blackPawn, 3, 3);
        $addedWhite = $this->_chessBoard->add($this->_testSubject, 3, 3);

        $this->assertTrue($addedBlack);
        $this->assertEquals(3, $this->_blackPawn->getXCoordinate());
        $this->assertEquals(3, $this->_blackPawn->getYCoordinate());

        $this->assertFalse($addedWhite);
        $this->assertEquals(-1, $this->_testSubject->getXCoordinate());
        $this->assertEquals(-1, $this->_testSubject->getYCoordinate());
    }

    public function testPawn_White_Move_IllegalCoordinates_Right_DoesNotMove()
    {
        $this->_chessBoard->add($this->_testSubject, 5, 3);
        $moved = $this->_testSubject->move(MovementTypeEnum::MOVE(), 6, 3);

        $this->assertFalse($moved);
        $this->assertEquals(5, $this->_testSubject->getXCoordinate());
        $this->assertEquals(3, $this->_testSubject->getYCoordinate());
    }

    public function testPawn_White_Move_IllegalCoordinates_Left_DoesNotMove()
    {
        $this->_chessBoard->add($this->_testSubject, 5, 3);
        $moved = $this->_testSubject->move(MovementTypeEnum::MOVE(), 4, 3);

        $this->assertFalse($moved);
        $this->assertEquals(5, $this->_testSubject->getXCoordinate());
        $this->assertEquals(3, $this->_testSubject->getYCoordinate());
    }

    public function testPawn_White_Move_InvalidCoordinates_Forward_DoesNotMove()
    {
        $this->_chessBoard->add($this->_testSubject,0, 6);
        $moved = $this->_testSubject->move(MovementTypeEnum::MOVE(), 0, 7);

        $this->assertFalse($moved);
        $this->assertEquals(0, $this->_testSubject->getXCoordinate());
        $this->assertEquals(6, $this->_testSubject->getYCoordinate());
    }

    public function testPawn_White_IllegalCoordinates_Backward_DoesNotMove()
    {
        $this->_chessBoard->add($this->_testSubject,3, 3);
        $moved = $this->_testSubject->move(MovementTypeEnum::MOVE(), 3, 2);

        $this->assertFalse($moved);
        $this->assertEquals(3, $this->_testSubject->getXCoordinate());
        $this->assertEquals(3, $this->_testSubject->getYCoordinate());
    }

    public function testPawn_White_Move_IllegalCoordinates_NoMove_DoesNotMove()
    {
        $this->_chessBoard->add($this->_testSubject,0, 1);
        $moved = $this->_testSubject->move(MovementTypeEnum::MOVE(), 0, 1);

        $this->assertFalse($moved);
        $this->assertEquals(0, $this->_testSubject->getXCoordinate());
        $this->assertEquals(1, $this->_testSubject->getYCoordinate());
    }

    public function testPawn_White_Move_IllegalCoordinates_Occupied_DoesNotMove()
    {
        $this->_chessBoard->add($this->_testSubject,0, 2);
        $this->_chessBoard->add($this->_blackPawn,0, 3);
        $moved = $this->_testSubject->move(MovementTypeEnum::MOVE(), 0, 3);

        $this->assertFalse($moved);
        $this->assertEquals(0, $this->_testSubject->getXCoordinate());
        $this->assertEquals(2, $this->_testSubject->getYCoordinate());
    }
    
    public function testPawn_White_Opening_Move_LegalCoordinates_Forward_One_UpdatesCoordinates()
    {
        $this->_chessBoard->add($this->_testSubject,0, 1);
        $moved = $this->_testSubject->move(MovementTypeEnum::MOVE(), 0, 2);

        $this->assertTrue($moved);
        $this->assertEquals(0, $this->_testSubject->getXCoordinate());
        $this->assertEquals(2, $this->_testSubject->getYCoordinate());
    }
    
    public function testPawn_White_Opening_Move_LegalCoordinates_Forward_Two_UpdatesCoordinates()
    {
        $this->_chessBoard->add($this->_testSubject,0, 1);
        $moved = $this->_testSubject->move(MovementTypeEnum::MOVE(), 0, 3);
        
        $this->assertTrue($moved);
        $this->assertEquals(0, $this->_testSubject->getXCoordinate());
        $this->assertEquals(3, $this->_testSubject->getYCoordinate());
    }

    public function testPawn_White_NonOpening_Move_LegalCoordinates_Forward_One_UpdatesCoordinates()
    {
        $this->_chessBoard->add($this->_testSubject, 6, 3);
        $moved = $this->_testSubject->move(MovementTypeEnum::MOVE(), 6, 4);
        
        $this->assertTrue($moved);
        $this->assertEquals(6, $this->_testSubject->getXCoordinate());
        $this->assertEquals(4, $this->_testSubject->getYCoordinate());
    }

    public function testPawn_White_NonOpening_Move_IllegalCoordinates_Forward_Two_DoesNotMove()
    {
        $this->_chessBoard->add($this->_testSubject, 6, 3);
        $moved = $this->_testSubject->move(MovementTypeEnum::MOVE(), 6, 5);

        $this->assertFalse($moved);
        $this->assertEquals(6, $this->_testSubject->getXCoordinate());
        $this->assertEquals(3, $this->_testSubject->getYCoordinate());
    }
}
