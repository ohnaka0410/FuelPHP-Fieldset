<?php
/**
 * Fuel is a fast, lightweight, community driven PHP 5.4+ framework.
 **
 * @package    Fuel
 * @version    1.8.1
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2018 Fuel Development Team
 * @link       http://fuelphp.com
 */

namespace Fuel\Fieldset;

/**
 * Define a set of fields that can be used to generate a form or to validate input.
 *
 * @package     Fuel
 * @subpackage  Fieldset
 * @author      ohnaka
 * @license     MIT License
 * @copyright   2018 ohnaka
 * @link        https://github.com/ohnaka0410/FuelPHP-Fieldset
 */
class Fieldset extends \Fuel\Core\Fieldset
{
	/**
	 * Build the field HTML Parts
	 *
	 * @return  string
	 */
	public function build_fields()
	{
		$fields = array();

		foreach ($this->field() as $f)
		{
			in_array($f->name, $this->disabled) or $fields[$f->name] = $f->build_parts();
		}

		return $fields;
	}
}

/* end of file fieldset.php */
