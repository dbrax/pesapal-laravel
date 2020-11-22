<?php

namespace Epmnzava\Pesapal;

use Epmnzava\Pesapal\OAuth\OAuthConsumer;
use Epmnzava\Pesapal\OAuth\OAuthRequest;
use Epmnzava\Pesapal\OAuth\OAuthSignatureMethod_HMAC_SHA1;
/**
 * written: Emmanuel Paul Mnzava
 * Twitter: @epmnzava
 * Email: epmnzava@gmail.com
 * Formal class for pesapal intergration 22/11/2020
 */
class Pesapal
{
  //public string  $live = 'https://www.pesapal.com/api/';
  public string $amount,$firstname,$lastname,$email,$phone_number,$type,$description,$reference,$post_xml;

  public function makepayment(string $firstname,string $amount,string $lastname,string $email,string $type="MERCHANT",string $reference ,string $description,string $phone_number){
    

    $this->firstname=$firstname;
    $this->lastname=$lastname;
    $this->email=$email;
    $this->phone_number=$phone_number;
    $this->type=$type;
    $this->description=$description;
    $this->reference=$reference;
    $this->amount=$amount;

    $token = NULL;


    $signature_method=new OAuthSignatureMethod_HMAC_SHA1();

    $params = [ // the defaults will be overidden if set in $params
      'amount' => $this->amount,
      'description' =>$this->description ,
      'type' => 'MERCHANT',
      'reference' => $this->reference,
      'first_name' => $this->firstname,
      'last_name' => $this->lastname,
      'email' => $this->email,
      'currency' => config('currency_code'),
      'phonenumber' => '255679079774',
      'width' => '100%',
      'height' => '100%',
];


 $xml=$this->construct_xml_request();

 
 $consumer = new OAuthConsumer(config('pesapal.key'), config('pesapal.secret'));

 $iframe_src = OAuthRequest::from_consumer_and_token($consumer, $token, "GET", config('pesapal.api_url')."/api/PostPesapalDirectOrderV4",  $params);

 $iframe_src->set_parameter("oauth_callback", config('pesapal.callback'));

 $iframe_src->set_parameter("pesapal_request_data", $xml);

 $iframe_src->sign_request($signature_method, $consumer, $token);

 return '<iframe src="' . $iframe_src . '" width="' .$params['width'] . '" height="' .  $params['height'] . '" scrolling="auto" frameBorder="0"> <p>Unable to load the payment page</p> </iframe>';
  }

public function construct_xml_request(){

  $post_xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>
  <PesapalDirectOrderInfo 
      xmlns:xsi=\"http://www.w3.org/2001/XMLSchemainstance\" 
      xmlns:xsd=\"http://www.w3.org/2001/XMLSchema\" 
      Amount=\"" . $this->amount . "\" 
      Description=\"" . $this->description . "\" 
      Type=\"" . $this->type. "\" 
      Reference=\"" . $this->reference . "\" 
      FirstName=\"" . $this->firstname . "\" 
      LastName=\"" . $this->lastname . "\" 
      Currency=\"" . config("pesapal.currency_code") . "\" 
      Email=\"" . $this->email . "\" 
      PhoneNumber=\"" . $this->phone_number . "\" 
      xmlns=\"http://www.pesapal.com\" />";

$post_xml = htmlentities($post_xml);
return $post_xml;
}






}
