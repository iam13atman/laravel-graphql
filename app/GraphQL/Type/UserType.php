<?php
/**
 * Created by PhpStorm.
 * User: ravib
 * Date: 12/4/2017
 * Time: 4:20 PM
 */

namespace App\GraphQL\Type;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as GraphQLType;

class UserType extends GraphQLType
{
    protected $attributes = [
        'name' => 'User',
        'description' => 'A user'
    ];

    protected $inputObject = false;

    public function fields()
    {
       return [
            'id' => [
             'type' => Type::nonNull(Type::string()),
             'description' =>'The id of the user'
            ],

           'email' => [
               'type' => Type::string(),
               'description' => 'The email of the user'
           ]


       ];
    }
}