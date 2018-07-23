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
	 * Create Fieldset object
	 *
	 * @param   string    $name    Identifier for this fieldset
	 * @param   array     $config  Configuration array
	 * @return  Fieldset
	 */
	public static function forge($name = null, array $config = array())
	{
		$name = is_null($name) ? get_called_class() : $name;

		return parent::forge($name, $config);
	}

	/**
	 * Build the field HTML Parts
	 *
	 * @param   mixed  $action
	 * @return  string
	 */
	public function build_fields($action = null)
	{
		$form = $this->form();

		$fields = array();

		foreach ($this->field() as $field)
		{

			if(in_array($field->name, $this->disabled))
			{
				continue;
			}

			$required_mark = $field->get_attribute('required', null)
				? $form->get_config('required_mark', null)
				: null
			;

			$label = $field->label
				? $form->label(
						$field->label,
						null,
						array(
							'id'    => 'label_'.$field->name,
							'for'   => $field->get_attribute('id', null),
							'class' => $form->get_config('label_class', null)
						)
					)
				: ''
			;

			$error_template = $form->get_config('error_template', '');

			$error_msg = ($form->get_config('inline_errors') && $field->error())
				? str_replace('{error_msg}', $field->error(), $error_template)
				: ''
			;

			$error_class = $field->error()
				? $form->get_config('error_class')
				: ''
			;

			$fields[$field->name] = array(
				'label'         => $label,
				'required_mark' => $required_mark,
				'error_msg'     => ucfirst($error_msg),
				'error_class'   => $error_class,
				'field'         => $field->build(),
				'description'   => $field->description,
			);
		}

		return $fields;
	}
}

/* end of file fieldset.php */
