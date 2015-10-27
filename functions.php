<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 10/26/15
 * Time: 10:37 PM
 */

namespace apiClass;

include 'DbHandler.php';


class DbEntry{



    public function registerUser($username, $password){

        $db_handler = new DbHandler(HOSTNAME, USERNAME, PASSWORD);
        $db_handler->selectDatabase(DBNAME);

        $query = "INSERT INTO users (username, password, created_at, modified_at)
            VALUES ('$username', sha1('$password'), NOW(), NOW())";

        $result = $db_handler ->query($query);


        return $result;
    }


    public function insertHouses($user_id, $house_name, $location, $house_color){

        $db_handler = new DbHandler(HOSTNAME, USERNAME, PASSWORD);
        $db_handler->selectDatabase(DBNAME);

        $query = "INSERT INTO houses (user_id, house_name, house_location, house_color,
                  created_at, modified_at) VALUES('$user_id', '$$house_name', '$location', '$house_color',
                  NOW(), NOW())";

        $result = $db_handler ->query($query);

        return $result;
    }

    public function getUserIdByName($user){

        $db_handler = new DbHandler(HOSTNAME, USERNAME, PASSWORD);

        $db_handler->selectDatabase(DBNAME);

        $query = "SELECT user_id FROM users WHERE username ='$user' AND active_status = 1";

        $result = mysql_fetch_assoc($db_handler ->query($query));

        return $result['user_id'];
    }


    public function getHousesByUserId($userId){

        $db_handler = new DbHandler(HOSTNAME, USERNAME, PASSWORD);
        $db_handler->selectDatabase(DBNAME);

        $query = "SELECT DISTINCT houses.user_id, houses.house_id, houses.house_name,
                    houses.house_location, houses.house_color FROM houses INNER JOIN users
                        WHERE houses.user_id ='$userId' ";

        $result = ($db_handler ->query($query));


        $getResult = array();

        while ($row = mysql_fetch_assoc($result)) {

            $getResult[] = $row;
        }

        return $getResult;

    }


}
