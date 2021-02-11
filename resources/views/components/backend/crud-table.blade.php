@if ($modelos->first())
<table class="table table-responsive-sm table-bordered table-striped table-sm" id="myTable">
<thead>

   

    @foreach($modelos->first()->attributesToArray() as $colum => $v)
        <th>{{strtoupper($colum)}}</th>
    @endforeach
</thead>
<tbody>
    @foreach($modelos as $modelo) 
    <tr> 
        
        @foreach ($modelo->attributesToArray() as $column )
            <td>{{$column}}</td>
        @endforeach
    </tr> 
    @endforeach
</tbody>
</table>

 
{{$modelos->links()}}
@endif
 
 