<?php
/**
 *COPYRIGHT (C) 2016 Tyler Jones. All Rights Reserved.
 * Element.php
 * Solves CS174 Hw3
 * @author Tyler Jones
*/
namespace soloRider\hw3\views\elements;

/**
 * Base class for all Elements used in hw3
 */
abstract class Element
{
    /**
     * This method should be overriden
     */
    public abstract function render($data);
}