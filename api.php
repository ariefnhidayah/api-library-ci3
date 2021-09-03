<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Api {

    private $apiUrl = 'http://api.com'; // PRODUCTION

    public function post($url, $data = array(), $headers = array()) {
        $url = $this->apiUrl . $url;

        $curl = curl_init();

        $headers[] = 'Content-Type: application/json';

        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        if ($response == false) {
            $error = curl_error($curl);
            curl_close($curl);
            return [
                'statusCode' => $httpCode,
                'message' => $error
            ];
        }

        $responseObject = json_decode($response, true);
        $responseObject['httpCode'] = $httpCode;

        curl_close($curl);

        return $responseObject;
    }

    public function get($url, $headers = []) {
        $url = $this->apiUrl . $url;

        $headers[] = 'Content-Type: application/json';

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        if ($response == false) {
            $error = curl_error($curl);
            curl_close($curl);
            return [
                'statusCode' => $httpCode,
                'message' => $error
            ];
        }

        $responseObject = json_decode($response, true);
        $responseObject['httpCode'] = $httpCode;

        curl_close($curl);

        return $responseObject;
    }

    public function patch($url, $data = [], $headers = []) {
        $url = $this->apiUrl . $url;

        $headers[] = 'Content-Type: application/json';

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PATCH');
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        if ($response == false) {
            $error = curl_error($curl);
            curl_close($curl);
            return [
                'statusCode' => $httpCode,
                'message' => $error
            ];
        }

        $responseObject = json_decode($response, true);
        $responseObject['httpCode'] = $httpCode;

        curl_close($curl);

        return $responseObject;
    }

    public function delete($url, $headers = []) {
        $url = $this->apiUrl . $url;
        $headers[] = 'Content-Type: application/json';
        
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        if ($response == false) {
            $error = curl_error($curl);
            curl_close($curl);
            return [
                'statusCode' => $httpCode,
                'message' => $error
            ];
        }

        $responseObject = json_decode($response, true);
        $responseObject['httpCode'] = $httpCode;

        curl_close($curl);

        return $responseObject;
    }
}
