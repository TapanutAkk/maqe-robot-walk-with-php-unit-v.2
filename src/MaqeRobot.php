<?php
namespace Net;

class MaqeRobot
{

    const NORTH = 0;
    const EAST = 1;
    const SOUTH = 2;
    const WEST = 3;

    const POSITION_X = 0;
    const POSITION_Y = 0;
    const DIRECTION = 'North';
    const ARRAY_DIRECTION = array('North','East','South','West');

    private $arrayWalkingOrders;
    private $direction;
    private $arrayDirection;
    private $positionX;
    private $positionY;

    public function __construct($walkingOrders)
    {

        preg_match_all("/[RLW][0-9]*/", $walkingOrders, $arrayWalkingOrders, PREG_PATTERN_ORDER);
        
        $this->arrayWalkingOrders = $arrayWalkingOrders[0];
        $this->direction = self::DIRECTION;
        $this->arrayDirection = self::ARRAY_DIRECTION;
        $this->positionX = self::POSITION_X;
        $this->positionY = self::POSITION_Y;

    }

    private function findDirection($keyDirection, $check_direction, $change_direction, $arrayDirection)
    {

        if ($keyDirection == $check_direction) {
            $keyDirection = $change_direction;
        }

        return $arrayDirection[$keyDirection];

    }
    
    private function findDistance($direction, $distance, $positionX, $positionY)
    {

        switch ($direction) {
            case 'North':
                $positionY += $distance;
                break;
            case 'East':
                $positionX += $distance;
                break;
            case 'South':
                $positionY -= $distance;
                break;
            case 'West':
                $positionX -= $distance;
                break;
            default:
                break;
        }

        return [
            'x' => $positionX,
            'y' => $positionY
        ];

    }

    public function walk()
    {

        foreach ($this->arrayWalkingOrders as $arrayWalkingOrder) {
            $keyDirection = array_search($this->direction, $this->arrayDirection);
            switch ($arrayWalkingOrder) {
                case 'R':
                    $keyDirection++;
                    $this->direction = $this->findDirection($keyDirection, 4, self::NORTH, $this->arrayDirection);
                    break;
                case 'L':
                    $keyDirection--;
                    $this->direction = $this->findDirection($keyDirection, -1, self::WEST, $this->arrayDirection);
                    break;
                default:
                    $distance = str_replace("W", "", $arrayWalkingOrder);
                    $position = $this->findDistance($this->direction, $distance, $this->positionX, $this->positionY);
                    $this->positionX = $position['x'];
                    $this->positionY = $position['y'];
                    break;
            }
        }
        
        return "X: $this->positionX Y: $this->positionY Direction: $this->direction";

    }
}
