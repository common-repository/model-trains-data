<?php

add_shortcode('model_trains_data_min_price', 'model_trains_data_min_price');

function model_trains_data_min_price($atts = []) {
    $atts = array_change_key_case((array) $atts, CASE_LOWER);

    if(!$atts || sizeof($atts) == 0) {
        return "Shortcode parameters missing";
    }
    else if(!array_key_exists("brand", $atts)) {
        return "Brand parameter missing";
    }
    else if(!array_key_exists("model", $atts)) {
        return "Model parameter missing";
    }
    else if(!array_key_exists("currency", $atts)) {
        return "Currency parameter missing";
    }
    else if(strlen($atts['currency']) != 3) {
        return "Currency must be written as ISO currency code (EUR, USD, GBP, etc.)";
    }
    else if(!array_key_exists("api-key", $atts)) {
        return "API key parameter missing";
    }

    $url = "https://www.modelprices.com/wp-json/public/get-product?brand=" . $atts['brand'] . "&model=" . $atts['model'] . 
        "&currency=" . $atts['currency'] . "&key=" . $atts['api-key'];

    $response = wp_remote_get($url);
    $response_json = wp_remote_retrieve_body($response);
    $response_data = json_decode($response_json, true);

    if(array_key_exists("error", $response_data)) {
        return $response_data["error"];
    }
    else {
        $css_class = "";
        if(array_key_exists("css-class", $atts)) {
            $css_class = " class='" . $atts['css-class'] . "'";
        }

        $output = "<a href='" . $response_data["url"] . "'" . $css_class . ">" . $response_data["brand"] . " " . $response_data["model"] . " from " . round($response_data["price"]) . " " . $response_data["currency"] . "</a>";

        return $output;
    }
}

?>