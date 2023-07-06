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

		$this->add_control('image', [
			'label' => 'Image',
			'type' => \Elementor\Controls_Manager::MEDIA,
			'default' => [
				'url' => \Elementor\Utils::get_placeholder_image_src(),
			],
		]);

		$this->add_control('content', [
			'label' => 'Content',
			'type' => \Elementor\Controls_Manager::WYSIWYG,
			'placeholder' => 'Voeg hier je content toe',
		]);

		// elementor button with link and title
		$this->add_control('button', [
			'label' => 'Button',
			'type' => \Elementor\Controls_Manager::URL,
			'placeholder' => 'https://your-link.com',
			'show_external' => true,
			'default' => [
				'url' => '',
				'is_external' => true,
				'nofollow' => true,
			],
		]);

		$this->add_control('button_title', [
			'label' => 'Button Title',
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => 'Button',
		]);

		$this->end_controls_section();
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display(); ?>
		<section class="relative mb-14 md:mb-0 min-h-[550px] pb-24 pt-24 lg:pb-4 lg:pt-4 lg:h-[calc(100vh_-_89px)] -mt-1 bg-white z-10">

			<!-- background image desktop -->
			<img class="!h-full w-full absolute bottom-0 object-bottom my-hide lg:block object-cover -z-10" src="<?= plugin_dir_url(
   	__DIR__
   ) . 'assets/images/gradientbg.svg' ?>" alt="Image">

<!-- background image ipad -->
<img class="!h-full w-full absolute lg:my-hide bottom-0 object-bottom object-cover -z-10" src="<?= plugin_dir_url(
	__DIR__
) . 'assets/images/ipadgradientbg.svg' ?>" alt="Image">

<!-- background image mobile -->
<img class="!h-full w-full absolute md:my-hide bottom-0 object-bottom object-cover -z-10" src="<?= plugin_dir_url(
	__DIR__
) . 'assets/images/mobilegradientbg.svg' ?>" alt="Image">


	<!-- container -->
	<div class="container h-full flex flex-wrap-reverse lg:flex-nowrap items-center justify-end">

		<!-- image -->
		<div class="lg:absolute max-w-[1100px] aspect-video lg:inset-y-0 lg:left-0 scale-125 origin-right -translate-x-8 lg:top-1/2 lg:-translate-y-1/2 lg:!w-1/2 z-10">

			<!-- device -->
			<img class="!w-full !h-full absolute z-10 inset-0 object-contain object-right" src="<?= plugin_dir_url(
   	__DIR__
   ) . 'assets/images/device.png' ?>" alt="Image">

			<!-- elementor image -->
			<img class="!w-full relative clipfordevice !h-full object-cover object-left-top " src="<?= $settings[
   	'image'
   ]['url'] ?>">
			
		</div>


  	
		<div class="w-full lg:w-1/2 lg:pl-4 mb-32 lg:mb-0">
			<div class="content mb-10 [&_h1]:leading-[.9] [&_p]:leading-[1.8] [&_h1]:mb-6 [&_p]:text-lg [&_p]:text-[#515151]" <?= $this->get_render_attribute_string(
   	'content'
   ) ?>><?= $settings['content'] ?></div>

			<!-- button -->
			<?php if ($settings['button']['url']) { ?>
				<a class="inline-flex bg-black group rounded-full items-center text-white gap-4 font-bold py-[11px] px-4" href="<?= $settings[
    	'button'
    ]['url'] ?>" <?= $this->get_render_attribute_string(
	'button'
) ?>><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 group-hover:translate-x-2 transition duration-300">
  <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
</svg>


<?= $settings['button_title'] ?>
</a>
			<?php } ?>
		</div>
		</div>
				
		</section>
		<?php
	}

	protected function _content_template()
	{
		?>
	<section class="relative mb-14 md:mb-0 min-h-[550px] pb-24 pt-24 lg:pb-4 lg:pt-4 lg:h-[calc(100vh_-_89px)] -mt-1 bg-white z-10">
				<!-- background image desktop -->
				<img class="!h-full w-full absolute bottom-0 object-bottom my-hide lg:block object-cover -z-10" src="<?= plugin_dir_url(
    	__DIR__
    ) . 'assets/images/gradientbg.svg' ?>" alt="Image">
			 
			 <!-- background image ipad -->
			 <img class="!h-full w-full absolute lg:my-hide bottom-0 object-bottom object-cover -z-10" src="<?= plugin_dir_url(
    	__DIR__
    ) . 'assets/images/ipadgradientbg.svg' ?>" alt="Image">
			 
			 <!-- background image mobile -->
			 <img class="!h-full w-full absolute md:my-hide bottom-0 object-bottom object-cover -z-10" src="<?= plugin_dir_url(
    	__DIR__
    ) . 'assets/images/mobilegradientbg.svg' ?>" alt="Image">


		<!-- container -->
		<div class="container h-full flex flex-wrap-reverse lg:flex-nowrap items-center justify-end">
			<!-- image -->
			<div class="lg:absolute max-w-[1100px] aspect-video lg:inset-y-0 lg:left-0 scale-125 origin-right -translate-x-8 lg:top-1/2 lg:-translate-y-1/2 lg:!w-1/2 z-10">
			<!-- device -->
			<img class="!w-full !h-full absolute z-10 inset-0 object-contain object-right" src="<?= plugin_dir_url(
   	__DIR__
   ) . 'assets/images/device.png' ?>" alt="Image">				
   <!-- elementor image -->
				<img class="!w-full relative clipfordevice !h-full object-cover object-left-top " src="{{{ settings.image.url }}}">
			</div>
			<div class="w-full lg:w-1/2 lg:pl-4 mb-32 lg:mb-0">
				<div class="content mb-10 [&_h1]:leading-[.9] [&_p]:leading-[1.8] [&_h1]:mb-6 [&_p]:text-lg [&_p]:text-[#515151]">{{{ settings.content }}}</div>
				<!-- button -->
				<# if (settings.button.url) { #>
					<a class="inline-flex bg-black group rounded-full items-center text-white gap-4 font-bold py-[11px] px-4" href="{{{ settings.button.url }}}">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 group-hover:translate-x-2 transition duration-300">
							<path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
						</svg>
						{{{ settings.button_title }}}
					</a>
				<# } #>
			</div>
		</div>
	</section>
	<?php
	}
}
