
<table>
  <thead>
    <tr>
      <th>{{__('general.id')}}</th>
      <th>{{__('books.name')}}</th>
      <th>{{__('books.description')}}</th>
      <th>{{__('books.genre')}}</th>
      <th>{{__('books.author')}}</th>
      <th>{{__('books.no_printouts')}}</th>
      <th colspan="2">{{__('books.actions')}}</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($books as $b)
    <tr>
      <td>{{$b->id}}</td>
      <td>{{$b->name}}</td>
      <td>{{$b->description}}</td>
      <td>{{$b->genre}}</td>
      <td>{{$b->author_first_name}}&nbsp;{{$b->last_first_name}}</td>
      <td>{{$b->printouts->count()}}</td>
    </tr>                  
    @endforeach
  </tbody>
</table> 