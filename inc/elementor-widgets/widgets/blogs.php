<?php
namespace Portfolioelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Utils;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Portfolio blogs Contents section widget.
 *
 * @since 1.0
 */
class Portfolio_Blogs extends Widget_Base {

	public function get_name() {
		return 'portfolio-blogs';
	}

	public function get_title() {
		return __( 'Blogs', 'portfolio-companion' );
	}

	public function get_icon() {
		return 'eicon-person';
	}

	public function get_categories() {
		return [ 'portfolio-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  blogs contents  ------------------------------
		$this->start_controls_section(
			'blogs_content',
			[
				'label' => __( 'Blogs Contents', 'portfolio-companion' ),
			]
        );
        $this->add_control(
            'big_text',
            [
                'label' => esc_html__( 'Big Text', 'portfolio-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Blog', 'portfolio-companion' ),
            ]
        );
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Sec Title', 'portfolio-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Our Creative Articles', 'portfolio-companion' ),
            ]
        );
        $this->add_control(
            'btn_title',
            [
                'label'         => __( 'Button Title', 'portfolio-companion' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => __( 'More Blogs', 'portfolio-companion' )
            ]
        );
        $this->add_control(
            'btn_url',
            [
                'label'         => __( 'Button URL', 'portfolio-companion' ),
                'type'          => Controls_Manager::URL,
                'label_block'   => true,
            ]
        );
        $this->add_control(
            'blogs_items',
            [
                'label'         => __( 'Items to show', 'portfolio-companion' ),
                'type'          => Controls_Manager::NUMBER,
                'label_block'   => true,
                'default'       => 4,
                'min'           => 1,
            ]
        );
        $this->add_control(
            'blogs_order',
            [
                'label'         => __( 'Blog Order', 'portfolio-companion' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on' => __( 'DESC', 'portfolio-companion' ),
				'label_off' => __( 'ASC', 'portfolio-companion' ),
				'return_value' => 'yes',
				'default' => 'yes',
            ]
        );
        $this->end_controls_section(); // End Hero content

        /**
         * Style Tab
         * ------------------------------ Style Title ------------------------------
         *
         */
        $this->start_controls_section(
            'style_team_member', [
                'label' => __( 'Style Member Section', 'portfolio-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'sec_title_col', [
                'label' => __( 'Section Title Color', 'portfolio-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team_area .section_title h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sub_title_col', [
                'label' => __( 'Sub Title Color', 'portfolio-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team_area .section_title p' => 'color: {{VALUE}};',
                ],
            ]
        );

        
        $this->add_control(
            'single_item_styles_seperator',
            [
                'label' => esc_html__( 'Single Item Styles', 'portfolio-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'item_title_color', [
                'label' => __( 'Title Color', 'portfolio-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team_area .single_team .team_title h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'item_text_color', [
                'label' => __( 'Text Color', 'portfolio-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team_area .single_team .team_title h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

	}

	protected function render() {    
    // call load widget script
    $this->load_widget_script(); 
    $settings = $this->get_settings();
    $big_text  = !empty( $settings['big_text'] ) ? $settings['big_text'] : '';
    $sec_title  = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $blogs_items  = !empty( $settings['blogs_items'] ) ? $settings['blogs_items'] : '';
    $blogs_order = !empty( $settings['blogs_order'] ) ? $settings['blogs_order'] : '';
    $blogs_order = $blogs_order == 'yes' ? 'DESC' : 'ASC';
    $btn_title  = !empty( $settings['btn_title'] ) ? $settings['btn_title'] : '';
    $btn_url  = !empty( $settings['btn_url']['url'] ) ? $settings['btn_url']['url'] : '';
    ?>

    <div class="creative_blog_area">
        <?php
            if ( $big_text ) {
            ?>
            <div class="outline_text blog d-none d-lg-block">
                <?php echo esc_html( $big_text )?>
            </div>
            <?php
            }
        ?>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-9 col-md-6">
                    <?php
                        if ( $sec_title ) {
                        ?>
                        <div class="blog_title">
                            <h3><?php echo esc_html( $sec_title )?></h3>
                        </div>
                        <?php
                        }
                    ?>
                </div>
                <div class="col-lg-3 col-md-6">
                    <?php
                        if ( $btn_title ) {
                        ?>
                        <div class="more_blog">
                            <a href="<?php echo esc_url( $btn_url )?>" class="boxed-btn3"><?php echo esc_html( $btn_title )?></a>
                        </div>
                        <?php
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="creative_blog_active owl-carousel">
                        
                        <?php portfolio_get_recent_blog_posts( $blogs_items, $blogs_order )?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            // review-active
            $('.creative_blog_active').owlCarousel({
                loop:true,
                margin:0,
                items:1,
                autoplay:true,
                navText:['<i class="ti-angle-left"></i>','<i class="ti-angle-right"></i>'],
                nav:false,
                dots:false,
                autoplayHoverPause: true,
                autoplaySpeed: 800,
                margin: 30,
                responsive:{
                    0:{
                        items:1,
                        nav:false
                    },
                    767:{
                        items:2,
                        nav:false
                    },
                    992:{
                        items:2
                    },
                    1200:{
                        items:2
                    },
                    1500:{
                        items:2
                    }
                }
            });
                  
        })(jQuery);
        </script>
        <?php 
        }
    }	
}
