@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img  class="rounded-full h-16 w-16 flex item-center justify-center" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS__SWoio9LHDs26fcKG60uBukRzNoqrTAYKg&usqp=CAU" 
width="50"
height="50"

alt="">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
