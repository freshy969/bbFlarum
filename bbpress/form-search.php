<?php

/**
 * Search
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<div class="row">

    <div class="col-md-6 col-md-offset-3">

<form role="search" method="get" id="bbp-search-form" action="<?php bbp_search_url(); ?>">
	<div class="form-group">
		<input type="hidden" name="action" value="bbp-search-request" />
		<input class="form-control" tabindex="<?php bbp_tab_index(); ?>" type="text" value="<?php echo esc_attr( bbp_get_search_terms() ); ?>" name="bbp_search" id="bbp_search" />
    </div>
    <div class="form-group text-right">
    <input tabindex="<?php bbp_tab_index(); ?>" class="btn btn-danger" type="submit" id="bbp_search_submit" value="<?php esc_attr_e( 'Search', 'bbpress' ); ?>" />
    </div>
</form>

    </div>
</div>
