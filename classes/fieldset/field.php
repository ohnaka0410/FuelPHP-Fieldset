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

		$template = $this->template;
		$parts = array();

		// label
		$parts['label'] = $this->label();

		// required
		$parts['required'] = $this->required();

		// error
		$parts['error'] = $this->error();

		// field
		$parts['field'] = $this->field();

		// field
		$parts['hidden'] = $this->hidden();

		// description
		$parts['description'] = $this->description;

		// error_class
		$parts['error_class'] = $this->error_class();

		// value
		$parts['value'] = $this->input();

		// options
		$parts['options'] = $this->options;

		$this->set_template($template);

		return $parts;
	}

	/**
	 * Build the field
	 *
	 * @return  string
	 */
	public function build()
	{
		$form = $this->fieldset()->form();
		$type = $this->get_attribute('tag') ? $this->get_attribute('tag') : $this->type;
		$class = $this->get_attribute('class');
		if ($type_class = $form->get_config($type.'_class', null))
		{
			if (strpos($class, $type_class) === false)
			{
				$class .= ' '.$type_class;
			}
		}
		$this->set_attribute('class', $class);
		return parent::build();
	}

	/**
	 * Build the Label HTML
	 *
	 * @return  string
	 */
	public function label()
	{
		$form = $this->fieldset()->form();
		$template = $this->template;
		$html = $this->set_template('{label}')->build();
		$this->set_template($template);
		return $html;
	}

	/**
	 * Build the Required HTML
	 *
	 * @return  string
	 */
	public function required()
	{
		$form = $this->fieldset()->form();
		$template = $this->template;
		$html = $this->set_template('{required}')->build();
		$this->set_template($template);
		return $html;
	}

	/**
	 * Build the Label HTML
	 *
	 * @return  string
	 */
	public function field()
	{
		$form = $this->fieldset()->form();
		$template = $this->template;
		$class = $this->get_attribute('class');
		if ($this->error())
		{
			$class .= ' '.$form->get_config('invalid_class', null);
		}
		$this->set_attribute('class', $class);

		// field
		$html = $this->set_template('{field}')->build();

		$this->set_template($template);

		return $html;
	}

	/**
	 * Build the Label HTML
	 *
	 * @return  string
	 */
	public function hidden()
	{
		$form = $this->fieldset()->form();
		return $form->hidden($this->name, $this->input(), $this->attributes);
	}

	/**
	 * Build the error message HTML
	 *
	 * @return  string
	 */
	public function error_msg()
	{
		$form = $this->fieldset()->form();
		$template = $this->template;
		$html = $this->set_template('{error_msg}')->build();
		$this->set_template($template);
		return $html;
	}

	/**
	 * Build the error class HTML
	 *
	 * @return  string
	 */
	public function error_class()
	{
		$form = $this->fieldset()->form();
		$template = $this->template;
		$html = $this->set_template('{error_class}')->build();
		$this->set_template($template);
		return $html;
	}
}

/* end of file field.php */
