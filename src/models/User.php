<?php


class User extends Model
{
    protected static $nome_tabela = 'users'; 
    protected static $colunas = [
        'id',
        'name',
        'password',
        'email',
        'start_date',
        'end_date',
        'is_admin',
    ];    
    
    // esse metodo é pra saber quantos usuarios ao todo estão ativos no Sistema
    public static function getActiveUsersCount(){

        return static::getCount(['raw'=>'end_date IS NULL']);
    }

    public function insert()
    {
        $this->validate();
        $this->is_admin=$this->is_admin?1:0; 
        if(!$this->end_date) $this->end_date=null;
        $this->password = password_hash($this->password,PASSWORD_DEFAULT);
        return parent::insert();
    }
    public function update()
    {
        $this->validate();
        $this->is_admin=$this->is_admin?1:0; 
        if(!$this->end_date) $this->end_date=null;
        $this->password=password_hash($this->password, PASSWORD_DEFAULT);
        return parent::update();
    }

    private function validate(){
        $errors=[];

        if(!$this->name){
            $errors['name']='nome é um campo obrigatorio';
        }

        if(!$this->email){
            $errors['email']='email é um campo obrigatorio';
        }elseif(!filter_var($this->email,FILTER_VALIDATE_EMAIL)){
            $errors['name']='email invalido';
        }
        if(!$this->password){
            $errors['password']='senha é um campo obrigatorio';
        }

        if(!$this->confirm_password){ 
            $errors['confirm_password']='comfirmar senha é um campo obrigatorio';
        }
        if($this->password != $this->confirm_password ){
            $errors['confirm_password']='senhas diferentes';
        }
        
        if(count($errors)>0){
            throw new ValidationException($errors);
        }
    }
}
