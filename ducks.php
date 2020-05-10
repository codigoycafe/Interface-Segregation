<?php
/**
 * Este código se utilizó de ejemplo para ilustrar el principio de segregación
 * de interfaces, para el canal de youtube Código y Café.
 *
 * Para ver el video de explicación: https://youtu.be/BaNEVg4tAzQ
 */

interface CanPlay
{
    public function play();
}

interface CanFloat
{
    public function float();
}

interface CanQuack
{
    public function quack();
}

class Duck implements CanFloat, CanQuack, CanPlay
{
    public function float()
    {
        echo "The duck is floating\n";
    }

    public function quack()
    {
        echo "The duck is quacking\n";
    }

    public function play()
    {
        $this->float();
        $this->quack();
    }
}

class WoodenDuck implements CanFloat, CanPlay
{
    public function float()
    {
        echo "The wooden duck is floating\n";
    }

    public function play()
    {
        $this->float();
    }
}

class Frog implements CanPlay
{
    public function play()
    {
        echo "The frog is playing\n";
    }
}

class Robot implements CanPlay
{
    public function play()
    {
        echo "The robot is dancing\n";
    }
}

class Pond
{
    public function sendToPlay(CanPlay $player)
    {
        $player->play();
    }
}

$pond = new Pond();
$pond->sendToPlay(new Duck());
$pond->sendToPlay(new WoodenDuck());
$pond->sendToPlay(new Frog());
$pond->sendToPlay(new Robot());
