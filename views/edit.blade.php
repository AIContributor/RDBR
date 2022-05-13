@extends('layouts.app')
@section('content')
	<section class="vh-100">
	  <div class="container py-5 h-100">
		<div class="row d-flex justify-content-center align-items-center h-100">
			<div class="col">
				<div class="d-flex justify-content-between">
					<div>
						<h1>{{ $data['first_name'] }} {{ $data['last_name'] }}</h1>
					</div>
					<div>
						<div class="input-group">
							<form method="POST" action="update/{{ $data['id'] }}">
							@csrf
								<input type="hidden" name="id" value="{{ $data['id'] }}">
								<div class="input-group">
									<select name="status" class="custom-select" onchange="this.form.submit()">
										<option value="0" @if ($data['status']==0) selected @endif >Initial</option>
										<option value="1" @if ($data['status']==1) selected @endif >First Contact</option>
										<option value="2" @if ($data['status']==2) selected @endif >Interview</option>
										<option value="3" @if ($data['status']==3) selected @endif >Tech Assignment</option>
										<option value="4" @if ($data['status']==4) selected @endif >Rejected</option>
										<option value="5" @if ($data['status']==5) selected @endif >Hired</option>
									</select>
								<div class="input-group-append">
							</form>
							<form method="POST" action="delete/{{ $data['id'] }}">
								@csrf
								<input type="hidden" name="cv" value="storage/{{$data['cv']}}">
								<button type="submit" class="btn btn-danger"/><i class="fa fa-trash" aria-hidden="true"></i></button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="d-flex justify-content-center">
			<div class="card shadow-2-strong" style="border-radius: 0.5rem; margin-right: 20px; width:70%">
			  <div class="p-5 text-left">
				<h2>Application Information</h2>
				<h5>Personal details and application</h5>
				<hr/>
				<div class="d-flex justify-content-between">
					<div>
						<div class="form-outline mb-4">
							Position:<br/>
							{{ $data['position'] }}
						</div>
						<div class="form-outline mb-4">
							Salary-Range:<br/>
							{{ $data['salary'] }}
						</div>
						<div class="form-outline mb-4">
							Skills:<br/>
							{{ $data['skills'] }}
						</div>
						<div class="form-outline mb-4">
							CV:<br/>
							<a href="/storage/{{ $data['cv']}}"><button class="btn btn-primary"><i class="fa fa-download"></i> Download</button></a>
						</div>
					</div>
					<div>
						<div class="form-outline mb-4">
							Contact:<br/>
							{{ $data['linkedin'] }}
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card shadow-2-strong" style="border-radius: 0.5rem; width:30%">
			<div class="p-5 text-left">
				<h3>Timeline</h3>
				<div class="form-outline mb-4">
					@foreach($comment as $comm)
					<div class="form-outline">
						<div class="d-flex justify-content-between">
							<div>
								{{ $comm['comment'] }}
							</div>
							<div>
								<sup>{{ $comm['date'] }}
								</sup>
							</div>
						</div>
						<div>
							<b>{{ $comm['status'] }}</b>
						</div>
					</div>
					<hr/>
					@endforeach
				</div>
				<div class="form-outline mb-4">
				  <form action="comment/{{ $data['id'] }}" method="post">
					@csrf
					<textarea class="form-control" name="comment"></textarea>
					<input type="hidden" name="candidateid" value="{{ $data['id'] }}" />
					<input type="hidden" name="status" value="@if ($data['status']==0) Initial
															@elseif ($data['status']==1) First Contact
															@elseif ($data['status']==2) Interview
															@elseif ($data['status']==3) Tech Assignment
															@elseif ($data['status']==4) Rejected
															@elseif ($data['status']==5) Hired
															@endif" />
					<input type="submit" name="btnSubmit" value="Comment" class="btn btn-danger btn-block mb-4"/>
				</form>
			</div>
		</div>
	</div>
</div>
</section>
@endsection