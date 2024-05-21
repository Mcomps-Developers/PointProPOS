@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'PointPro')
<img src="{{asset('assets/img/logo.png')}}" class="logo" alt="PointPro Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
