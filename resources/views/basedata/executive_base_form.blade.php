{!! Form::open(['route'=>'executive.getdata','id'=>'form']) !!}
<div class="row">

</div>
<div class="row">
    <div class="col-md-12">
        <h5 class="over-title margin-bottom-15">فهرست بها <span class="text-bold">انجام کار</span></h5>
        <div class="col-md-4">
            <div class="form-group">
                <label>از تاریخ                                            </label>
                {!! Form::text('date', null, array('type' => 'text', 'class' => 'form-control datepicker','placeholder' => 'تاریخ شروع را انتخاب نمایید', 'id' => 'calendar')) !!}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>      انتخاب منطقه       </label>
                @include('layouts.partial.scope_combo')
            </div>
        </div>
        <div class="col-md-4">
            <div class="col-sm-offset-1 col-sm-10" style="margin-top: 22px;">
                <button type="button" class="btn btn-wide btn-info" id="show-table">
                    نمایش
                </button>
            </div>
        </div>
        <div class="row" id="table">
        </div>
        <div id="save" hidden class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>ضریب مینوس  </label>
                    {!! Form::text('minus', null, array('type' => 'text', 'class' => 'form-control','placeholder' => 'ضریب مینوس را وارد نمایید', 'id' => 'minus')) !!}
                </div>
            </div>

            <div class="col-md-4" style="margin-top: 22px;">
                        <button class="btn btn-primary btn-wide pull-right" type="submit">  ثبت
                        </button>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}
<script>

    $('#show-table').click(function () {
        $("save").hide();

        var newGroup=$("#scope option:selected").val();

        $.ajax({
            url:"{{route("executive.show_executive_table")}}",
            method:"post",
            data:{
                scope:newGroup,
                _token:$("input[name=_token]").val()
            },
            success:function (group) {

                $("#table").html(group);
                $("#save").slideToggle();


            },
            error:function (xhr) {
                var errors=xhr.responseJSON;
                var error=errors.name[0];
                if(error){
                    console.log(errors)
                }
            }
        });
    });
</script>