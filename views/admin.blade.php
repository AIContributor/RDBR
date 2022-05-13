@extends('layouts.app')

@section('content')
<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid px-4">
			<div class="card mb-4">
				<div class="card-header">
					<i class="fas fa-table me-1"></i>
						აპლიკანტები
				</div>
				<div class="card-body">
					<table id="datatablesSimple">
						<thead>
							<tr>
								<th><i class="fa fa-info-circle" aria-hidden="true"></i></th>
								<th>Candidate</th>
								<th>Contact</th>
								<th>Skills</th>
								<th>Salary</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
					@foreach($Hr as $row)
						<tr>
							<td>
								<a class="btn btn-outline-primary" role="button" href="/admin/edit/{{ $row['id'] }}">
									<i class="fa fa-search" aria-hidden="true"></i>
							</td>
							<td>{{ $row['first_name'] }} {{ $row['last_name'] }}<br/>
								<small>{{ $row['position'] }}</small>
							</td>
							<td> {{ $row['linkedin'] }}
							</td>
							<td>{{ $row['skills'] }}
							</td>
							<td>{{ $row['salary'] }}
							</td>
							<td>
							@if ($row['status']==0)
								Initial
							@elseif ($row['status']==1)
								First Contact
							@elseif ($row['status']==2)
								Interview
							@elseif ($row['status']==3)
								Tech Assignment
							@elseif ($row['status']==4)
								Rejected
							@elseif ($row['status']==5)
								Hired
							@endif
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	</div>
</main>
</div>
@endsection
