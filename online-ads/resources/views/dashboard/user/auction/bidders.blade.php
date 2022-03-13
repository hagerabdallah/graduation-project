


<div class="table-container">
    <table class="table">
    <thead>
        <tr>
            <th>bidders</th>
        <tr>
    </thead>
    <tbody>
        @foreach ($inf as $in)
        <tr>
            <td>{{$in->user_id}}</td>
            <td>{{$in->price}}</td>
            <td>{{$in->user->first_name}}</td>
            <td>{{$in->user->phone}}</td>
        </tr>
        @endforeach
        
    </tbody>
    </table>
</div>