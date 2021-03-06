<?php
/**
 * /Documentation/Model/Lipsum.php
 *
 * @package UpMvc2\Documentation
 */

namespace Documentation\Model;

use UpMvc;
use UpMvc\Container as Up;

/**
 * Exempelmodel.
 *
 * @package UpMvc2\Documentation
 * @author  Ola Waljefors
 * @version 2013.1.1
 * @link    https://github.com/saurid/UpMvc2
 * @link    http://www.phpportalen.net/viewtopic.php?t=116968
 */
class Lipsum
{
    /**
     * "Hämtar data" från model-lagret.
     *
     * @return string Lorem Ipsum text.
     */
    public function get()
    {
        $output = '
            Lorem ipsum dolor sit amet, consectetur adipisicing elit,
            sed do eiusmod tempor incididunt ut labore et dolore magna
            aliqua. Ut enim ad minim veniam, quis nostrud exercitation
            ullamco laboris nisi ut aliquip ex ea commodo consequat.
            Duis aute irure dolor in reprehenderit in voluptate velit
            esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
            occaecat cupidatat non proident, sunt in culpa qui officia
            deserunt mollit anim id est laborum.
        ';

        return $output;
    }
}
