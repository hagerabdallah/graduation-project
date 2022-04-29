<div class="table-container">
    <table class="table">
    <thead>
        <tr>
            <th>bidders-join</th>
        <tr>
    </thead>
    <tbody>
        @foreach ($joinners as $join)
        <tr>
            <td>{{$join->auction->name}}</td>
            <td>{{$join->auction->desc}}</td>
            <td>{{$join->price}}</td>
        </tr>
        @endforeach
        
    </tbody>
    </table>
</div>