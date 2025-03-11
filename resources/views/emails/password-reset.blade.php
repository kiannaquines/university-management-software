@component('mail::message')
    # Password Reset Request

    Hello {{ $user->name ?? 'User' }},

    We received a request to reset your password for your {{ config('app.name') }} account. Click the button below to proceed:

    @component('mail::button', ['url' => $resetUrl])
        Reset Password
    @endcomponent

    This link will expire in 60 minutes. If you didn’t request this, you can safely ignore this email.

    Thanks,
    {{ config('app.name') }} Team
@endcomponent
