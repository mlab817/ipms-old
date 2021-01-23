<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Chart with VueJS</title>
</head>
<body>
{!! json_encode($chart) !!}
<div id="app">
    {!! $chart->container() !!}
</div>
<script src="https://unpkg.com/vue"></script>
<script>
    const app = new Vue({
        el: '#app',
    });
</script>
<script src=https://cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js charset=utf-8></script>
{!! $chart->script() !!}
</body>
</html>
