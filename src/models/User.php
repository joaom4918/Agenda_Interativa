<?php


class User extends Model
{
    protected static $nome_tabela = 'users'; 
    protected static $colunas = [
        'id',
        'nome',
        'password',
        'email',
        'start_date',
        'end_date',
        'is_admin',
    ];    
    
}
