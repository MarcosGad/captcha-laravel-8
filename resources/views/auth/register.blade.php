<style>
    .BDC_SoundIcon { margin-top: 30px}
</style>
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>
             
            <!-- CaptchaCode -->

            <div class="form-group{{ $errors->has('CaptchaCode') ? ' has-error' : '' }}">
                <label class="col-md-4 control-label">Captcha One</label>
         
                  <div class="col-md-6">
                    {!! captcha_image_html('ContactCaptcha') !!}
                  <input class="form-control" type="text" id="CaptchaCode" name="CaptchaCode">
         
                   @if ($errors->has('CaptchaCode'))
                      <span class="help-block">
                   <strong>{{ $errors->first('CaptchaCode') }}</strong>
                     </span>
                  @endif
         
             </div>
           </div>

            <!-- Captcha -->

            <div class="form-group row" style="margin-top: 50px">
                <label for="captcha" class="col-md-4 col-form-label text-md-right">Captcha Two</label>
                <div class="col-md-6 captcha">
                    <span>{!! captcha_img() !!}</span>
                    <button type="button" class="btn btn-danger" class="reload" id="reload">
                    &#x21bb;
                    </button>
                </div>
            </div>
            <div class="form-group row">
                <label for="captcha" class="col-md-4 col-form-label text-md-right">Enter Captcha</label>
                <div class="col-md-6">
                    <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha">
                </div>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $('#reload').click(function () {
        $.ajax({
            type: 'GET',
            url: 'reload-captcha',
            success: function (data) {
                $(".captcha span").html(data.captcha);
            }
        });
    });
</script>
