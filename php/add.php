<div class="fluid-container">
	<form action="addToDB" method="post">
		<div class="row">
			<div clas="row">
				<div class="col-xs-6 col-md-2">
					Question :
				</div>
				<div class="col-xs-6 col-md-10">
					<input type="text" id="question" class="form-control" name="question" >
				</div>
			</div>
			<div clas="row">
				<div class="col-xs-6 col-md-2">
					Subject :
				</div>
				<div class="col-xs-6 col-md-10">
					<select multiple id="Subjects" name="Subjects" size="10">
					  <option value="1">Math</option>
					  <option value="2">Physics</option>
					  <option value="3">Chemistry</option>
					  <option value="4">Biology</option>
					  <option value="5">History</option>
					  <option value="6">Geography</option>
					  <option value="7">Religion</option>
					  <option value="8">Literature</option>
					  <option value="9">Problems</option>
					  <option value="10">Tech</option>
					  <option value="11">Music</option>
					  <option value="12">Movies</option>
					  <option value="13">Art</option>
					  <option value="14">Politics</option>
					  <option value="15">Fitness</option>
					</select>
				</div>
			</div>
			<div clas="row">
				<div class="col-xs-6 col-md-3">
					Option :
				</div>
				<div class="col-xs-6 col-md-3">
					<input type="text" id="option1" class="form-control" name="option1" >
				</div>
				<div class="col-xs-6 col-md-3">
					<input type="text" id="option2" class="form-control" name="option2" >
				</div>
				<div class="col-xs-6 col-md-3">
					<input type="text" id="option3" class="form-control" name="option3" >
				</div>
			</div>
			<div clas="row">
				<div class="col-xs-6 col-md-3">
					<input type="text" id="option4" class="form-control" name="option4" >
				</div>
				<div class="col-xs-6 col-md-3">
					<input type="text" id="option5" class="form-control" name="option5" >
				</div>
				<div class="col-xs-6 col-md-3">
					<input type="text" id="option6"class="form-control"  name="option6" >
				</div>
				<div class="col-xs-6 col-md-3">
					<input type="text" id="option7"  class="form-control" name="option7" >
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2 col-xs-4">
				Answer :
			</div>
			<div class="col-md-6 col-xs-8">
				<input type="text" id="Answer"  class="form-control" name="Answer" >
			</div>
			<div class="col-md-4 center-block col-xs-12">
				<input type="submit" class="btn btn-primary" valeu="valider">
			</div>
		</div>
		
	</form>	
</div>