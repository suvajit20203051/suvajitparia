<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Whatsapp {

    protected $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
    }

    public function send_document($phone, $booking_id, $caption)
    {
        $payment = $this->CI->db
            ->select('receipt_path')
            ->where('bookings_id', $booking_id)
            ->get('payments')
            ->row();

        if (!$payment || empty($payment->receipt_path)) {
            return false;
        }

        $file_url = base_url($payment->receipt_path);

        $phone = preg_replace('/[^0-9]/', '', $phone);
        if (strlen($phone) == 10) $phone = '91'.$phone;

        $data = [
            'token'    => '2rcjjdf6aueho77p',
            'to'       => $phone,
            'filename' => 'Hospital_Receipt.pdf',
            'document' => $file_url,
            'body'     => $caption
        ];

        $ch = curl_init("https://api.ultramsg.com/instance148821/messages/document");
        curl_setopt_array($ch, [
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => http_build_query($data),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false
        ]);

        curl_exec($ch);
        curl_close($ch);

        return true;
    }
}
