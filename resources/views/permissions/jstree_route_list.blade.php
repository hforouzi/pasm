<script>
    var UITreeview = function() {
        "use strict";
        //function to initiate jquery.dynatree
        var runTreeView = function() {

            //Checkbox
            $('#tree_2').jstree({
                'plugins' : [ "checkbox", "types", "themes", "html_data", "ui" ],
                "real_checkboxes_names":true,
                'core' : {
                    "themes" : {
                        "responsive" : false
                    },
                    'data' : [
                            @foreach($group_route as $item)

                            @if($item[0]->route_controller == null)
                                    @continue
                                    @endif
                            {
                            "text" : "{{$item[0]->route_controller}}",
                            @if(count($item)>0)

                            "children" : [
                                    @foreach($item as $row)

                                {
                                    "id":"{{$row->route_id}}",
                                    "text" : "{{$row->route_action}}",
                                    "state" : {
                                        "selected" : false
                                    },
                                    "icon" : "fa fa-file text-primary"

                                },
                                @endforeach
                            ]
                            @endif
                        },
                        @endforeach

                    ]

                },
                "types" : {
                    "default" : {
                        "icon" : "fa fa-folder text-primary fa-lg"
                    },
                    "file" : {
                        "icon" : "fa fa-file text-primary fa-lg"
                    }
                }

            });
        };
        return {
            //main function to initiate template pages
            init : function() {
                runTreeView();
            }
        };
    }();

</script>