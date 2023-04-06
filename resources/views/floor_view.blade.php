@extends('layouts.app')

@section('main')
{!! "<h3>Existing Users</h3>"!!}
<main id="main" class="main">
<table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Floor</th>
                    <th scope="col">Flats</th>
                  </tr>
                </thead>
                <tbody>

@php $i=1;@endphp
@foreach($floors as $floor)
<tr>
    <td><b>{{$i++}}</b></td>
    <td>{{$floor->floor}}</td>
    <td>
        @foreach($ffs as $ff)
        @foreach($flats as $flat)
        @if($flat->flat_id==$ff->flat_id && $floor->floor_id==$ff->floor_id)
        
        {{$flat->flat}}<br>
        @endif
        @endforeach
        @endforeach
    </td>
</tr>

@endforeach

</tbody>
</table>
</main>  
@endsection
