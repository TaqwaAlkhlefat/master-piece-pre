<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',

        ])->validate();



        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'address' => $input['address'],
            'specialization' => $input['specialization'],
            'experience' => $input['experience'],
            'Session_price' => $input['Session_price'],
            'medical_license' => $input['medical_license'],
            'certification_documents' => $input['certification_documents'],
            'educational_certificates' => $input['educational_certificates'],
            'professional_affiliation_proof' => $input['professional_affiliation_proof'],
            'continuing_education_certificates' => $input['continuing_education_certificates'],
            'image' => $input['image'],
            'usertype' => $input['usertype'],

            'password' => Hash::make($input['password']),
        ]);



    }
}
