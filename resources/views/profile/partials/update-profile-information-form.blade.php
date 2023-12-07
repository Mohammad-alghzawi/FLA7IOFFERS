<section style="position:relative ; left:80% ; bottom :20px">
    <br>
            <h2 class="text-2xl font-medium text-gray-900 " style="display: inline-block">
                {{ __('') }}
            </h2>
    
      
        <x-primary-button style="background-color: #051922;"
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'change-password')"
    >{{ __('Change Password') }}</x-primary-button>
    
    <x-modal name="change-password" :show="$errors->changePassword->isNotEmpty()" focusable>
        <form method="post" action="{{ route('password.update') }}" style="padding: 15px">
            @csrf
            @method('put')
            <p class="mt-1 text-sm text-gray-600">
                {{ __('Ensure your account is using a long, random password to stay secure.') }}
            </p>
            <div>
                <x-input-label for="current_password" :value="__('Current Password')" />
                <x-text-input id="current_password" name="current_password" type="password" class="mt-1 block w-full"  autocomplete="current-password" />
                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
            </div>
    
            <div>
                <x-input-label for="password" :value="__('New Password')" />
                <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
            </div>
    
            <div>
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
            </div>
    
            <div class="flex items-center gap-4 py-3" >
                <x-primary-button >{{ __('Save') }}</x-primary-button>
    
                @if (session('status') === 'password-updated')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600"
                    >{{ __('Saved.') }}</p>
                @endif
            </div>
        </form>
    </x-modal>
    </section>

<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="row">
            <div class="col-md-4 col-12">
                @if ($user->avatar)
                <a href="#"><img src="{{ url('images/'. $user->avatar) }}" width="100px"
                    height="100px" alt="Avatar"></a>
                @else
                    <img src="{{ asset('assets/img/default-avatar-profile-icon-of-social-media-user-in-clipart-style-vector.jpg') }}" alt="Default Profile Picture"
                        class="img-fluid" style="max-width: 200px; height: auto;">
                @endif

                <div class="form-group mt-3">
                    <label for="avatar">{{ __('Upload new image') }}</label>
                    <input id="avatar" name="avatar" type="file" accept="image/*" class="form-control-file" :value="old('image', $user->image)" autocomplete="image" />
                    <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
                </div>
            </div>
            <div class="col-md-7 col-12">
                <div >
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                        :value="old('name', $user->name)" required autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>

                <div >
                    <x-input-label  for="phone" :value="__('phone')" />
                    <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full "
                        :value="old('phone', $user->phone)" required autofocus autocomplete="phone" />
                    <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                </div>

                <div >
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                        :value="old('email', $user->email)" required autocomplete="username" />
                    <x-input-error class="mt-2" :messages="$errors->get('email')" />

                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                        <div>
                            <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                                {{ __('Your email address is unverified.') }}

                                <button form="send-verification"
                                    class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                    {{ __('Click here to re-send the verification email.') }}
                                </button>
                            </p>

                            @if (session('status') === 'verification-link-sent')
                                <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                                    {{ __('A new verification link has been sent to your email address.') }}
                                </p>
                            @endif
                        </div>
                    @endif
                </div>
            


            <div class="flex items-center gap-4 mt-4" >
                <x-primary-button>{{ __('Save') }}</x-primary-button>

                @if (session('status') === 'profile-updated')
                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                @endif
            </div>
        </div>
    </div>
    </form>

</section>

{{-- <section>
    <x-primary-button style="margin-left:350px"

    x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'Update password')">{{ __('Update password') }}</x-primary-button>

    <x-modal name="Update password" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <header style="padding:15px">
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Update Password') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Ensure your account is using a long, random password to stay secure.') }}
            </p>
        </header>

        <form method="post" action="{{ route('password.update') }}" class=" space-y-6" style="padding: 15px">
            @csrf
            @method('put')

            <div>
                <x-input-label for="current_password" :value="__('Current Password')" />
                <x-text-input id="current_password" name="current_password" type="password" class="mt-1 block w-full"
                    autocomplete="current-password" />
                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="password" :value="__('New Password')" />
                <x-text-input id="password" name="password" type="password" class="mt-1 block w-full"
                    autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="password_confirmation" name="password_confirmation" type="password"
                    class="mt-1 block w-full" autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('Save') }}</x-primary-button>

                @if (session('status') === 'password-updated')
                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                @endif
            </div>
        </form>
    </x-modal>
</section> --}}
