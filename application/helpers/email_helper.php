<?php

function sendMail($kepada, $subject, $isi, $attach = '')
{
    $CI = get_instance();
    
    $config = Array(
        'protocol' => 'smtp',
        'smtp_host' => 'ssl://smtp.googlemail.com',
        'smtp_port' => 465,
        'smtp_user' => 'palace.jakarta@gmail.com',
        'smtp_pass' => 'p4l4c3_PET',
        'mailtype'  => 'html', 
        'charset'   => 'iso-8859-1'
    );
    $CI->load->library('email', $config);
    $CI->email->set_newline("\r\n");
    
    $CI->email->from('palace.jakarta@gmail.com', 'Mail from visitor');
    $CI->email->to($kepada);
    // $CI->email->to('akbar.aziz@moratelindo.co.id');

    $CI->email->subject($subject);
    $CI->email->message($isi);

    try{
        
        $status = $CI->email->send();
        
        if($status==false)
        {
            throw new Exception('');
        }
        
    } catch (Exception $e) {
        // error
    }
}