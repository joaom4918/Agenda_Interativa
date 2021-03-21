<?php




class Login extends Model
{
 
    // validando se o usuario digitou email e senha   
    public function validate(){
        $errors=[];

        if(!$this->email){
            $errors['email'] ="Email obrigatorio";
        }

        if(!$this->password){
            $errors['password'] ="informe  sua senha";
        }

        if(count($errors) > 0){
            throw new ValidationException($errors);
        }
    }

    
    public function checkLogin(){
        $this->validate();
        $user=User::getOne(['email'=>$this->email]);
        // se o usuario estiver setado sera verificado se a senha esta correta
        if($user){

            if($user->end_date){
                throw new AppException('usuario desligado da empresa');
            }
            if(password_verify($this->password,$user->password)){
                return $user;
            }
        }

        throw new AppException('email ou senha invalidos'); 
    }
}


?>