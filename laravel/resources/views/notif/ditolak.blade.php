@component('mail::message')
# Notifikasi Penolakan Permintaan

Permintaan Anda Ditolak

@component('mail::button', ['url' => ''])
Lihat Profile
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
