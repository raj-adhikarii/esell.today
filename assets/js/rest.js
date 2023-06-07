//client side js
// var postAdBtn = document.querySelector('.ads [type="submit"]');
// if (postAdBtn) {
//     postAdBtn.addEventListener("click", function() {

//         var consumerKey = 'ck_2bfdecd44427762646b056a79035f944fa22c88c';
//         var consumerSecret = 'cs_efb95c59392223bf4eff7b67fc0d042f8930d4a3';

//         var wooPostData = {
//             "name": document.querySelector('.form-group [id="product-title"]').value,
//             "regular_price": document.querySelector('.form-group [id="product-price"]').value,
//             "tag" : document.querySelector('#product-tag').value,
//             "description": document.querySelector('#product-description').value,
//             "address" : document.querySelector('#user-location').value,
//             "city" : document.querySelector('#user-city').value,
//             "state" : document.querySelector('#user-state').value,
//             "zipCode" : document.querySelector('#user-zip').value,
//             "contactName" : document.querySelector('#contact-name').value,
//             "contactEmail" : document.querySelector('#contact-email').value,
//             "contactPhone" : document.querySelector('#contact-phone').value,
//             "type": "simple",
//             "status": "publish",
//             // Add any additional fields you need for your products
//         };

//         var url = "https://staging.e-sell.today/wp-json/wc/v3/products";
//         url += "?consumer_key=" + consumerKey;
//         url += "&consumer_secret=" + consumerSecret;

//         var postAds = new XMLHttpRequest();
//         postAds.open("POST", url);
//         postAds.setRequestHeader("Content-Type", "application/json;charset=UTF-8");

//         postAds.onload = function() {
//             if (postAds.status === 201) {
//                 console.log("Product created successfully.");
//                 // Handle successful response, e.g., display a success message
//             } else {
//                 console.log("Error creating product: " + postAds.status);
//                 // Handle error response, e.g., display an error message
//             }
//         };

//         console.log(postAds);
//         postAds.send(JSON.stringify(wooPostData));
//     });
// }

var postAdBtn = document.querySelector('.ads [type="submit"]');
if (postAdBtn) {
    postAdBtn.addEventListener("click", function() {

        var wooPostData = {
            "name": document.querySelector('.form-group [id="product-title"]').value,
            "price": document.querySelector('.form-group [id="product-price"]').value,
            "tags" : document.querySelector('#product-tag').value,
            "description": document.querySelector('#product-description').value,
            "address" : document.querySelector('#user-location').value,
            "city" : document.querySelector('#user-city').value,
            "state" : document.querySelector('#user-state').value,
            "zipCode" : document.querySelector('#user-zip').value,
            "contactName" : document.querySelector('#contact-name').value,
            "contactEmail" : document.querySelector('#contact-email').value,
            "contactPhone" : document.querySelector('#contact-phone').value,
            "type": "simple",
            "status": "publish",
            // Add any additional fields you need for your products
        };

        var url = "https://staging.e-sell.today/wp-json/wc/v3/products";

        var postAds = new XMLHttpRequest();
        postAds.open("POST", url);
        postAds.setRequestHeader("Content-Type", "application/json;charset=UTF-8");

        postAds.onload = function() {
            if (postAds.status === 201) {
                console.log("Product created successfully.");
                // Handle successful response, e.g., display a success message
            } else {
                console.log("Error creating product: " + postAds.status);
                // Handle error response, e.g., display an error message
            }
        };

        postAds.send(JSON.stringify(wooPostData));
    });
}

