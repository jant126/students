@section('css_section')
    @parent
    <link rel="stylesheet" href="/css/bootstrap-select.css">
@stop

@section('js_section')
    @parent
    {{--<script type="text/javascript" src="/js/jquery.js"></script>--}}
    <script type="text/javascript" src="/js/bootstrap-select.js"></script>
    <script type="text/javascript">
        $(window).on('load', function () {
            $('.selectpicker').selectpicker();
        });
    </script>
@stop