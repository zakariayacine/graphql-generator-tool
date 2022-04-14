@extends('layouts.app')

@section('content')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create new model</div>
                <div class="card-body">


                    <div class="container mt-5">
                        <a href="/project" class="btn btn-success">Retour vers la liste</a>
                        <h2 align="center">Columns add</h2>

                        <div class="form-group">

                            <form name="add_column" id="add_column">


                                <div class="alert alert-danger print-error-msg" style="display:none">

                                    <ul></ul>

                                </div>


                                <div class="alert alert-success print-success-msg" style="display:none">

                                    <ul></ul>

                                </div>


                                <div class="table-responsive">

                                    <table class="table table-bordered" id="dynamic_field">

                                        <tr>
                                            <td colspan="3"><input type="text" name="table"
                                                    placeholder="Enter table Name" class="form-control name_list" />
                                            </td>

                                        </tr>
                                        <tr>
                                            <td><input type="text" name="columns[]" placeholder="Enter column Name"
                                                    class="form-control name_list" /></td>
                                            <td><select class="form-select" name="type[]">
                                                    <option value="String" selected>String</option>
                                                    <option value="Integer">Integer</option>
                                                    <option value="Date">Date</option>
                                                </select></td>

                                            <td><button type="button" name="add" id="add" class="btn btn-success">Add
                                                    More</button></td>
                                        </tr>
                                    </table>

                                    <input type="button" name="submit" id="submit" class="btn btn-info"
                                        value="Submit" />

                                </div>


                            </form>

                        </div>
                    </div>




                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

    $(document).ready(function () {

        var postURL = "/project/model/store/{{$id}}";

        var i = 1;


        $('#add').click(function () {

            i++;

            $('#dynamic_field').append('<tr id="row' + i + '" class="dynamic-added"><td><input type="text" name="columns[]" placeholder="Enter column Name" class="form-control name_list" /></td><td><select class="form-select" name="type[]"> <option value="String"  selected>String</option> <option value="Integer">Integer</option> <option value="Date">Date</option> </select></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');

        });


        $(document).on('click', '.btn_remove', function () {

            var button_id = $(this).attr("id");

            $('#row' + button_id + '').remove();

        });


        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }

        });


        $('#submit').click(function () {

            $.ajax({

                url: postURL,

                method: "POST",

                data:
                    $('#add_column').serialize(),
                "_token": "{{ csrf_token() }}",

                type: 'json',

                success: function (data) {

                    if (data.error) {

                        printErrorMsg(data.error);

                    } else {

                        i = 1;

                        $('.dynamic-added').remove();

                        $('#add_column')[0].reset();

                        $(".print-success-msg").find("ul").html('');

                        $(".print-success-msg").css('display', 'block');

                        $(".print-error-msg").css('display', 'none');

                        $(".print-success-msg").find("ul").append('<li>Record Inserted Successfully.</li>');

                    }

                }

            });

        });


        function printErrorMsg(msg) {

            $(".print-error-msg").find("ul").html('');

            $(".print-error-msg").css('display', 'block');

            $(".print-success-msg").css('display', 'none');

            $.each(msg, function (key, value) {

                $(".print-error-msg").find("ul").append('<li>' + value + '</li>');

            });

        }

    });

</script>
@endsection