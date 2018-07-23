<?php
/**
 * Fuel is a fast, lightweight, community driven PHP 5.4+ framework.
 *
 * @package    Fuel
 * @version    1.8.1
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2018 Fuel Development Team
 * @link       http://fuelphp.com
 */

/**
 * Fuel Fieldset Package.
 *
 * @package     Fuel
 * @subpackage  Fieldset
 * @author      ohnaka
 * @license     MIT License
 * @copyright   2018 ohnaka
 * @link        https://github.com/ohnaka0410/FuelPHP-Fieldset
 */

\Autoloader::add_core_namespace('Fuel\\Fieldset');

\Autoloader::add_classes(array(
	'Fuel\\Fieldset\\Fieldset'   => __DIR__.'/classes/fieldset.php',
));
