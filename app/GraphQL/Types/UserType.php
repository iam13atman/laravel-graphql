<?php
/**
 * Created by PhpStorm.
 * User: ravib
 * Date: 12/1/2017
 * Time: 11:25 AM
 */

namespace App\GraphQL\Types;

use App\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class UserType extends GraphQLType
{

    protected $attributes = [
        'name'          => 'User',
        'description'   => 'A user',
        'model'         => User::class,
    ];

    public function fields()
    {
        return [
            'id' => [
                'type'        =>  Type::nonNull(Type::id()),
                'description' =>  'The id of the user'

            ],

            'email'=>[
                'type'  => Type::string(),
                'description'=> 'The email of the user'
            ],

            'isMe' => [
                'type' => Type::boolean(),
                'description' => 'This to check if the current user is the user who is authenticated'
            ]
        ];
    }


}