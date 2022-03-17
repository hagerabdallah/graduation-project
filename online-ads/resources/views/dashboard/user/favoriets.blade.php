


<div class="table-container">
    <table class="table">
    <thead>
        <tr>
            <th>bidders</th>
        <tr>
    </thead>
    <tbody>
         @foreach ($users->advertisment as $us) 
        <tr>
            <td>{{$us->title}}</td>
             {{-- @foreach ($favoriets->advertisment as $ad)  --}}

            {{-- <td>{{$favoriet->advertisment->title?? 'none'}}</td> --}}
            {{-- <td>{{$ad->desc}}</td> --}}
            {{-- {<td>{{$favoriet->users->first_name}}</td>  --}}
          
        </tr>
        @endforeach 
         
    </tbody>
    </table>
</div>