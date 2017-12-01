<?php
/**
 * Created by PhpStorm.
 * User: ravib
 * Date: 12/1/2017
 * Time: 11:25 AM
 */

namespace App\GraphQL\Query;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use GraphQL;


class UserQuery extends Query
{

    protected $attributes =  [
       'name'=>'User'
    ];

    public function type()
    {

        return GraphQL::paginate('user');
        //return Type::listOf(GraphQL::type('user'));
    }

    public function resolve($root, $args, SelectFields $fields)
    {
        $where = function ($query) use ($args) {
            if (isset($args['id'])) {
                $query->where('id',$args['id']);
            }
            if (isset($args['email'])) {
                $query->where('email',$args['email']);
            }
        };
        $user = User::with(array_keys($fields->getRelations()))
                    ->where($where)
                    ->select($fields->getSelect())
                    ->paginate();
        return $user;
    }


}