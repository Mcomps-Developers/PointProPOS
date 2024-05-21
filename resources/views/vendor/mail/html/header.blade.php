@props(['url'])
<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'PointPro')
            <img src="{{asset('assets/img/logo.png')}}" style="transform: scale(3);" class="logo" alt="PointPro">
            @else
            {{ $slot }}
            @endif
        </a>
    </td>
</tr>
