<?php
/**
 * Search form
 *
 * @package custis-2018
 * @author Postali
 */

// Since we can have multiple search forms per page we should generate a unique element ID
$search_input_id = sprintf( 'search-input-%s', uniqid() );

?>

<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
    <label>
        <span class="screen-reader-text">Search</span>
        <input type="search" class="search-field" placeholder="Search" value="" name="s" title="Search" />
    </label>
    <input type="submit" class="search-submit" value="Search" />
</form>
