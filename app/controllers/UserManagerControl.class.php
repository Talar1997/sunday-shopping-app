<?php
/**
 * Created by PhpStorm.
 * User: TalarPC
 * Date: 09.05.2019
 * Time: 20:24
 */

namespace app\controllers;


use core\App;
use core\Logs;
use core\ParamUtils;
use core\Utils;
use core\SessionUtils;

/**
 * Class UserManagerControl
 * @package app\controllers
 */
class UserManagerControl
{
    /**
     * @var
     */
    public $users;
    public $roles;

    /**
     *
     */
    public function getUsersFromDB(){
        $this->users = App::getDB()->select("user", "*");
        $this->roles = App::getDB()->select("role", "*");
    }

    /**
     * @throws \SmartyException
     */
    public function generateView(){
        $this->getUsersFromDB();
        App::getSmarty()->assign("roles", $this->roles);
        App::getSmarty()->assign("users", $this->users);
        App::getSmarty()->assign("page_title", "Zarządzanie użytkownikami");
        App::getSmarty()->display("ManageUsersView.tpl");
    }

    /**
     * @param $id
     */
    public function deleteUser($id){
        $result = App::getDB()->select("user",[
            'id'
        ],[
            'id' => $id
        ]);

        if(!empty($result)){
            App::getDB()->delete("user",[
                'id' => $id
            ]);
            Utils::addInfoMessage("Użytkownik (".$id.") został usunięty");
            $admin_login = SessionUtils::loadData("login", true);
            Logs::addLog("Użytkownik (".$id.") został usunięty przez ".$admin_login);
        }
        else{
            Utils::addErrorMessage("Użytkownik nie istnieje");
        }
    }

    /**
     * @throws \SmartyException
     */
    public function action_manageUsers(){
        $option = ParamUtils::getFromCleanURL(1);
        $user_id = ParamUtils::getFromCleanURL(2);

        switch ($option){
            case 'details':
                App::getSmarty()->assign("details", true);
                App::getSmarty()->assign("id", $user_id);
                break;
            case "delete" :
                $this->deleteUser($user_id);
                break;
            case "edit" :
                App::getSmarty()->assign("edit", true);
                App::getSmarty()->assign("id", $user_id);
                //Do zrobienia
                break;
        }

        $this->generateView();
    }
}