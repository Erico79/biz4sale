@component('mail::message')
# Confirm your Email - Business for Sale

Dear {{ $user->masterfile->first_name }},<br/>
Thank you for registering.<br/>
Please verify your email to proceed to upload your first business by tapping the button below;

@component('mail::button', ['url' => url('confirm/seller/' . $enc_user_id)])
Confirm Email Address
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
