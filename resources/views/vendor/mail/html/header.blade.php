@props(['url'])
<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'PointPro')
            <img src="{{asset('assets/img/logoEmail.png')}}" class="logo" alt="PointPro">
            @else
            {{ $slot }}
            @endif
        </a>
    </td>
</tr>

