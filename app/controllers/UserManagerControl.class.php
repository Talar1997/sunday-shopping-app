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
    public $user;
    public $roles;
    public $offset = 0;
    public $records = 50;

    /**
     *
     */
    public function getUsersFromDB(){
        $this->users = App::getDB()->select("user", [
            "[>]role" => ["id_role" => "id_role"],
        ],[
            'user.id',
            'user.login',
            'user.password',
            'user.security_question',
            'user.security_answer',
            'user.email',
            'user.id_role',
            'role.name',
        ],[
            'LIMIT' => [($this->offset * $this->records), $this->records]
        ]);

        $this->roles = App::getDB()->select("role", "*");
    }

    public function getUserFromDB($id){
        $this->user = App::getDB()->select("user", [
            "[>]role" => ["id_role" => "id_role"],
        ],[
            'user.id',
            'user.login',
            'user.password',
            'user.security_question',
            'user.security_answer',
            'user.email',
            'user.id_role',
            'role.name',
        ],[
            'user.id' => $id
        ]);

        $this->user = $this->user[0];
    }

    /**
     * @throws \SmartyException
     */
    public function generateView(){
        $this->getUsersFromDB();
        App::getSmarty()->assign("roles", $this->roles);
        App::getSmarty()->assign("users", $this->users);
        App::getSmarty()->assign("offset", $this->offset);
        App::getSmarty()->assign("next_page", $this->offset + 1);
        App::getSmarty()->assign("previous_page", $this->offset - 1);
        App::getSmarty()->assign("page_title", "Zarządzanie użytkownikami");
        App::getSmarty()->display("ManageUsersView.tpl");
    }

    /**
     * @param $id
     */
    public function deleteUser($id){
        $result = App::getDB()->select("user", [
            "[>]role" => ["id_role" => "id_role"],
        ],[
            'user.id',
            'role.name',
        ],[
            'id' => $id
        ]);

        if(isset($result[0]) && $result[0]['name'] == 'admin'){
            Utils::addErrorMessage("Nie można usunąć konta administratora. Zmień uprawnienia i spróbuj ponownie");
            return false;
        }

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
        $option = ParamUtils::getFromCleanURL(2);
        $user_id = ParamUtils::getFromCleanURL(3);

        switch ($option){
            case 'details':
                $this->getUserFromDB($user_id);
                App::getSmarty()->assign("details", true);
                App::getSmarty()->assign("userDetails", $this->user);
                break;
            case "delete" :
                if(SessionUtils::loadData('role', true) == 'moderator'){
                    Utils::addErrorMessage("Tylko administrator może usuwać użytkowników!");
                    break;
                }
                $this->deleteUser($user_id);
                break;
            case "edit" :
                $this->getUserFromDB($user_id);
                App::getSmarty()->assign("edit", true);
                App::getSmarty()->assign("userDetails", $this->user);
                break;
        }

        $offset = ParamUtils::getFromCleanURL(1);
        if(isset($offset) && is_numeric($offset) && $offset >= 0) $this->offset += $offset;
        if($offset == -1) $this->records = App::getDB()->count("user","*");
        $this->generateView();
    }
}