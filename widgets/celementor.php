<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) {exit;} // Exit if accessed directly


class Celementor extends Widget_Base{

  public function get_name(){
    return 'celementor';
  }

  public function get_title(){
    return 'celementor';
  }

  public function get_icon(){
    return 'fa fa-link';
  }

  public function get_categories(){
    return ['general'];
  }

  protected function _register_controls(){

    $this->start_controls_section(
      'section_content',
      [
        'label' => 'Settings',
      ]
    );
	
        $this->add_control( 'btn_style', array(
            'type'     => Controls_Manager::SELECT,
            'label'    => esc_html__( 'Button style' ),
            'options'  => ['signature', 'none']
        ) );
		
    $this->add_control(
      'label',
      [
        'label' => esc_html__('Label'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => 'Explore now'
      ]
    );
    $this->add_control(
      'link',
      [
        'label' => 'link',
        'type' => \Elementor\Controls_Manager::URL,
        'default' => '#'
      ]
    );
        $this->add_responsive_control('continents_align', array(
            'type' => Controls_Manager::CHOOSE,
            'label' => esc_html__('Alignment'),
            'options' => array(
                'left' => array(
                    'title' => esc_html__('Left'),
                    'icon' => 'fa fa-align-left'
                ),
                'center' => array(
                    'title' => esc_html__('Center'),
                    'icon' => 'fa fa-align-center'
                ),
                'right' => array(
                    'title' => esc_html__('Right'),
                    'icon' => 'fa fa-align-right'
                ),
            ),
            'default' => 'left',
            'selectors' => array(
                '{{WRAPPER}} .continents-filter' => 'text-align: {{VALUE}};'
            ),
        ));

        $this->add_control(
            'icon', array(
                'label' => __('Icon'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show'),
                'label_off' => __('Hide'),
                'default' => 'no',
                'separator' => 'after',
            )

        );

		$this->add_control(
			

			'image',
			[
				'label' => esc_html__( 'Icon' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			'conditions' => [
				'relation' => 'in',
				'terms' => [
					['name' => 'icon', 'operator' => '==', 'value' => 'yes'],
				],
			],
			]

		);
        $this->add_responsive_control('icon_position', array(
            'type' => Controls_Manager::CHOOSE,
            'label' => esc_html__('Icon Position'),
            'options' => array(
                'left' => array(
                    'title' => esc_html__('Left'),
                    'icon' => 'fa fa-chevron-left'
                ),
                'right' => array(
                    'title' => esc_html__('Right'),
                    'icon' => 'fa fa-chevron-right'
                ),

            ),
            'default' => 'left',
            'selectors' => array(
                '{{WRAPPER}} .continents-filter' => 'text-align: {{VALUE}};'
            ),
			'conditions' => array(
				'relation' => 'in',
				'terms' => [
					['name' => 'icon', 'operator' => '==', 'value' => 'yes'],
				],
			),
        ));
		
    $this->end_controls_section();
	
	
        /*  STYLE */
        $this->start_controls_section('label_customizing', array(
            'label' => esc_html__('Label Customozing'),
            'tab' => Controls_Manager::TAB_STYLE,
        ));

        $this->add_control('label_customizing',
            [
                'type' => Controls_Manager::COLOR,
                'label' => esc_html__('Label Customozing'),
                'default' => '#e3e3e3',
                'selectors' => array(
                    '{{WRAPPER}} .ccelementor' => 'color: {{VALUE}};'
                ),

            ]
        );
		$this->add_control(
			'font_family',
			[
				'label' => esc_html__( 'Font Family' ),
				'type' => \Elementor\Controls_Manager::FONT,
				'default' => "'Open Sans', sans-serif",
				'selectors' => [
					'{{WRAPPER}} .ccelementor' => 'font-family: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'font_size',
			[
				'type' => \Elementor\Controls_Manager::SLIDER,
				'label' => esc_html__( 'Size'),
				'size_units' => [ 'px', 'em', 'rem' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 200,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 20,
				],
			]
		);
        $this->end_controls_section();
		
        $this->start_controls_section('icon_customizing', array(
            'label' => esc_html__('Icon Customozing'),
            'tab' => Controls_Manager::TAB_STYLE,
        ));
		
        $this->add_control('icon_color_h', array(
            'type' => Controls_Manager::COLOR,
            'label' => esc_html__('Icon Hover Color'),
            'default' => '#0d3d62',
            'selectors' => array(
                '{{WRAPPER}} .ccelementor:hover svg:nth-of-type(1) path' => 'color: {{VALUE}};'
            ),
        ));
        $this->add_control('icon_color',
            [
                'type' => Controls_Manager::COLOR,
                'label' => esc_html__('Icon color'),
                'default' => '#e3e3e3',
                'selectors' => array(
                    '{{WRAPPER}} .ccelementor svg:nth-of-type(1) path' => 'color: {{VALUE}};'
                ),

            ]
        );

        $this->end_controls_section();
		
        $this->start_controls_section('signature_customizing', array(
            'label' => esc_html__('Signature Customozing'),
            'tab' => Controls_Manager::TAB_STYLE,
        ));

        $this->add_control('s_color', array(
            'type' => Controls_Manager::COLOR,
            'label' => esc_html__('Color'),
            'default' => '#0d3d62',
            'selectors' => array(
                '{{WRAPPER}} .ccelementor svg:nth-of-type(2) path' => 'stroke: {{VALUE}};'
            ),
        ));
		
        $this->add_control('s_hover_color', array(
            'type' => Controls_Manager::COLOR,
            'label' => esc_html__('Hover Color'),
            'default' => '#0d3d62',
            'selectors' => array(
                '{{WRAPPER}} .ccelementor:hover svg:nth-of-type(2) path' => 'color: {{VALUE}};'
            ),
        ));

        $this->end_controls_section();
		
  }
  

  protected function render(){

    $settings = $this->get_settings_for_display();

    ?>
    <div class="advertisement">
		<?php 

		if($settings['btn_style'] == "0"){
		?>
		<div class="wrap_btn signature" >


		<?php
			
		} else {
		?>
		<div class="wrap_btn" >
		<?php
		}
		?>
			<a class="ccelementor" title="<?php echo $settings['label']; ?>" href="<?php echo $settings['link']['url']; ?>">
				<?php

				if(isset($settings['image']['url'])){
					if($settings['btn_style'] == "0"){
						echo '<svg id="LF" width="426" height="45" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4 41.5c3.333 0 7.459-.335 8-.5 11.5-3.5 44-25 53-27 2.013-.447 26.395-9.907 32.5-9.5 15 1 .57 22.725 10.5 28 16 8.5 56-23.5 70.5-20 6.611 1.596-3 7 4 12.5s50.172-5.99 59.5-5.5c9.5.5 14 5.5 30 8.5 14.776 2.77 32.025-6.499 57-5 19.912 1.195 58-2 79-6.5 5.356-.835 11.5-2.5 14-.5" stroke="#000" stroke-width="7" stroke-linecap="round"/></svg>';
					}
					// function url_get_contents( $url ) {
						if ( ! function_exists( 'curl_init' ) ) {
							die( 'The cURL library is not installed.' );
						}
						$ch = curl_init();
						curl_setopt( $ch, CURLOPT_URL, $settings['image']['url'] );
						curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
						$output = curl_exec( $ch );
						curl_close( $ch );
						// return $output;
					// }
					if($settings['icon_position'] == 'left'){
						echo $output;		
						echo '<span>'.$settings['label'].'</span>';		
					} else {
						echo '<span>'.$settings['label'].'</span>';
						echo $output;

					}

				} else {
					if($settings['btn_style'] == "0"){
						echo '<svg id="LF" width="426" height="45" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4 41.5c3.333 0 7.459-.335 8-.5 11.5-3.5 44-25 53-27 2.013-.447 26.395-9.907 32.5-9.5 15 1 .57 22.725 10.5 28 16 8.5 56-23.5 70.5-20 6.611 1.596-3 7 4 12.5s50.172-5.99 59.5-5.5c9.5.5 14 5.5 30 8.5 14.776 2.77 32.025-6.499 57-5 19.912 1.195 58-2 79-6.5 5.356-.835 11.5-2.5 14-.5" stroke="#000" stroke-width="7" stroke-linecap="round"/></svg>';
					}	
					echo '<span>'.$settings['label'].'</span>';	
					
				}



				?>
				
			</a>
		</div>
	
    </div>
	
	<style>
	.ccelementor .iconsvg{
		width:20px;
		margin: 0 10px;
	}
	.ccelementor span{
		position:relative;
		z-index:1;
	}
	.ccelementor{
		border: 1px solid green;
		padding: 10px;
		display: inline-block;
		width: 100%;
		max-width: 320px;
		position: relative; 
		text-align: center;
		font-size: <?php echo $settings['font_size']['size'] . $settings['font_size']['unit'];?>;
		font-family: <?php echo $settings['font_family'];?>;
	}
	.wrap_btn{
		text-align:<?php echo $settings['continents_align'];?>;
	}
	.wrap_btn.signature{
		position:relative;
	}
	
	.wrap_btn.signature svg#LF path{
		stroke:<?php echo $settings['s_color'];?>;
	}
	.wrap_btn.signature:hover svg#LF path{
		stroke:<?php echo $settings['s_hover_color'];?>;
	}
	.wrap_btn.signature svg#LF{

		position: absolute;
		top: 0;
		left: 0;
		display: block;
		right: 0;
		bottom: 0px;
		z-index:0;
	}
	.wrap_btn svg#Layer_1{
		width: 20px !important;
		vertical-align: text-bottom;
		fill:<?php echo $settings['icon_color'];?>;
	}
	.wrap_btn:hover svg#Layer_1{
		fill:<?php echo $settings['icon_color_h'];?>;
	}
	</style>
		<script>

			function animatePath(pathname, animation) {
			  var path = document.querySelector(pathname);
			  var length = path.getTotalLength();

			  path.style.transition = path.style.WebkitTransition =
				'none';

			  path.style.strokeDasharray = length + ' ' + length;
			  path.style.strokeDashoffset = length;

			  path.getBoundingClientRect();

			  path.style.transition = path.style.WebkitTransition =
				animation;

			  path.style.strokeDashoffset = '0';
			}

			animatePath('#LF path', 'stroke-dashoffset 1s ease-in-out');
		</script>
    <?php
  }

  protected function _content_template(){
    ?>

    <div class="advertisement">
		<?php 

		if($settings['btn_style'] == "0"){
		?>
		<div class="wrap_btn signature" >


		<?php
			
		} else {
		?>
		<div class="wrap_btn" >
		<?php
		}
		?>
			<a class="ccelementor" title="{{{ settings.label }}}" href="{{{ settings.link.url }}}">
				<?php
				if(isset($settings['image']['url'])){
					// function url_get_contents( $url ) {
						if ( ! function_exists( 'curl_init' ) ) {
							die( 'The cURL library is not installed.' );
						}
						$ch = curl_init();
						curl_setopt( $ch, CURLOPT_URL, $settings['image']['url'] );
						curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
						$output = curl_exec( $ch );
						curl_close( $ch );
						// return $output;
					// }
					if($settings['icon_position'] == 'left'){
						echo $output;		
						echo '<span>{{{ settings.label }}}</span>';		

					} else {
						echo '<span>{{{ settings.label }}}</span>';	
						echo $output;

					if(isset($settings['sing']['url'])){
						echo '<svg id="LF" width="426" height="45" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4 41.5c3.333 0 7.459-.335 8-.5 11.5-3.5 44-25 53-27 2.013-.447 26.395-9.907 32.5-9.5 15 1 .57 22.725 10.5 28 16 8.5 56-23.5 70.5-20 6.611 1.596-3 7 4 12.5s50.172-5.99 59.5-5.5c9.5.5 14 5.5 30 8.5 14.776 2.77 32.025-6.499 57-5 19.912 1.195 58-2 79-6.5 5.356-.835 11.5-2.5 14-.5" stroke="#000" stroke-width="7" stroke-linecap="round"/></svg>';
					}
					}
				} else {
					echo '<span>{{{ settings.label }}}</span>';	
					if(isset($settings['sing']['url'])){
						echo '<svg id="LF" width="426" height="45" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4 41.5c3.333 0 7.459-.335 8-.5 11.5-3.5 44-25 53-27 2.013-.447 26.395-9.907 32.5-9.5 15 1 .57 22.725 10.5 28 16 8.5 56-23.5 70.5-20 6.611 1.596-3 7 4 12.5s50.172-5.99 59.5-5.5c9.5.5 14 5.5 30 8.5 14.776 2.77 32.025-6.499 57-5 19.912 1.195 58-2 79-6.5 5.356-.835 11.5-2.5 14-.5" stroke="#000" stroke-width="7" stroke-linecap="round"/></svg>';
					}						
				}


				?>
				
			</a>
		</div>
	</div>
	<style>
	.ccelementor .iconsvg{
		width:20px;
		margin: 0 10px;
	}
	.ccelementor span{
		position:relative;
		z-index:1;
	}
	.ccelementor{
		border: 1px solid green;
		padding: 10px;
		display: inline-block;
		width: 100%;
		max-width: 320px;
		position: relative; 
		text-align: center;
		font-size: {{{ settings.font_size.size }}}{{{ settings.font_size.unit }}};
		font-family: {{{ settings.font_family }}};
	}
	.wrap_btn{
		text-align:{{{ settings.continents_align }}};
	}
	.wrap_btn.signature{
		position:relative;
		overflow:hidden;
	}
	
	.wrap_btn.signature svg#LF path{
		stroke:{{{ settings.s_color }}};
	}
	.wrap_btn.signature:hover svg#LF path{
		stroke:{{{ settings.s_hover_color }}};
	}
	.wrap_btn.signature svg#LF{

		position: absolute;
		top: 0;
		left: 0;
		display: block;
		right: 0;
		bottom: 0px;
		z-index:0;
	}
	.wrap_btn svg#Layer_1{
		width: 20px !important;
		vertical-align: text-bottom;
		fill:{{{ settings.icon_color }}};
	}
	.wrap_btn:hover svg#Layer_1{
		fill:{{{ settings.icon_color_h }}};
	}
	</style>
		<script>

			function animatePath(pathname, animation) {
			  var path = document.querySelector(pathname);
			  var length = path.getTotalLength();

			  path.style.transition = path.style.WebkitTransition =
				'none';

			  path.style.strokeDasharray = length + ' ' + length;
			  path.style.strokeDashoffset = length;

			  path.getBoundingClientRect();

			  path.style.transition = path.style.WebkitTransition =
				animation;

			  path.style.strokeDashoffset = '0';
			}

			animatePath('#LF path', 'stroke-dashoffset 1s ease-in-out');
		</script>
    </div>
        <?php
  }
}
