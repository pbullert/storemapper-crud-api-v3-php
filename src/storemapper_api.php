<?php
class Storemapper_API
{

    var $api_token;
    var $instance_url;

    public function __construct($api_token = '', $instance_url = '')
    {
        $api_token = 'e165ba2c55ba47c8c3ab4a9ecabad247'; //Insert Storemapper API Token
        $instance_url = 'https://www.storemapper.co/api/v3/stores/';
        $ssl_verifypeer = false;

        $this->instance_url = $instance_url;
        $this->api_token = $api_token;
        $this->ssl_verifypeer = $ssl_verifypeer;

        if($api_token == 'e165ba2c55ba47c8c3ab4a9ecabad247'){
        	print 'Replace API Token in storemapper_api.php file with your own. Contact Storemapper support to obtain it.';
        }
    }

    /*****************
    CURL [GET]
    ******************/
    public function curl_get($endpoint, $query)
    {
        if ($query != '')
        {
            $query = '?' . $query;
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->instance_url . $endpoint . $query);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_USERPWD, $this->api_token);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $this->ssl_verifypeer);

        $data = curl_exec($ch);
        return json_decode($data);
    }
    /*****************
    CURL [POST]
    ******************/
    public function curl_post($endpoint, $query)
    {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->instance_url . $endpoint);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_USERPWD, $this->api_token);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $this->ssl_verifypeer);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $query);

        $data = curl_exec($ch);
        return json_decode($data);
    }

    /*****************
    CURL [PUT]
    ******************/
    public function curl_put($endpoint, $query)
    {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->instance_url . $endpoint);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_USERPWD, $this->api_token);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $query);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $this->ssl_verifypeer);

        $data = curl_exec($ch);
        return json_decode($data);
    }

    /*****************
    CURL [DELETE]
    ******************/
    public function curl_delete($endpoint)
    {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->instance_url . $endpoint);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_USERPWD, $this->api_token);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $this->ssl_verifypeer);

        $data = curl_exec($ch);
        return json_decode($data);
    }

    /*********************
    Query all Stores [GET]
    *********************/
    public function query_all()
    {
        $endpoint = 'query';
        $result = $this->curl_get($endpoint, '');
        return $result;
    }

    /******************
    Query a Store [GET]
    ******************/
    public function query_single($name, $address)
    {
        if ($name && $address)
        {
            $dataArray = array(
                'name' => $name,
                'address' => $address
            );
            $query = http_build_query($dataArray);
        }
        else
        {
            $query = NULL;
        }

        $endpoint = 'query';
        $result = $this->curl_get($endpoint, $query);
        return $result;
    }

    /********************
    Create a Store [POST]
    ********************/
    public function create($query)
    {
        $endpoint = '';
        $result = $this->curl_post($endpoint, $query);
        return $result;
    }

    /*******************
    Update a Store [PUT]
    *******************/
    public function update($id, $query)
    {
        $query = http_build_query($query);
        $endpoint = $id;
        $result = $this->curl_put($endpoint, $query);
        return $result;
    }

    /**********************
    Delete a Store [DELETE]
    ***********************/
    public function delete($id)
    {
        $endpoint = $id;
        $result = $this->curl_delete($endpoint);
        return $result;
    }

}
$storemapper = new Storemapper_API();
?>
