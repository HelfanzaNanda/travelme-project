@component('mail::message')
# Aktivasi Akun Anda

Terimakasih Sudah Mendaftar, Mohon Aktivasi Akun Anda.

@component('mail::button', ['url' => route('owner.activate', [
                                    'token' => $owner->activation_token,
                                    'email' => $owner->email
                                    ])
                            ]
           )
Aktivasi
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent