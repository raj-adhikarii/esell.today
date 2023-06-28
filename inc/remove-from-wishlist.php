<?php
// remove-from-wishlist.php

// Assuming you have a wishlist system or class available, you can use it to remove the product from the wishlist
$wishlist = YITH_WCWL_Wishlist_Factory::get_default_wishlist();
if ($wishlist) {
    $product_id = $_POST['productId']; // Assuming the product ID is sent via POST
    $removed = $wishlist->remove_product($product_id);

    if ($removed) {
        $response = array('success' => true, 'message' => 'Product removed from wishlist successfully.');
    } else {
        $response = array('success' => false, 'message' => 'Failed to remove product from wishlist.');
    }
} else {
    $response = array('success' => false, 'message' => 'Wishlist not found.');
}

// Send the response back as JSON
header('Content-Type: application/json');
echo json_encode($response);
