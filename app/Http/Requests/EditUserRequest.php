<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Routing\Route;

class EditUserRequest extends Request
{
    private $route;
    
    public function __construct(Route $route)
    {
        $this->route = $route;
    }
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'                  => 'required|max:255',
            'last_name'             => 'required|max:255',
            'email'                 => 'email|unique:users,email,'.$this->route->getParameter('users'),
            'password'              => 'min:6',
            'role'                  => 'in:client,admin',
        ];
    }
}
