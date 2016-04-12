<?php

namespace LogicNow\Chess;

class PieceColorEnum
{
    private static $_instance = false;
    private static $_white;
    private static $_black;
    private static $_enum_map = array(
        1 => "White",
        2 => "Black"
    );
    private $_id;

    private function __construct($_id)
    {
        $this->_id = $_id;
    }

    /**
     * @return PieceColorEnum
     */
    public static function WHITE() : PieceColorEnum
    {
        self::initialise();

        return self::$_white;
    }

    /**
     * @return PieceColorEnum
     */
    public static function BLACK() : PieceColorEnum
    {
        self::initialise();

        return self::$_black;
    }

    private static function initialise()
    {
        if (self::$_instance) {
            return;
        }

        self::$_white = new PieceColorEnum(1);
        self::$_black = new PieceColorEnum(2);
    }
    
    public function __toString()
    {
        return self::$_enum_map[$this->_id];
    }
}