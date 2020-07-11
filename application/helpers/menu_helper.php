<?php 

function category()
{
    $CI = get_instance();
    $CI->load->model('m_product');

    $rec = $CI->m_product->listCategory();
        
    return  ($rec!=null) ? $rec : null;
}

function services()
{
    $CI = get_instance();
    $CI->load->model('m_services');

    $rec = $CI->m_services->listAllServices();
        
    return  ($rec!=null) ? $rec : null;
}

?>