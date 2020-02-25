@component('mail::message')
# Pendaftaran siswa

Selamat anda telah terdaftar memnjadi Relawan Hebat hari ini

@component('mail::button', ['url' => 'http://ariqsss.com'])
Klik disini
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
