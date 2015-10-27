<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 10/26/15
 * Time: 10:26 PM
 */

require 'vendor/autoload.php';
require_once 'functions.php';
require_once 'DbHandler.php';

$app = new \Slim\Slim(array(
    'mode' => 'development'
));

$app->config('debug', true);


/**
 * The functions are routed with the
 *api calls. The api calls are the urls
 * you gave for access. E.g http://localhost/user/create
 * /user/create is routed with the function name addUser
 *
 */

//test the api

$app ->get("/name/:name", "test");

//register user
$app ->post("/user/create", "addUser");

//get user by name
$app ->post("/user/get", "getUserIdByName");

//get user by name
$app ->post("/house/get", "getHousesByUser");

$app ->run();

use apiClass\DbEntry as DbEntry;


/**
 * @param $name
 * this uses the GET METHOD, to fetch
 * Note: the route has :name because the function expects an argument
 */
//test
function test($name)
{

    echo json_encode(array("name"=>$name));

}


/**
 * Register a user with the requested params
 */


function addUser(){

    if($_POST){

        if($_POST['username'] && $_POST['password']){

            $data = "";

            $username = $_POST['username'];
            $password = $_POST['password'];

            $result = new DbEntry();

            $check = $result ->registerUser($username, $password);

            if($check)
                $data = "user has been registered";

            echo json_encode(array("data"=>array("feedback" =>$data)));
        }
    }
}


/**
 * Using the POST method, fetch user_id by the username provided
 * once the param username has a value, it returns the user_id.
 * The purpose of this is to be able to insert the user_id into
 * the house table when filling up the house table
 */
function getUserIdByName(){


    if($_POST){

        if($_POST['username']){

            $username = $_POST['username'];

            $result = new DbEntry();

            $check = $result ->getUserIdByName($username);

            if($check){

                $data = array($check);

                echo json_encode(array("data"=>array("feedback" =>array("user_id" => $data))));
            }
        }
    }
}




/**
 * Using the POST method, fetch user_id by the username provided
 * once the param username has a value, it returns the user_id
 * and you can now have access to the houses by a user_id provided
 * from the username
 */


function getHousesByUser(){

    if($_POST){

        if($_POST['username']){

            $username = $_POST['username'];

            $result = new DbEntry();

            $user_id = $result ->getUserIdByName($username);

            $getHouses = $result ->getHousesByUserId($user_id);


            echo json_encode(array("feedback" => array($getHouses)));

        }
    }
}