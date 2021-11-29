<html>
<head>
	<style>
		/** Define the margins of your page **/
		@page {
			margin: 100px 50px;
		}

		header {
			position: fixed;
			top: -60px;
			left: 0px;
			right: 0px;
			height: 20px;

			/** Extra personal styles **/
			color: black;
			text-align: left;
			line-height: 15px;
			border-bottom: 1px #606060 solid;
			font-size: 9pt;
		}

		footer {
			position: fixed; 
			bottom: -70px; 
			left: 0px; 
			right: 0px;
			height: 30px; 

			/** Extra personal styles **/
			border-top: 1px #606060 solid;
			color: black;
			text-align: left;
			line-height: 20px;
			font-size: 9pt;
		}

		table {
			font-size: 9pt;
			width: 100%;
		}


		.page-break {
			page-break-after: always;
		}

		.nobreak {
			page-break-inside: avoid;
		}

		body { font-family: DejaVu Sans; }

	</style>
	<title>{{$document_title}}</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>

<body>

  <div class="page-break">

    <table class="table" cellspacing="0">
      <thead>
        <tr>
          <th>{{__('users.name')}}</th>
          <th>{{__('books.name')}}</th>
          <th>{{__('books.loans_length')}}</th>
          <th>{{__('books.loaned_at')}}</th>
          <th>{{__('books.returned_at')}}</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($loans as $b)
        <tr>
          <td>{{$b->user->first_name}}&nbsp;{{$b->user->last_name}}</td>
          <td>{{$b->book->name}}</td>
          <td>{{$loanLength[$b->id]}}</td>
          <td>{{Carbon\Carbon::parse($b->loan->loaned_at)->tz('Europe/Berlin')->toDateTimeString()}}</td>
          <td>
            @if(is_null($b->returned_at))
            {{__('books.not_returned_yet')}}
            @else
            {{Carbon\Carbon::parse($b->returned_at)->tz('Europe/Berlin')->toDateTimeString()}}
            @endif
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>


</body>
</html>