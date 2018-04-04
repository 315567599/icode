<?php
$rules = [
    'login'    => 'required|min:2|max:32',
    'password' => 'required|min:2'
];

$validation = Validator::make(post(), $rules);
if ($validation->fails()) {
    throw new ValidationException($validation);
}
