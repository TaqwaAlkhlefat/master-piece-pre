<link rel="stylesheet" href="{{ asset('register.css') }}">

<x-guest-layout>


        <div class="wrapper">
            <h2>Registration</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <x-authentication-card style="color: red">
                <x-slot name="logo">
                </x-slot>
                <x-validation-errors class="mb-4" />


            <div class="input-box">
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="input-box">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="input-box">
                <x-label for="phone" value="{{ __('phone') }}" />
                <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autofocus autocomplete="phone" />
            </div>

            <div class="input-box">
                <x-label for="address" value="{{ __('address') }}" />
                <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autofocus autocomplete="address" />
            </div>

            <div class="input-box">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="input-box">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="select-box">
                <x-label for="role" value="{{ __('Register as') }}" />
                <select id="role" name="role" required onchange="toggleAdditionalFields(this.value)">
                  <option value="user">User</option>
                  <option value="doctor">Doctor</option>
                </select>
              </div>


            <!-- Additional fields for doctor registration -->
            <div id="doctor-fields" class="input-box" style="display: none;">
                <label for="specialization">{{ __('Specialization') }}</label>
                <x-input id="specialization" class="block mt-1 w-full" type="text" name="specialization" :value="old('specialization')" autocomplete="off" />
            </div>

            <div id="doctor-fields-experience" class="input-box" style="display: none;">
                <label for="experience">{{ __('Experience') }}</label>
                <x-input id="experience" class="block mt-1 w-full" type="text" name="experience" :value="old('experience')" autocomplete="off" />
            </div>

            <div id="doctor-Session-price" class="input-box" style="display: none;">
                <label for="Session_price">{{ __('Price (5-35 JD)') }}</label>
                <x-input id="Session_price" class="block mt-1 w-full" type="number" name="Session_price" :value="old('Session_price')" autocomplete="off" min="5" max="35" />
            </div>


            <div id="doctor-fields-image" style="display: none;" class="file-input-container">
                <label id="labaleimage" for="image" style="display: flex; align-items: center;">
                  <img src="https://img.icons8.com/?size=1x&id=24373&format=png" height="30px" style="margin-right: 5px;">
                  {{ __('Your Image') }}
                </label>
                <x-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')" autocomplete="off" accept="image/*" />
              </div>



            <div id="doctor-fields-medical-license"  style="display: none;" class="file-input-container">
                <label id="labaleimage" for="medical_license" style="display: flex; align-items: center;">
                    <img src="https://img.icons8.com/?size=1x&id=24373&format=png" height="30px" style="margin-right: 5px;">
                    {{ __('Medical License') }}
                  </label>
                <x-input id="medical_license" class="block mt-1 w-full" type="file" name="medical_license" :value="old('medical_license')" autocomplete="off" accept="image/*" />
            </div>

            <div id="doctor-fields-certification-documents"  style="display: none;" class="file-input-container">
                <label id="labaleimage" for="certification_documents" style="display: flex; align-items: center;">
                    <img src="https://img.icons8.com/?size=1x&id=24373&format=png" height="30px" style="margin-right: 5px;">
                    {{ __('Certification Documents') }}
                  </label>
                <x-input id="certification_documents" class="block mt-1 w-full" type="file" name="certification_documents" :value="old('certification_documents')" autocomplete="off" accept="image/*" />
            </div>

            <div id="doctor-fields-educational-certificates"  style="display: none;" class="file-input-container">
                <label id="labaleimage" for="educational_certificates" style="display: flex; align-items: center;">
                    <img src="https://img.icons8.com/?size=1x&id=24373&format=png" height="30px" style="margin-right: 5px;">
                    {{ __('Educational Certificates') }}
                  </label>
                <x-input id="educational_certificates" class="block mt-1 w-full" type="file" name="educational_certificates" :value="old('educational_certificates')" autocomplete="off" accept="image/*" />
            </div>

            <div id="doctor-fields-professional-affiliation-proof"  style="display: none;" class="file-input-container">
                <label id="labaleimage" for="professional_affiliation_proof" style="display: flex; align-items: center;">
                    <img src="https://img.icons8.com/?size=1x&id=24373&format=png" height="30px" style="margin-right: 5px;">
                    {{ __('Professional Affiliation Proof') }}
                  </label>
                <x-input id="professional_affiliation_proof" class="block mt-1 w-full" type="file" name="professional_affiliation_proof" :value="old('professional_affiliation_proof')" autocomplete="off" accept="image/*" />
            </div>

            <div id="doctor-fields-continuing-education-certificates"  style="display: none;" class="file-input-container" >
                <label id="labaleimage" for="continuing_education_certificates" style="display: flex; align-items: center;">
                    <img src="https://img.icons8.com/?size=1x&id=24373&format=png" height="30px" style="margin-right: 5px;">
                    {{ __('Continuing Education Certificates') }}
                  </label>
                <x-input id="continuing_education_certificates" class="block mt-1 w-full" type="file" name="continuing_education_certificates" :value="old('continuing_education_certificates')" autocomplete="off" accept="image/*" />

                <div  class="policy">
                    <label for="usertype" class="flex items-center">
                        <input  type="checkbox" name="usertype" value="3">
                        <span class="ml-2">{{ __('I confirm that all the data mentioned above are correct') }}</span>
                    </label>
                </div>

            </div>

            <!-- Hidden input field to store the usertype value -->
            <input type="hidden" id="usertype" name="usertype" value="0">




            <script>
                var checkbox = document.getElementById('usertype');
                checkbox.addEventListener('change', function() {
                    if (checkbox.checked) {
                        checkbox.value = '3';
                    } else {
                        checkbox.value = '0';
                    }
                });
            </script>



            <!-- JavaScript to show/hide additional fields based on the selected role -->
            <script>
                document.getElementById('role').addEventListener('change', function() {
                    var doctorFields = document.getElementById('doctor-fields');
                    var doctorFieldsExperience = document.getElementById('doctor-fields-experience');
                    var doctorFieldsSessionPrice = document.getElementById('doctor-Session-price');
                    var doctorFieldsImage = document.getElementById('doctor-fields-image');
                    var doctorFieldsMedicalLicense = document.getElementById('doctor-fields-medical-license');
                    var doctorFieldsCertificationDocuments = document.getElementById('doctor-fields-certification-documents');
                    var doctorFieldsEducationalCertificates = document.getElementById('doctor-fields-educational-certificates');
                    var doctorFieldsProfessionalAffiliationProof = document.getElementById('doctor-fields-professional-affiliation-proof');
                    var doctorFieldsContinuingEducationCertificates = document.getElementById('doctor-fields-continuing-education-certificates');
                    var doctorFieldsusertype1 = document.getElementById('doctor-fields-usertype');
                    var doctorFieldsusertype = document.getElementById('usertype');



                    if (this.value === 'doctor') {
                        doctorFields.style.display = 'block';
                        doctorFieldsExperience.style.display = 'block';
                        doctorFieldsSessionPrice.style.display = 'block';
                        doctorFieldsImage.style.display = 'block';
                        doctorFieldsMedicalLicense.style.display = 'block';
                        doctorFieldsCertificationDocuments.style.display = 'block';
                        doctorFieldsEducationalCertificates.style.display = 'block';
                        doctorFieldsProfessionalAffiliationProof.style.display = 'block';
                        doctorFieldsContinuingEducationCertificates.style.display = 'block';
                        doctorFieldsusertype1.style.display = 'block';
                        doctorFieldsusertype.style.display = 'block';
                    } else {
                        doctorFields.style.display = 'none';
                        doctorFieldsExperience.style.display = 'none';
                        doctorFieldsSessionPrice.style.display = 'none';
                        doctorFieldsImage.style.display = 'none';
                        doctorFieldsMedicalLicense.style.display = 'none';
                        doctorFieldsCertificationDocuments.style.display = 'none';
                        doctorFieldsEducationalCertificates.style.display = 'none';
                        doctorFieldsProfessionalAffiliationProof.style.display = 'none';
                        doctorFieldsContinuingEducationCertificates.style.display = 'none';
                        doctorFieldsusertype1.style.display = 'none';
                        doctorFieldsusertype.style.display = 'none';
                    }
                });
            </script>
            <script>
                document.getElementById('role').addEventListener('change', function() {
                    var doctorFields = document.getElementById('doctor-fields');
                    var doctorFieldsExperience = document.getElementById('doctor-fields-experience');
                    var userTypeInput = document.getElementById('usertype');

                    if (this.value === 'doctor') {
                        doctorFields.style.display = 'block';
                        doctorFieldsExperience.style.display = 'block';

                        // Set usertype value to 2 for doctor
                        userTypeInput.value = '3';
                    } else {
                        doctorFields.style.display = 'none';
                        doctorFieldsExperience.style.display = 'none';

                        // Set usertype value to 0 for user
                        userTypeInput.value = '0';
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

                <div class="input-box button">
                    <button style="padding: 10px 20px; font-size: 16px;">
                        {{ __('Register') }}
                    </button>
                </div>


            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
