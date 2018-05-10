<?php 
namespace App;
require("vendor/autoload.php");

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
$client = new Client();

function getAllUnicorns() 
{
    global $client;
    $res = $client->request('GET', 'http://unicorns.idioti.se/', [
        'headers' => [
            'Accept' => 'application/json'
        ]]);
    return json_decode($res->getBody());
}
function getUnicorn($id) 
{
    global $client;
    try {
        $res = $client->request('GET', 'http://unicorns.idioti.se/' . $id, [
            'headers' => [
                'Accept' => 'application/json'
            ]]);
        return json_decode($res->getBody());
    } catch(ClientException $exception) 
	{
        return false;
    }
}
?>
