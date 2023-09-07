<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class OrderController extends Controller
{

    public function show()
    {
        return view('order-form');
    }


    /**
     * @throws ValidationException
     */
    public function submit(Request $request)
    {
        $data = $this->validate($request, [
            'name' => [
                'required',
                'string',
                'min:2',
                // Only letters and space is allowed
                'regex:/^[a-zA-Z\s]+$/',
                // Should not contain the word 'and'
                'not_regex:/\b[Aa][Nn][Dd]\b/'
            ],
            'gender' => ['required', Rule::in(['male', 'female'])]
        ],
            [
                'name.regex' => 'The name can only contain letters.',
                'name.not_regex' => 'The name can not contain word "and".'
            ]
        );

        return view('order-success',
            [
                'name' => $data['name'],
                'gender' => $data['gender'] == 'male' ? 'Boy' : 'Girl',
            ]);
    }

}
