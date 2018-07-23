# Fuel Fieldset Package.

## Overview
This Package provide Fieldset class for various layouts.

## Installing

Simply add `fieldset` to your config.php `always_loaded.packages` config option.

## Usage

```php:fuel/app/classes/fieldset/sample.php
class Fieldset_Sample extends \Fuel\Fieldset\Fieldset
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
		$fieldset = parent::forge(name, config);

		// add name
		$fieldset->add(
			'name',
			'Full name',
			array(
				'type' => 'name',
				'class' => 'pretty_input'
			),
			array(
				array(
					'required'
				),
				array(
					'valid_string',
					array(
						'alpha-numeric',
						'dots',
						'spaces'
					)
				)
			)
		);

	}
}

```

```php:fuel/app/classes/controller/sample.php
class Controller_Sample extends Controller
{
	/**
	 * Index Action
	 *
	 * @return  string
	 */
	public function action_index()
	{
		$fieldset = Fieldset_Sample::forge();

		$mode = Input::post('button');

		if ($mode === 'confirm')
		{
			// confirm
			$validation = $fieldset->validation();

			if ($validation->run())
			{
				// validation OK
				$fields = $validation->validated();

				// create view
				$view = Presenter::forge('sample/confirm');
				// set fields
				$view->set('fields', $fields);
				// show confirm view
				return Response::forge($view);
			}
			else
			{
				// validation NG

				// set input values
				$fieldset->repopulate();
			}
		}
		else if ($mode === 'exec')
		{
			// exec
			$validation = $fieldset->validation();

			if ($validation->run())
			{
				// validation OK
				$fields = $validation->validated();

				// Do Exec

				// redirect to complete
				Response::redirect('sample/complete', 'location', 303);

			}
			else
			{
				// validation NG

				// set input values
				$fieldset->repopulate();
			}
		}
		else if ($mode === 'back')
		{
			// back

			// set input values
			$fieldset->repopulate();
		}

		// create view
		$view = Presenter::forge('sample/input');
		// set fields
		$view->set_safe('fields', $fieldset->build_field());
		// show confirm view
		return Response::forge($view);
	}

	/**
	 * Complete Action
	 *
	 * @return  string
	 */
	public function action_complete()
	{
		// create view
		$view = Presenter::forge('sample/complete');
		// show complete view
		return Response::forge($view);
	}
}

```

```php:fuel/app/views/sample/input.php
// input view
<?php echo \Form::open().PHP_EOL; ?>
	<div class="form-group <?php echo \Arr::get($fields, 'name.error_class') ?>">
		<label>Full name</label>
		<?php echo \Arr::get($fields, 'name.field'); ?>
	</div>
	<button type="submit" class="btn btn-default" value="confirm">Confirm</button>
<?php echo \Form::close().PHP_EOL; ?>

```

```php:fuel/app/views/sample/confirm.php
// confirm view
<?php echo \Form::open().PHP_EOL; ?>
	<div class="form-group <?php echo \Arr::get($fields, 'name.error_class') ?>">
		<label>Full name</label>
		<?php echo \Arr::get($fields, 'name').PHP_EOL; ?>
		<?php echo \Form::hidden('name', \Arr::get($fields, 'name')).PHP_EOL; ?>
	</div>
	<button type="submit" class="btn btn-default" value="back">Back</button>
	<button type="submit" class="btn btn-default" value="exec">Submit</button>
<?php echo \Form::close().PHP_EOL; ?>

```
