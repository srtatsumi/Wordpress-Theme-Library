<?php 
/**
 * Title:  Header with site logo, site title, navigation.
 * Slug: fitness/header-default
 * Categories: fitness-header
 * Block Types: core/template-part/header
 * 
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"30px","bottom":"30px"}}},"textColor":"white","layout":{"inherit":true}} -->
<div class="wp-block-group alignfull navbar-area d-flex justify-content-between align-items-center has-white-color has-text-color" style="padding-top:30px;padding-bottom:30px;">
    <!-- wp:site-logo {"width":58,"shouldSyncIcon":true,"className":"d-inline is-style-rounded navbar-brand flex-shrink-0 w-100"} /-->
    <!-- wp:group {"align":"wide","layout":{"type":"flex","justifyContent":"space-between"}} -->
        <div class="wp-block-group alignwide collapse navbar-collapse menu-list">
            
            <!-- wp:navigation {"className":"collapse navbar-collapse menu-list","layout":{"type":"flex","setCascadingProperties":true,"justifyContent":"center"},"style":{"spacing":{"blockGap":"20px"}}} -->
                <!-- wp:page-list {"className":"navbar-nav ms-auto","isNavigationChild":true,"showSubmenuIcon":true,"openSubmenusOnClick":true} /-->
            <!-- /wp:navigation -->
        </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->

