<?php

namespace ErwinWijnveld\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) {
	exit();
} // Exit if accessed directly

class Herogradient extends Widget_Base
{
	public function get_name()
	{
		return 'herogradient';
	}

	public function get_title()
	{
		return 'Hero Gradient - Erwin Wijnveld';
	}

	public function get_icon()
	{
		return 'fa fa-cannabis';
	}

	public function get_categories()
	{
		return ['erwinwijnveld'];
	}

	protected function _register_controls()
	{
		$this->start_controls_section('section_content', [
			'label' => 'Settings',
		]);

		$this->add_control('content', [
			'label' => 'Content',
			'type' => \Elementor\Controls_Manager::WYSIWYG,
			'placeholder' => 'Voeg hier je content toe',
		]);

		$this->end_controls_section();
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display(); ?>
		<section>

			<div class="herogradient bg-black text-white" <?php echo $this->get_render_attribute_string(
   	'content'
   ); ?>>
					<?php echo $settings['content']; ?>
				</div>
			</div>
		</section>
		<?php
	}

	protected function _content_template()
	{
		?>
		<section>
			<div class="herogradient bg-black text-white">
				{{{ settings.content }}}
			</div>
		</section>
        <?php
	}
}
