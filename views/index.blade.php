@extends('layouts.app')
@section('content')
<section class="vh-100">
	<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
				<div class="card-body p-5 text-center">
				<form action="apply" method="POST" enctype="multipart/form-data">
				@csrf

				<div class="form-outline mb-4">
				  <input type="text" name="firstname" class="form-control form-control-lg" placeholder="First Name" required/>
				</div>

				<div class="form-outline mb-4">
				  <input type="text" name="lastname" class="form-control form-control-lg" placeholder="Last Name" required/>
				</div>
				<div class="form-outline mb-4">
				  <input type="text" name="position" class="form-control form-control-lg" placeholder="Position" required/>
				</div>
				 <div class="form-outline mb-4">
					<h3>Salary</h3>
					<input class="form-control type="number" name="min" id="rangePrimaryMin" placeholder="Min">
					<input class="range" type="range" name="min" step="500" min="0" max="5000" value="3000" onchange="rangePrimaryMin.value=value">
					<input class="range" type="range" name="max" step="500" min="5000" max="10000" value="7000" onchange="rangePrimaryMax.value=value">
					<input class="form-control type="number" name="max" id="rangePrimaryMax" placeholder="Max">
				  </div>
				<div class="form-outline mb-4">
				  <input type="text" name="skills" class="form-control form-control-lg" placeholder="skills" required/>
				</div>
				<div class="form-outline mb-4">
				  <input type="text" name="linkedin" class="form-control form-control-lg" placeholder="Linkedin URL" required/>
				</div>
				<div class="custom-file">
				 <input class="custom-file-input" type="file" name="file">
				 <label class="custom-file-label" for="customFile">Attach CV</label>
				</div>
				<hr/>
				<button class="btn btn-primary btn-block mb-4" type="submit">Apply</button>
			</form>
			</div>
			</div>
		</div>
	</div>
</div>
@stop