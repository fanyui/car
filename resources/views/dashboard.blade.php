@extends('layouts.app')

@section('script')

	<script type="text/javascript">
		$(document).ready(function(e){
			$('#newModal').on('show.bs.modal', function (event) {
			  var button = $(event.relatedTarget) // Button that triggered the modal
			  var recipient = button.data('whatever')
			  var car_owner = button.data('owner')
			  var car_mark = button.data('mark')
			  var car_plate_number= button.data('plate') // Extract info from data-* attributes
			  var car_id= button.data('id') // Extract info from data-* attributes
			  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
			  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
			  var modal = $(this)
			  modal.find('.modal-title').text('New message to ' + recipient)
			  modal.find('.modal-body #recipient-name').val(recipient)
			  modal.find('.modal-body #input-mark').val(car_mark)
			  modal.find('.modal-body #input-owner').val(car_owner)
			  modal.find('.modal-body #input-plate').val(car_plate_number)
			  modal.find('.modal-body #input-vehicule-id').val(car_id)
			})

			//  handle the fixing event modal
			$('#fixingModal').on('show.bs.modal', function (event) {
			  var button = $(event.relatedTarget) // Button that triggered the modal
			  var recipient = button.data('whatever')
			  var car_owner = button.data('owner')
			  var car_mark = button.data('mark')
			  var car_plate_number= button.data('plate') 
			  var car_id= button.data('id') // Extract info from data-* attributes
			  var car_worker= button.data('worker') // Extract info from data-* attributes
			  var car_tran= button.data('trans') // Extract info from data-* attributes
			  var worker_id= button.data('worker_id') // Extract info from data-* attributes
			  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
			  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
			  var modal = $(this)
			  modal.find('.modal-title').text('New message to ' + recipient)
			  modal.find('.modal-body #recipient-name').val(recipient)
			  modal.find('.modal-body #input-mark').val(car_mark)
			  modal.find('.modal-body #input-owner').val(car_owner)
			  modal.find('.modal-body #input-plate').val(car_plate_number)
			  modal.find('.modal-body #input-worker').val(car_worker)
			  modal.find('.modal-body #input-trans_id').val(car_tran)
			  modal.find('.modal-body #input-workerId').val(worker_id)
			  modal.find('.modal-body #input-vehicule-id').val(car_id)

			})

			//  handle the completed event modal
			$('#completedModal').on('show.bs.modal', function (event) {
			  var button = $(event.relatedTarget) // Button that triggered the modal
			  var recipient = button.data('whatever')
			  var car_owner = button.data('owner')
			  var car_mark = button.data('mark')
			  var car_plate_number= button.data('plate') // Extract info from data-* attributes
			  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
			  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
			  var modal = $(this)
			  modal.find('.modal-title').text('New message to ' + recipient)
			  modal.find('.modal-body #recipient-name').val(recipient)
			  modal.find('.modal-body #input-mark').val(car_mark)
			  modal.find('.modal-body #input-owner').val(car_owner)
			  modal.find('.modal-body #input-plate').val(car_plate_number)
			})
		})
	</script>

@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('New Cars') }}</div>

                <div class="card-body">
                	 <table class="table table-hover">
                        <thead>
                            <th>Name</th>

                            
                            <th>Plate Number</th>
                            <th>Details</th>
                        </thead>
                        <tbody>
		                    @isset($unassignedCars)
		                        @foreach ($unassignedCars as $unassignedCar)
		                        	<tr>
		                                <td>{{$unassignedCar->mark}}</td>
		                                <td>{{$unassignedCar->plate_number}}</td>
		                                <td><button id="btn-new" type="button" class="btn btn-primary" data-toggle="modal" data-target="#newModal" data-whatever="@getbootstrap" data-mark="{{$unassignedCar->mark}}"  data-owner="{{$unassignedCar->owner}}" data-plate="{{$unassignedCar->plate_number}}" data-id="{{$unassignedCar->id}}">View</button>
		                                </td>
		                            </tr>
		                        @endforeach
		                    	@else 
		                    		<p> No un assigned cars</p>
		                    @endisset
                   	 	</tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Fixing') }}</div>

                <div class="card-body">

                <div class="card-body">

                	 <table class="table table-hover">
                        <thead>
                            <th>Name</th>

                            
                            <th>Plate Number</th>
                            <th>Details</th>
                        </thead>
                        <tbody>
		                    @isset($fixingCars)
		                        @foreach ($fixingCars as $fixingCar)
		                        	<tr>
		                                <td>{{$fixingCar->vehicule->mark}}</td>
		                                <td>{{$fixingCar->vehicule->plate_number}}</td>
		                                <td><button type="button" class="btn btn-primary" data-toggle="modal" data-transaction="{{$fixingCar->id}}" data-target="#fixingModal"  data-mark="{{$fixingCar->vehicule->mark}}"  data-owner="{{$fixingCar->vehicule->owner}}" data-plate="{{$fixingCar->vehicule->plate_number}}" data-id="{{$fixingCar->vehicule->id}}"data-worker="{{$fixingCar->worker->name}}" data-trans="{{$fixingCar->id}}"data-worker_id="{{$fixingCar->worker->id}}">View</button></td>
		                            </tr>
		                        @endforeach 
		                    @endisset
                        </tbody>
                    </table> 
                </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Completed') }}</div>

                <div class="card-body">

                	 <table class="table table-hover">
                        <thead>
                            <th>Name</th>

                            
                            <th>Plate Number</th>
                            <th>Details</th>
                        </thead>
                        <tbody>
		                	@isset($completedCars)
		                        @foreach ($completedCars as $completedCar)
		                        	<tr>
		                                <td>{{$completedCar->vehicule->mark}}</td>
		                                <td>{{$completedCar->vehicule->plate_number}}</td>
		                                <td><a href="{{route('transaction', ['id'=> $completedCar->id])}}" class="btn btn-primary"> View</a></td>
		                            </tr>
		                        @endforeach 
		                    		<p> No cars have been completed</p>
		                    @endisset
                        </tbody>
                    </table>   
                </div>
            </div>
        </div>


        <!-- modal for new vehicule  starts -->

			<div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">

			        <form method="post" action="{{route('save-transaction')}}">
			        	@csrf

			        	<div class="form-row">
					    <div class="form-group col-md-3">
					      <label for="input-mark">City</label>
					      <input type="text" disabled="true" placeholder="" class="form-control" id="input-mark">
					    </div>
					    <input type="hidden" name="vehicule_id" id="input-vehicule-id">
					    <div class="form-group col-md-4">
					      <label for="input-plate">Plate</label>
					      <input type="text" disabled="true" placeholder="" class="form-control{{ $errors->has('vehicule_id') ? ' is-invalid' : '' }}" id="input-plate">
					    </div>

					    <div class="form-group col-md-2">
					      <label for="input-owner">Owner</label>
					      <input type="text" disabled="true" class="form-control{{ $errors->has('worker_id') ? ' is-invalid' : '' }}" id="input-owner">
					    </div>

					    <div class="form-group col-md-3">
					      <label for="inputState">Worker</label>

					      <select id="inputState" name="worker_id" class="form-control">
					        <option selected>Choose...</option>
					         @isset($workers)
		                        @foreach ($workers as $worker)
									<option value="{{$worker->id}}">{{$worker->name}}</option>
		                        @endforeach 
		                    @endisset
					      </select>
					    </div>

					  </div>
			             <button type="Submit" class="btn btn-primary">Submit</button>
			        </form>
			      </div>


			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			      </div>
			    </div>
			  </div>
			</div>
			<!-- modal  for new vehicule ends here -->



			<!--  modal for fixing starts here  -->


			<div class="modal fade" id="fixingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">

			        <form method="post" action="{{route('update-transaction-modal')}}">
			        	@csrf

			        	<div class="form-row">
					    <div class="form-group col-md-3">
					      <label for="input-mark">City</label>
					      <input type="text" disabled="true" placeholder="" class="form-control" id="input-mark">
					    </div>
					    <input type="hidden" name="trans_id" id="input-trans_id">
					    <input type="hidden" name="vehicule_id" id="input-vehicule-id">
					    <input type="hidden" name="worker_id"  id="input-workerId">

					    <input type="hidden" name="status"  value="completed" id="input-vehicule-completed">
					    <input type="hidden" name="released"  value="1" id="input-vehicule-released">

					    <input type="hidden" name="tranaction_id" id='input-transaction'>
					    <div class="form-group col-md-4">
					      <label for="input-plate">Plate</label>
					      <input type="text" disabled="true" placeholder="" class="form-control" id="input-plate">
					    </div>

					    <div class="form-group col-md-2">
					      <label for="input-owner">Owner</label>
					      <input type="text" disabled="true" class="form-control" id="input-owner">
					    </div>
					    <div class="form-group col-md-3">
					      <label for="inputState">Worker</label>

					      <input type="text"  disabled="true" placeholder="" class="form-control" id="input-worker">
					    </div>

					  </div>


			          <div class="form-group">
			            <label for="recipient-name" class="col-form-label">Amount:</label>
			            <input type="text" name="amount" class="form-control" id="recipient-name">
			          </div>
			          	<button type="submit" class="btn btn-primary">Update</button>
			        </form>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

			      </div>
			    </div>
			  </div>
			</div>
			<!--  modal for fixing ends here  -->


			<!--  modal for completed starts here  -->


			<div class="modal fade" id="completedModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">

			        <form>
			        	<div class="form-row">
					    <div class="form-group col-md-3">
					      <label for="input-mark">City</label>
					      <input type="text" disabled="true" placeholder="" class="form-control" id="input-mark">
					    </div>
					    <div class="form-group col-md-4">
					      <label for="input-plate">Plate</label>
					      <input type="text" disabled="true" placeholder="" class="form-control" id="input-plate">
					    </div>

					    <div class="form-group col-md-2">
					      <label for="input-owner">Owner</label>
					      <input type="text" disabled="true" class="form-control" id="input-owner">
					    </div>
					    <div class="form-group col-md-3">
					      <label for="inputState">Worker</label>
					      <select id="inputState" class="form-control">
					        <option selected>Choose...</option>
					        <option>...</option>
					      </select>
					    </div>

					  </div>


			          <div class="form-group">
			            <label for="recipient-name" class="col-form-label">Recipient:</label>
			            <input type="text" class="form-control" id="recipient-name">
			          </div>
			          <div class="form-group">
			            <label for="message-text" class="col-form-label">Message:</label>
			            <textarea class="form-control" id="message-text"></textarea>
			          </div>
			        </form>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <button type="button" class="btn btn-primary">Send message</button>
			      </div>
			    </div>
			  </div>
			</div>
    </div>

     <div class="row">
     		<div class="pull-right"> Total sum of completed Vehicules is : @isset($sum)
		                        
		                        	{{ $sum }}
		                    @endisset
     </div>
</div>

@endsection
