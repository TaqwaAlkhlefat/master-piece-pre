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

// Set the default image if the fields are empty
$medicalLicense = $input['medical_license'] ?: 'default.jpg';
$certificationDocuments = $input['certification_documents'] ?: 'default.jpg';
$educationalCertificates = $input['educational_certificates'] ?: 'default.jpg';
$professionalAffiliationProof = $input['professional_affiliation_proof'] ?: 'default.jpg';
$continuingEducationCertificates = $input['continuing_education_certificates'] ?: 'default.jpg';
$imagee = $input['image'] ?: 'default.png';



        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'address' => $input['address'],
            'specialization' => $input['specialization'],
            'experience' => $input['experience'],
            'Session_price' => $input['Session_price'],
            'medical_license' => $medicalLicense,
            'certification_documents' => $certificationDocuments,
            'educational_certificates' => $educationalCertificates,
            'professional_affiliation_proof' => $professionalAffiliationProof,
            'continuing_education_certificates' => $continuingEducationCertificates,
            'image' => $imagee,
            'usertype' => $input['usertype'],

            'password' => Hash::make($input['password']),
        ]);



    }
}
