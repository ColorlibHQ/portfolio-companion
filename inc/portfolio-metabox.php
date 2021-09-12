<?php
function portfolio_page_metabox( $meta_boxes ) {

	$portfolio_prefix = '_portfolio_';
	$meta_boxes[] = array(
		'id'        => 'portfolio_metaboxes',
		'title'     => esc_html__( 'Project Options', 'portfolio-companion' ),
		'post_types'=> array( 'project' ),
		'priority'  => 'high',
		'context'  => 'side',
		'autosave'  => 'false',
		'fields'    => array(
			array(
				'name'    => esc_html__( 'Gird Image Size', 'portfolio-companion' ),
				'id'      => $portfolio_prefix . 'portfolio-grid',
				'type'    => 'select',
				'options' => array(
					'0' => 'Select Size',
					'1' => 'Gird Size [681x484]',
					'2' => 'Grid Size [558x484]',
				),
				'inline' => true,
			),			
			array(
				'id'    => $portfolio_prefix . 'client_name',
				'type'  => 'text',
				'name'  => esc_html__( 'Client Name', 'portfolio-companion' ),
				'placeholder' => esc_html__( 'Client Name', 'portfolio-companion' ),
			),			
			array(
				'id'    => $portfolio_prefix . 'project_category',
				'type'  => 'text',
				'name'  => esc_html__( 'Project Category', 'portfolio-companion' ),
				'placeholder' => esc_html__( 'Project Category', 'portfolio-companion' ),
			),			
			array(
				'id'    => $portfolio_prefix . 'project_date',
				'type'  => 'date',
				'js_options' => [
					'dateFormat' => 'M dd, yy'
				],
				'name'  => esc_html__( 'Project Date', 'portfolio-companion' ),
				'placeholder' => esc_html__( 'Project Date', 'portfolio-companion' ),
			),			
			array(
				'id'    => $portfolio_prefix . 'project_url',
				'type'  => 'text',
				'name'  => esc_html__( 'Project URL', 'portfolio-companion' ),
				'placeholder' => esc_html__( 'Project URL', 'portfolio-companion' ),
			),
		),
	);


	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'portfolio_page_metabox' );
