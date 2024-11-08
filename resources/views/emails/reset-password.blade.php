@component('mail::message')
# Reset Password

You have requested a password reset. Please click the button below to reset your password.

@component('mail::button', ['url' => route('reset-password', ['token' => $token])])
Reset Password
@endcomponent

If you did not request a password reset, no further action is required.

Thanks,<br>
{{ config('app.name') }}
@endcomponent