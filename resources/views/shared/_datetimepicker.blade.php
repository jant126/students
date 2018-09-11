@section('css_section')
    @parent
    <link rel="stylesheet" type="text/css" href="/css/jquery-ui.css" />
    <link rel="stylesheet" href="/css/main.css">
@stop

@section('js_section')
    @parent
    <script type="text/javascript" src="/js/jquery.js"></script>
    <script type="text/javascript" src="/js/jquery-ui.js"></script>
    <script type="text/javascript" src="/js/jquery-ui-slide.min.js"></script>
    <script type="text/javascript" src="/js/jquery-ui-timepicker-addon.js"></script>
    <script src="/js/main.js"></script>
    <script type="text/javascript">
        $(document).ready(function (){
            $(function(){
                $("input[node-type='datepicker']").datetimepicker({
                    dateFormat: "yy-mm-dd",
                    timeFormat: 'hh:mm:ss',
                    defaultSelect:true,
                    showSecond:true,
                    startDate:new Date(),
                    validateOnBlur: true
                });
            });
        });
    </script>
@stop