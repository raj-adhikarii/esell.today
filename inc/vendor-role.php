<?php 
// Define the vendor role and capabilities
function add_vendor_role() {
    add_role( 'vendor', 'Vendor', array(
        'read' => true, // Vendors can view pages
        'edit_products' => true, // Vendors can edit their products
        'edit_others_products' => false, // Vendors cannot edit other vendors' products
        'publish_products' => true, // Vendors can publish their products
        'manage_product_terms' => true, // Vendors can manage product categories and tags
        'edit_product_terms' => true, // Vendors can edit product categories and tags
        'delete_products' => false, // Vendors cannot delete products
        'upload_files' => true, // Vendors can upload product images
    ) );
}
add_action( 'init', 'add_vendor_role' );
