@component('mail::message')
# Notifikasi Persetujuan Permintaan

Menunggu Persetujuan HRD.

@component('mail::button', ['url' => '/home'])
Lihat Profile
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
