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
 * Portfolio projects Contents section widget.
 *
 * @since 1.0
 */
class Portfolio_Projects extends Widget_Base {

	public function get_name() {
		return 'portfolio-projects';
	}

	public function get_title() {
		return __( 'Projects', 'portfolio-companion' );
	}

	public function get_icon() {
		return 'eicon-person';
	}

	public function get_categories() {
		return [ 'portfolio-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  projects contents  ------------------------------
		$this->start_controls_section(
			'projects_content',
			[
				'label' => __( 'Projects Contents', 'portfolio-companion' ),
			]
        );
        $this->add_control(
            'project_items',
            [
                'label'         => __( 'Items to show', 'portfolio-companion' ),
                'type'          => Controls_Manager::NUMBER,
                'label_block'   => true,
                'default'       => 9,
                'min'           => 3,
                'max'           => 9
            ]
        );
        $this->add_control(
            'project_order',
            [
                'label'         => __( 'Project Order', 'portfolio-companion' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on' => __( 'DESC', 'portfolio-companion' ),
				'label_off' => __( 'ASC', 'portfolio-companion' ),
				'return_value' => 'yes',
				'default' => 'yes',
            ]
        );
        $this->add_control(
            'btn_title',
            [
                'label'         => __( 'Button Title', 'portfolio-companion' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => __( 'More Works', 'portfolio-companion' )
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
    $settings = $this->get_settings();
    $project_items  = !empty( $settings['project_items'] ) ? $settings['project_items'] : '';
    $project_order = !empty( $settings['project_order'] ) ? $settings['project_order'] : '';
    $project_order = $project_order == 'yes' ? 'DESC' : 'ASC';
    $btn_title  = !empty( $settings['btn_title'] ) ? $settings['btn_title'] : '';
    $btn_url  = !empty( $settings['btn_url']['url'] ) ? $settings['btn_url']['url'] : '';
    ?>

    <div class="portfolio_area">
        <div class="portfolio_wrap">
            <?php portfolio_get_projects( $project_order, $project_items );?>
        </div>

        <?php
            if ( $btn_title ) {
            ?>
            <div class="more_works text-center">
                <a href="<?php echo esc_url( $btn_url )?>"><?php echo esc_html( $btn_title )?></a>
            </div>
            <?php
            }
        ?>
    </div>
    <?php
    }
}
