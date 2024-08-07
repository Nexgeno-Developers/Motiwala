@extends('backend.layouts.app')

@section('page.name', 'Transaction Overview')

@section('page.content')
<div class="card">
    <div class="card-body">
        {{-- <div class="row mb-2">
           <div class="col-sm-5">
              <h3>List</h3>
           </div>
           <div class="col-sm-7">
              <div class="text-sm-end">
                  <a href="javascript:void(0);" class="btn btn-danger mb-2" onclick="largeModal('{{ url(route('cms.add')) }}', 'Add PAGE')"><i class="mdi mdi-plus-circle me-2"></i> Add PAGE</a>
              </div>
           </div>
           <!-- end col-->
        </div> --}}

        <div class="table-responsive">

            <form id="search-form">
                <div class="row">
                    {{-- <div class="col-md-3">
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                    </div> --}}

                    <div class="col-md-3">
                        <div class="form-group mb-3">
                            <label for="pay_id" class="form-label">Pay ID:</label>
                            <input type="text" class="form-control" id="pay_id" name="pay_id">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group mb-3">
                            <label for="pay_amount" class="form-label">Pay Amount:</label>
                            <input type="text" class="form-control" id="pay_amount" name="pay_amount">
                        </div>
                    </div>

                    <div class="col-md-2 d-flex align-items-center">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>

                </div>
            </form>

            <hr>
            <br>

            <table id="basic-datatable1" class="table dt-responsive nowrap w-100">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Pay ID</th>
                        <th>Name</th>
                        <th>Installment No</th>
                        <th>Amount</th>
                        <th>Payment Mode</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
            </table>
        </div>

   </div>
   <!-- end card-body-->
</div>
@endsection

@section("page.scripts")
<script>
    var responseHandler = function(response) {
        location.reload();
    }

    $(document).ready(function() {
        var dataTable;

        function initializeDataTable() {
            dataTable = $('#basic-datatable1').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('transaction.data') }}",
                    data: function (d) {
                        d.name = $('#name').val();
                        d.pay_id = $('#pay_id').val();
                        d.pay_amount = $('#pay_amount').val();
                    }
                },
                columns: [
                    { data: 'id' },
                    { data: 'pay_id'},
                    { data: 'name'},
                    { data: 'installment'},
                    { data: 'amount'},
                    { data: 'type'},
                    { data: 'status'},
                    { data: 'created_at'},
                ],
                dom: '<"row"<"col-md-6"l><"col-md-6"f>><"row"<"col-md-12"i>>tip',
            });
        }

        $('#search-form').submit(function(e) {
            e.preventDefault();
            if ($.fn.DataTable.isDataTable('#basic-datatable1')) {
                dataTable.destroy();
            }
            initializeDataTable();
        });

        initializeDataTable();
    });

</script>
@endsection