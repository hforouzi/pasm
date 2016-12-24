{!! Form::open(['route'=>'activity.store','id'=>'form']) !!}


{{ csrf_field() }}

<div class="row">
</div>
<div class="row">
    <div class="col-md-12">
        <h5 class="over-title margin-bottom-15">فهرست بها <span class="text-bold">انجام کار</span></h5>
        <div class="col-md-3">
            <div class="form-group">
                <label>سال      </label>
                <select class="form-control" name="activity_year" id="activity_year">
                    <option value="">انتخاب نمایید</option>
                    @if((substr(jDate::forge()->format('date'),0,4))>=1395)
                        @for($i=1395;$i<=(substr(jDate::forge()->format('date'),0,4));$i++)
                            <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    @endif
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group" id="month">
                <label>  ماه</label>
                <select disabled class="form-control" name="activity_month" id="activity_month">
                </select>

            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group" id="month">
                <label>  منطقه</label>
                <select disabled class="form-control" name="activity_scope" id="activity_scope">
                    <option value="">انتخاب نمایید</option>
                    <option value="1">منطقه یک</option>
                    <option value="2">منطقه دو</option>
                    <option value="3">منطقه سه</option>
                    <option value="4">منطقه چهار</option>
                    <option value="5">منطقه پنج</option>

                </select>

            </div>
        </div>
        <div class="col-md-3">
            <div class="col-sm-offset-1 col-sm-10" style="margin-top: 22px;">
                <button type="button" class="btn btn-wide btn-info" id="show-table">
                    نمایش
                </button>
            </div>
        </div>
        <div class="row" id="table">
        </div>
    </div>
    <div id="save" hidden class="row">
        <div class="col-md-4">
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button class="btn  btn-primary" type="submit">  ثبت
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}
<script>

    $('#show-table').click(function () {
        $("save").hide();

        var newGroup=$("#activity_month option:selected").val();
        var scope=$("#activity_scope option:selected").val();

        $.ajax({
            url:"{{route("activity.show_executive_table")}}",
            method:"post",
            data:{
                month:newGroup,
                scope:scope,
                _token:"{{ csrf_token() }}"
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
    $('#activity_year').change(function () {

        var newGroup=$("#activity_year option:selected").val();
        $("#month").append('<div id="spinner">'+
                '<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>' +
                ' <span class="sr-only">Loading...</span></div>');
        $.ajax({
            url:"{{route("activity.show_month")}}",
            method:"post",
            data:{
                year:newGroup,
                _token:$("input[name=_token]").val()
            },
            success:function (group) {
                $("#spinner").remove();

                $("#month").after().html(group);
                $("#activity_scope").removeAttr('disabled');
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