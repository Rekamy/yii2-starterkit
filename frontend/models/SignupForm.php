<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;
use common\models\Profile;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $name;
    public $ic_no;
    public $contact;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['name', 'trim'],
            ['name', 'required'],
            ['name', 'string', 'max' => 255],
            ['name', 'unique', 'targetClass' => '\common\models\Profile', 'message' => 'This email address has already been taken.'],

            ['contact', 'trim'],
            ['contact', 'required'],
            ['contact', 'string', 'max' => 255],
            ['contact', 'unique', 'targetClass' => '\common\models\Profile', 'message' => 'This email address has already been taken.'],

            ['ic_no', 'trim'],
            ['ic_no', 'string', 'max' => 255],
            ['ic_no', 'unique', 'targetClass' => '\common\models\Profile', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        $dbTransac = Yii::$app->db->beginTransaction();
        try {
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            
            if(!$user->save()) {
                throw new Exception("User save error", 1);
            }

            $profile = new Profile();
            $profile->user_id = $user->id;
            $profile->email = $this->email;
            $profile->name = $this->name;
            $profile->ic_no = $this->ic_no;
            $profile->contact = $this->contact;

            if(!$profile->save()) {
                throw new Exception("User save error", 1);
            }

            $dbTransac->commit();
            return $user;
        } catch (Exception $e) {
            
            $dbTransac->rollback();
            throw new Exception("SignUp Form : ". $e->messages, 1);
            return null;
            
        }
        
    }
}
