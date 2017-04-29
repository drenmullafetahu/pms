<?php

namespace Models;


use Illuminate\Database\Eloquent\Model;
use DB;
use Facebook\FacebookRequest;
use Facebook\PersistentData\FacebookSessionPersistentDataHandler;
use Facebook\Facebook;
use Facebook\FacebookResponse;
use Facebook\FacebookApp;
use Facebook\Exceptions;

class FbPages extends Model
{
    public function getPageLikes(){
        $access_token ='1342764129076160|WSqDUMs9fuiKXQrkukxQioBUZc4';
        $facebook = new Facebook([
            'app_id'  => '1342764129076160',
            'app_secret' => '35ac1301ae35689470e7ea6b72ea74a6',                 // hidden here on the post...
            'default_graph_version' => 'v2.8',
            'default_access_token' => '{1342764129076160|WSqDUMs9fuiKXQrkukxQioBUZc4}',
        ]);
        $session = new FacebookApp('','');
        $request = new FacebookRequest(
            $session,
            $access_token,
            'GET',
            'ecmandryshe/?fields=fan_count'
        );
// Send the request to Graph
        try {
            $response = $facebook->getClient()->sendRequest($request);
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        $graphNode = $response->getGraphNode();
      return $graphNode;
    }

    public function getEvents(){
        $access_token ='1342764129076160|WSqDUMs9fuiKXQrkukxQioBUZc4';
        $facebook = new Facebook([
            'app_id'  => '1342764129076160',
            'app_secret' => '35ac1301ae35689470e7ea6b72ea74a6',                 // hidden here on the post...
            'default_graph_version' => 'v2.8',
        ]);
        $session = new FacebookApp('','');
        $request = new FacebookRequest(
            $session,
            $access_token,
            'GET',
            'ecmandryshe/events?fields=cover,attending_count,name,description,end_time,declined_count,interested_count,maybe_count,noreply_count&limit=5'
        );
// Send the request to Graph
        try {
            $response = $facebook->getClient()->sendRequest($request);
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        $graphEdge = $response->getGraphEdge();
        return $graphEdge;
    }


}