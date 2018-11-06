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
class Fieldset_Field extends \Fuel\Core\Fieldset_Field
{

	/**
	 * Build the field HTML Parts
	 *
	 * @param   mixed  $action
	 * @return  string
	 */
	public function build_parts($action = null)
	{
		$form = $this->fieldset()->form();

		$parts = array();

		// field_template
		$template = $this->template;

		// label
		$parts['label'] = $this->set_template('{label}')->build();

		// required
		$parts['required'] = $this->set_template('{required}')->build();

		// field
		$parts['field'] = $this->set_template('{field}')->build();

		// field
		$parts['hidden'] = $form->hidden($this->name, $this->input(), $this->attributes);

		// description
		$parts['description'] = $this->set_template('{description}')->build();

		// error_class
		$parts['error_class'] = $this->set_template('{error_class}')->build();

		// value
		$parts['value'] = $this->input();

		// error
		$parts['error'] = $this->error();

		// options
		$parts['options'] = $this->options;

		$this->set_template($template);

		return $parts;
	}
}

/* end of file field.php */
