<?php
namespace Controllers;

abstract class AbstractSubject
{
    #abstract public function attach(Events\NewEvent $observer_in);
    #abstract public function detach(NewEvent $observer_in);
    abstract public function notify();
}
