@component('mail::message')
# Assalamualaikum, Afwan ya Maaf saya mengganggu nih. Semangat kerja lillah nya 

Jika Testing website ini berhasil. . boleh kamu kirim screenshotnya ke ariq sekarang Jazakillah happy ya

@component('mail::button', ['url' => 'https://soshumanity-dev.act.id/'])
Klik disini
@endcomponent

Salam,<br>
{{ config('app.name') }}
@endcomponent

<!-- MAIL_DRIVER=smtp
MAIL_HOST=smtp.googlemail.com
MAIL_PORT=465
MAIL_USERNAME=ariqsaja99@gmail.com
MAIL_PASSWORD=PASSWORD HERE
MAIL_ENCRYPTION=ssl -->

<!-- MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=1e649b9e407762
MAIL_PASSWORD=f3c90114913128
MAIL_FROM_ADDRESS=ariqsaja99@gmail.com
MAIL_FROM_NAME="Sekolah Relawan" -->