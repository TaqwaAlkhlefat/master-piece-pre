<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div>
                <x-label for="phone" value="{{ __('phone') }}" />
                <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autofocus autocomplete="phone" />
            </div>

            <div>
                <x-label for="address" value="{{ __('address') }}" />
                <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autofocus autocomplete="address" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="role" value="{{ __('Register as') }}" />
                <select id="role" name="role" class="block mt-1 w-full" required>
                    <option value="user">User</option>
                    <option value="doctor">Doctor</option>
                </select>
            </div>

            <!-- Additional fields for doctor registration -->
            <div id="doctor-fields" class="mt-4" style="display: none;">
                <x-label for="specialization" value="{{ __('Specialization') }}" />
                <x-input id="specialization" class="block mt-1 w-full" type="text" name="specialization" :value="old('specialization')" autocomplete="off" />
            </div>

            <div id="doctor-fields-experience" class="mt-4" style="display: none;">
                <x-label for="experience" value="{{ __('Experience') }}" />
                <x-input id="experience" class="block mt-1 w-full" type="text" name="experience" :value="old('experience')" autocomplete="off" />
            </div>

            <div id="doctor-fields-medical-license" class="mt-4" style="display: none;">
                <x-label for="medical_license" value="{{ __('Medical License') }}" />
                <x-input id="medical_license" class="block mt-1 w-full" type="text" name="medical_license" :value="old('medical_license')" autocomplete="off" />
            </div>

            <div id="doctor-fields-certification-documents" class="mt-4" style="display: none;">
                <x-label for="certification_documents" value="{{ __('Certification Documents') }}" />
                <x-input id="certification_documents" class="block mt-1 w-full" type="text" name="certification_documents" :value="old('certification_documents')" autocomplete="off" />
            </div>

            <div id="doctor-fields-educational-certificates" class="mt-4" style="display: none;">
                <x-label for="educational_certificates" value="{{ __('Educational Certificates') }}" />
                <x-input id="educational_certificates" class="block mt-1 w-full" type="text" name="educational_certificates" :value="old('educational_certificates')" autocomplete="off" />
            </div>

            <div id="doctor-fields-professional-affiliation-proof" class="mt-4" style="display: none;">
                <x-label for="professional_affiliation_proof" value="{{ __('Professional Affiliation Proof') }}" />
                <x-input id="professional_affiliation_proof" class="block mt-1 w-full" type="text" name="professional_affiliation_proof" :value="old('professional_affiliation_proof')" autocomplete="off" />
            </div>

            <div id="doctor-fields-continuing-education-certificates" class="mt-4" style="display: none;">
                <x-label for="continuing_education_certificates" value="{{ __('Continuing Education Certificates') }}" />
                <x-input id="continuing_education_certificates" class="block mt-1 w-full" type="text" name="continuing_education_certificates" :value="old('continuing_education_certificates')" autocomplete="off" />
            </div>

            <!-- JavaScript to show/hide additional fields based on the selected role -->
            <script>
                document.getElementById('role').addEventListener('change', function() {
                    var doctorFields = document.getElementById('doctor-fields');
                    var doctorFieldsExperience = document.getElementById('doctor-fields-experience');
                    var doctorFieldsMedicalLicense = document.getElementById('doctor-fields-medical-license');
                    var doctorFieldsCertificationDocuments = document.getElementById('doctor-fields-certification-documents');
                    var doctorFieldsEducationalCertificates = document.getElementById('doctor-fields-educational-certificates');
                    var doctorFieldsProfessionalAffiliationProof = document.getElementById('doctor-fields-professional-affiliation-proof');
                    var doctorFieldsContinuingEducationCertificates = document.getElementById('doctor-fields-continuing-education-certificates');

                    if (this.value === 'doctor') {
                        doctorFields.style.display = 'block';
                        doctorFieldsExperience.style.display = 'block';
                        doctorFieldsMedicalLicense.style.display = 'block';
                        doctorFieldsCertificationDocuments.style.display = 'block';
                        doctorFieldsEducationalCertificates.style.display = 'block';
                        doctorFieldsProfessionalAffiliationProof.style.display = 'block';
                        doctorFieldsContinuingEducationCertificates.style.display = 'block';
                    } else {
                        doctorFields.style.display = 'none';
                        doctorFieldsExperience.style.display = 'none';
                        doctorFieldsMedicalLicense.style.display = 'none';
                        doctorFieldsCertificationDocuments.style.display = 'none';
                        doctorFieldsEducationalCertificates.style.display = 'none';
                        doctorFieldsProfessionalAffiliationProof.style.display = 'none';
                        doctorFieldsContinuingEducationCertificates.style.display = 'none';
                    }
                });
            </script>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
