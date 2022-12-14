<?php
/**
 * Factory class for meta box
 *
 * @package TutorPeriscope\Metabox
 *
 * @since v1.0.0
 */

namespace Tutor_Periscope\Metabox;

if ( ! defined( 'ABSPATH' ) ) {
	return;
}
/**
 * Contain factory method
 */
abstract class MetaboxFactory {

	/**
	 * Abstract create_meta_box
	 *
	 * @return MetaboxInterface
	 */
	abstract public function create_meta_box() : MetaboxInterface;

	abstract public function meta_box_view();

	/**
	 * Register meta box
	 *
	 * @since v1.0.0
	 */
	public function register_meta_box() {
		$metabox = $this->create_meta_box();
		add_meta_box(
			$metabox->get_id(),
			$metabox->get_title(),
			array( $this, 'meta_box_view' ),
			$metabox->get_screen(),
			$metabox->get_context(),
			$metabox->get_priority(),
			$metabox->get_args()
		);
	}
}
