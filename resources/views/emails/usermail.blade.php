<x-mail::message>
# {{ $title }}

{{ $message }}

---

👉 [Click here to view the request]({{ $url }})

<br><br>
Thanks,<br>
**{{ config('app.name') }}**
</x-mail::message>
